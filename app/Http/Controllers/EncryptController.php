<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpseclib\Crypt\RSA as Crypt_RSA;

class EncryptController extends Controller
{
    public function index(Request $request){

        $data= Post::orderBy('id','desc')->get();
        $postcount = count($post);
        return view('frontend.home',compact('post'));
	 
       }

      public function encrypt(){
        $rsa = new Crypt_RSA();
        $rsa->loadKey($publickey);
        $rsa->setEncryptionMode(2);
        $data = $request->ptext;
        $output = $rsa->encrypt($data);
        $decrypted = base64_encode($output);
      }
}
