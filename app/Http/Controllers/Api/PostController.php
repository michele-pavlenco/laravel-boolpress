<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['category','tags'])->get();
        return response()->json($posts);
    }
    public function show($slug){
       $post = Post::where("slug", $slug)->with(["category","tags","comments"])->first();
       if(empty($post)){
        return response()->json(['message'=> "No post found"], "404");
       }
       return response()->json($post);
    }
}