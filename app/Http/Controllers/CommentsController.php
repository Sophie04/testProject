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
    	// return view('comments.create');
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

    	return view('comments.show', ['comments'=>$comments], ['post'=>Post::where('id', request()->segment(2))->first()]);
    }

    public function edit(Comment $comment){
        if($comment->userId == Auth::user()->id)
    	   return view('comments.edit', compact('comment'));
        else return redirect('/posts/' . request()->segment(2) . 'comments');
    }

    public function update(Comment $comment){
    	$comment->update(request()->validate([
    		'commBody' => ['required', 'min:3']
    	]));
        $comments = Comment::where('postId', request()->segment(2))->latest("updated_at")->paginate(3);
    	// return view('comments.show', ['comments'=>$comments], ['post'=>Post::where('id', request()->segment(2))->first()]);
        return redirect('/posts/' . request()->segment(2) . 'comments');
    }

    public function destroy(Post $post){
    	$post->delete();
    	return redirect('/posts/' . $post->id);
    }

}
