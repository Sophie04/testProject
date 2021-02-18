@extends('layouts.app')

@section('content')
<div class="container w-4/5">
    <div class="flex row justify-center text-gray-700">
        <div class="col-md-8">
            <div class="card box-border px-20 py-6 border-4 border-gray-300 rounded">
                <div class="card-header box-border border-b-2 flex justify-center font-medium text-2xl">{{ $post->title }}</div>

                <div class="card-body p-3 flex justify-center text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ $post->content }}
                </div>
                <div class="flex justify-center">
                    @if ($post->userId === Auth()->user()->id)
                    <a href="{{ url('/posts/' . $post->id . '/edit') }}" class="bg-gray-300 text-lg text-gray-600 hover:bg-gray-200 px-4 py-2 rounded btn btn-primary mr-2">Edit post</a>
                    <a href="{{ url('/posts/' . $post->id . '/delete') }}" class="bg-gray-300 text-lg text-gray-600 hover:bg-gray-200 px-4 py-2 rounded btn btn-primary ml-2">Delete post</a>
                    @endif                    
                </div>
            </div>
            <div class="pt-2">
                @yield('comments')
            </div>
        </div>
    </div>
</div>
@endsection
