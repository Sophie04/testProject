@extends('posts.show')

@section('comments')

<div id="comments">
	<ul class="p-3 flex flex-col justify-center text-center">
        @foreach($comments as $comment)
        	
	            <li class="p-2 m-2 col mx-auto border-b border-gray-300">
	            	<img src="/uploads/{{ $comment->userPhoto }}" style="width:20px; height:20px; border-radius:50%; float: left">
	                <h2 class="font-semibold text-sm">{{ $comment->userName }}</h2>
	                <p>{{ $comment->text }}</p>
	            </li>
	        
        @endforeach
    </ul> 
    {{ $comments->links() }}         
</div>

@endsection