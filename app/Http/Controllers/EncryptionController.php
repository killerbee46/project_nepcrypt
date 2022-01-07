<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptionController extends Controller
{
    public function encro(){
        return view("frontend.encrohome");
    }
    public function encrypt(){
        return view("frontend.encrypt");
    }
    public function decrypt(){
        return view("frontend.decrypt");
    }
    public function addEncrypt(Request $request){
        $request->validate([
            'plain' => 'required',
            'encrypted' => 'required',
            'encryption_method'=>'required',
            'key' => 'required'
        ]);

        $post = new Encrypt();
        $post->user_id = Auth::user()->id;
        $post->plain = $request->plain;
        $post->encryption_method = 'AES';
        $post->encrypted = $request->encrypted;
        $post->key = $request->key;
        $post->save();


        if($post){
            //Redirect with Flash message
            return redirect('/encro')->with('status', 'Post added Successfully!');
        }
        else{
            return redirect('/encro')->with('status', 'There was an error!');
        }
    } 
    public function addDecrypt(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image'=>'required'
        ]);

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
}
