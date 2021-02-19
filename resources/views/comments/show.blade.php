@extends('posts.show')

@section('comments')

<div id="comments">
	<ul class="p-3 flex flex-col justify-center text-center">
        @foreach($comments as $comment)
        	
	            <li class="flex-col p-2 m-2 col mx-auto border-b border-gray-300">
	            	<p class="inline-flex"><img src="/uploads/{{ $comment->userPhoto }}" style="width:20px; height:20px; border-radius:50%; float: left">
	                	<span class="pl-2 flex-grow font-semibold text-sm">{{ $comment->userName }}</span>
	                </p>
	                <p class="flex-auto">{{ $comment->commBody }}</p>
	                <div class="inline-flex pt-1">
	                	@if ($post->userId === Auth()->user()->id)
		                    <a href="{{ url('/posts/' . $post->id . '/comments/' . $comment->id . '/edit') }}" class="text-gray-600 hover:bg-gray-200 rounded btn btn-primary">
		                    	<svg class="h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
								</svg>
							</a>
		                    <a href="{{ url('/posts/' . $post->id . '/comments/' . $comment->id . '/delete') }}" class="text-gray-600 hover:bg-gray-200 rounded btn btn-primary ml-2">
		                    	<svg class="h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
								</svg>
		                    </a>
                    	@endif   
	                	<!-- <svg class="h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
						</svg>
	                	<svg class="h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
						</svg>
 -->	            	</div>
	            </li>
	        
        @endforeach
        
    </ul> 
    {{ $comments->links() }}
    <!-- <div class="flex text-center justify-center">
    	<form wire:submit.prevent="save" enctype="multipart/form-data" action="/posts" method="POST">
			@csrf
			<div class="form p-2 row mx-auto">
				<label for="text" class="col-md-4 col-form-label text-lg text-md-right"></label>
				<textarea name="text" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control max-w-3xl" style="display: block; overflow: hidden; resize: both;" required>
				</textarea>						    
			</div>
			@if ($errors->has('text'))
				<p style="color: red">{{$errors->first('text')}}</p>
			@endif
			<br>

			<button type="submit" class="bg-gray-300 text-lg text-gray-600 hover:bg-gray-200 px-4 py-2 rounded btn btn-primary">Post comment</button>
		</form>
	</div> -->
	<div class="py-2 flex justify-center">
        <a href="{{ url('/posts/' . $post->id . '/comments/create') }}" class="bg-gray-300 text-lg text-gray-600 hover:bg-gray-200 px-4 py-2 rounded btn btn-primary">Add new comment</a>
    </div>
</div>

@endsection
