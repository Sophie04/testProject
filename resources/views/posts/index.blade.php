@extends('layouts.app')

@section('content')
<div class="container w-4/5">
    <div class="flex row justify-center text-gray-700">
        <div class="col-md-8">
            <div class="card box-border px-20 py-6 border-4 border-gray-300 rounded">
                <div class="card-header box-border border-b-2 flex justify-center font-medium text-3xl">{{ __('Posts') }}</div>

                <div class="card-body p-3 flex justify-center text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="posts">
                        <ul class="p-3 flex flex-col justify-center text-center">
                            @foreach($posts as $post)
                            <li class="p-2 m-2 col mx-auto border-b border-gray-300">
                                <h2 class="font-semibold text-xl"><a href="/posts/{{ $post->id }}/comments"> {{ $post->title }} </a></h2>
                                <p>{{ $post->content }}</p>
                            </li>
                            @endforeach
                        </ul> 
                        {{ $posts->links() }}                       
                    </div>

                </div>
                <div class="flex justify-center">
                    <a href="{{ url('/posts/create') }}" class="bg-gray-300 text-lg text-gray-600 hover:bg-gray-200 px-4 py-2 rounded btn btn-primary">Add new post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
