@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex row justify-center text-gray-700">
        <div class="col-md-8">
            <div class="card box-border px-20 py-6 border-4 border-gray-300 rounded">
                <div class="card-header box-border border-b-2 flex justify-center font-medium text-2xl">{{ __('Dashboard') }}</div>

                <div class="card-body p-3 flex justify-center text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="flex">
                        <form wire:submit.prevent="save" enctype="multipart/form-data" action="/profile" method="POST">
                            <div class="form-group p-2 row mx-auto">
                                <label for="Title" class="col-md-4 col-form-label text-lg text-md-right">Title</label>
                                <input wire:model="title" type="text" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control text-center" required>
                                @if ($errors->has('title'))
                                    <p style="color: red">{{$errors->first('title')}}</p>
                                @endif
                            </div>

                            <div class="form-group p-2 row mx-auto">
                                <label for="content" class="col-md-4 col-form-label text-lg text-md-right">Content</label>
                                <input wire:model="content" type="text" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control text-center" required>
                                @if ($errors->has('content'))
                                    <p style="color: red">{{$errors->first('content')}}</p>
                                @endif
                            </div>

                        
                            <br>
                            <button type="submit" class="bg-gray-300 text-lg text-gray-600 hover:bg-gray-200 px-4 py-2 rounded btn btn-primary">Save</button>
                        </form>                    
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
