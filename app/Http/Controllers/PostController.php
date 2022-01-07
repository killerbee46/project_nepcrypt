<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Read

        $posts = Post::all();
        // dd($posts);
        // $JSONfile = json_encode($posts);
        // dd($JSONfile);
        return view('admin.posts.postview',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addPost()
    {
        //CREATE
        return view('admin.posts.addform');
        
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
            return redirect('admin/posts')->with('status', 'Post added Successfully!');
        }
        else{
            return redirect('admin/posts/add-post')->with('status', 'There was an error!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Read individual
        // $posts = Post::find(3)->get();
        $posts = Post::findOrFail($id);
        return view('admin.posts.show',compact('posts'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPost($id)
    {
        //Update View
        $posts = Post::where('id',$id)->first();
        return view('admin.posts.editform',compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id) 
    {
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
            $fullname = $posts->image;
        }
        //Update
        $posts = Post::find($id)->first();

        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->image = $request->image;
        $posts->user_id = Auth::user()->id;
        $posts->user_name = Auth::user()->name;

        if($posts->save()){
            return redirect('admin/posts')->with('status', 'Post edited Successfully!');
        }
        else{
            return redirect('admin/posts/edit-post')->with('status', 'There was an error');

        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePost($id)
    {
        $post = Post::find($id);
        if($post->delete()){
            return redirect('admin/posts')->with('status', 'Post deleted successfully');
        }
        else return redirect('admin/posts')->with('status', 'There was an error');
        
    }
    public function searchPostForAdmin(Request $request){

        $searched=$request->searched;
        $message='';
        $posts= Post::where('title','Like',"%$searched%")->get(); //->orWhere('email','Like',"%$searched%")->orWhere('mobile','Like',"%$searched%")->get();
        return view('admin.posts.searchpostview',compact('posts','searched','message'));
    }
}