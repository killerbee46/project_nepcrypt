<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Blogger;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;



class FrontEndController extends Controller
{
    public function index(Request $request){
        return view('frontend.home');
	 
       }
   

       public function post(Request $request){

        $post= Post::orderBy('id','desc')->get();
        return view('frontend.posts',compact('post'));
	 
       }
       
    //    public function about(Request $request){
    //     $data= Expert::orderBy('id','desc')->where('status','<=',1)->get();
    //     return view('frontend.about',compact('data'));
	//   }
       
       
    //    public function blog(Request $request){
    //     $data= Program::orderBy('id','desc')->where('status','<=',1)->get();
    //     return view('frontend.blog',compact('data'));
	//  }


       public function viewPost($id)
       {
           $post = Post::where('id', $id)->first();
           $comments = Comment::where('status',1)->where('post_id',$id)->with('user')->orderby('created_at', 'desc')->get();
   
           return view('frontend.showpost', compact('post','comments'));
       }

    public function comment(Request $request ,$id)
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->user_name = Auth::user()->name;
        $post = Post::where('id', $id)->first();
        if($comment->save()){
            $comments = Comment::where('status',1)->where('post_id',$id)->with('user')->orderby('created_at', 'desc')->get();
            
            return redirect('/post/show/'.$id);
        }
       
    }
    public function deletecomment(Request $request ,$id)
    {
        $comment = Comment::findOrFail($id);
        $postid = $comment->post_id;
        if($comment->delete()){
            return redirect('/post/show/'.$postid)->with('status', 'comment deleted successfully');
        }
        else return redirect('/post/show/'.$postid)->with('status', 'There was an error');
    }

    public function addPost()
    {
        //CREATE
        return view('frontend.add-post');
        
    } 

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNewPost(Request $request)
    {
        //CREATE
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image'=>'required'
        ]);

        if ($file = $request->file('image')) {
        $request->validate([
            'image' =>'mimes:jpg,jpeg,png,bmp'
        ]);
        $image = $request->file('image');
        $imgExt = $image->getClientOriginalExtension();
        $fullname = time().".".$imgExt;
        $result = $image->storeAs('images/posts',$fullname);
        }

        else{
            $fullname = 'images.jpg';
        }

        

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $fullname;
        $post->user_id = Auth::user()->id;
        $post->user_name = Auth::user()->name;
        $post->save();


        if($post){
            //Redirect with Flash message
            return redirect('post/')->with('status', 'Post added Successfully!');
        }
        else{
            return redirect('post/')->with('status', 'There was an error!');
        }


    }
    public function deletepost(Request $request ,$id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::all()->where('post_id',$id);
        if($post->delete() && $comments->delete()){
            return redirect('/post')->with('status', 'Post deleted successfully');
        }
        else return redirect('/post')->with('status', 'There was an error');
    }
    
    public function profile()
    {
        return view('frontend.profile');
    }

}