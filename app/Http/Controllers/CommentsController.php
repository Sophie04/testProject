<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function showAll(){
		// $posts = Post::latest()->get();
		// $comments = Comment::latest()->paginate(3);

        $comments = Comment::where('postId', request()->segment(2))->latest()->paginate(3);

		return view('comments.show', ['comments'=>$comments], ['post'=>Post::where('id', request()->segment(2))->first()]);
	}

	public function create(){
    	return view('comments.create');
    }

    public function store(){
    	request()->validate([
    		'text' => ['required', 'min:3', 'alpha']
    	]);
    	
    	Comment::create([
    		'text' => request('text'),
    		'userName' => Auth::user()->get()->pluck('firstName', 'lastName'),
    		'userPhoto' => Auth::user()->photo(),

    	]);

    	return redirect('/posts/' . $post->id);
    }

    public function edit(Comment $comment){
    	return view('comments.edit', compact('comment'));
    }

    public function update(Comment $comment){
    	$comment->update(request()->validate([
    		'text' => ['required', 'min:3']
    	]));

    	return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post){
    	$post->delete();
    	return redirect('/posts/' . $post->id);
    }

}
