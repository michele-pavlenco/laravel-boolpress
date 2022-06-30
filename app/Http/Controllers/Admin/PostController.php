<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    protected $validationRule = [
        'title' => 'required|string|max:100',
        'content' => 'required',
        'published' => 'sometimes|accepted',
        'category' => 'nullable|exists:categories,id',
        'tags' => 'nullable|exists:tags,id',
        'image' => 'nullable|image|mimes:jpeg,bmp,png,jpg,svg|max:2048'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(12);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRule);
        $data = $request->all();
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->published = isset($data['published']);
        $newPost->category_id = ($data['category_id']);

        $newPost->slug = $this->getSlug($newPost->title);

        if (isset($data['image'])) {
            $path_image = Storage::put("uploads", $data['image']);
            $newPost->image = $path_image;
        }
        
        $newPost->save();

        if (isset($data['tags'])) {
            $newPost->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $categories = Category::all();
        $post = Post::findOrFail($id);
        // $currentUser = Auth::user();
        // if($currentUser->id != $post->user_id){
            
        // }
        
        
        return view('admin.posts.show', compact('post', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Post $post)
    {
        $request->validate($this->validationRule);
        $data = $request->all();

        if ($post->title != $data['title']) {
            $post->title = $data['title'];
            $slug = Str::of($post->title)->slug('-');
            if ($slug != $post->slug) {
                $post->slug = $this->getSlug($post->title);
            }
        }

        $post->category_id = $data['category_id'];
        $post->content = $data['content'];
        $post->published = isset($data['published']);

 
        if (isset($data['image'])) {
            Storage::delete($post->image);
            $path_image = Storage::put("uploads", $data['image']);
            $post->image = $path_image;
        }
        
        if (isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }
        $post->update();
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getSlug($title)
    {
        $slug = Str::of($title)->slug('-');
        $count = 1;
        while (Post::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
    }
}