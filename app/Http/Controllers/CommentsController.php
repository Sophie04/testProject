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
        $comments = Comment::where('postId', request()->segment(2))->latest("updated_at")->paginate(3);

		return view('comments.show', ['comments'=>$comments], ['post'=>Post::where('id', request()->segment(2))->first()]);
	}

	public function create(){
        $comments = Comment::where('postId', request()->segment(2))->get();
        return view('comments.create', ['comments'=>$comments], ['post'=>Post::where('id', request()->segment(2))->first()]);
    }

    public function store(){
        $comments = Comment::where('postId', request()->segment(2))->paginate(3);
    	request()->validate([
    		'commBody' => ['required', 'min:3']
    	]);
    	
    	Comment::create([
    		'commBody' => request('commBody'),
    		'userName' => Auth::user()->fullName(),
    		'userPhoto' => Auth::user()->photo,
            'userId' => Auth::user()->id,
            'postId' => request()->segment(2)

    	]);
        $post = Post::where('id', request()->segment(2))->firstOrFail();
    	// return view('comments.show', ['comments'=>$comments], ['post'=>Post::where('id', request()->segment(2))->first()]);
        return redirect('/posts/' .$post->id . '/comments');
    }

    public function edit(){
        $comment = Comment::where('id', request()->segment(4))->firstOrFail();
        if($comment->userId == Auth::user()->id){
            $post = Post::where('id', request()->segment(2))->firstOrFail();
    	    return view('comments.edit', compact('comment', 'post'));
        }   
        else return redirect('/posts/' . $comment->postId . '/comments');
    }

    public function update(){
        $comment = Comment::where('id', request()->segment(4))->firstOrFail();
    	$comment->update(request()->validate([
    		'commBody' => ['required', 'min:3']
    	]));
        $comments = Comment::where('postId', request()->segment(2))->latest("updated_at")->paginate(3);
    	return view('comments.show', ['comments'=>$comments], ['post'=>Post::where('id', request()->segment(2))->first()]);
        // return redirect('/posts/' . request()->segment(2) . '/comments');
    }

    public function destroy(){
        $comment = Comment::where('id', request()->segment(4))->firstOrFail();
        $post = Post::where('id', request()->segment(2))->firstOrFail();
        if($comment->userId == Auth::user()->id or $post->userId == Auth::user()->id)
            $comment->delete();
    	return redirect('/posts/' . request()->segment(2) . '/comments');
    }

}
