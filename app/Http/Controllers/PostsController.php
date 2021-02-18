<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
	
	public function showAll(){
		// $posts = Post::latest()->get();
		$posts = Post::latest()->paginate(3);
		return view('posts.index', ['posts'=>$posts]);
	}

    public function show(Post $post){
    	return view('posts.show', ['post'=>$post]);
    }

    public function create(){
    	return view('posts.create');
    }

    public function store(){
    	request()->validate([
    		'title' => ['required', 'min:3', 'alpha'],
    		'content' => ['required', 'alpha']
    	]);
    	
    	Post::create([
    		'title' => request('title'),
    		'content' => request('content'),
    		'userId' => Auth::user()->id

    	]);

    	return redirect('/posts');
    }

    public function edit(Post $post){
    	return view('posts.edit', compact('post'));
    }

    public function update(Post $post){
    	$post->update(request()->validate([
    		'title' => ['required', 'min:3'],
    		'content' => ['required']
    	]));

    	return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post){
    	$post->delete();
    	return redirect('/posts');
    }
}
