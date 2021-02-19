@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex row justify-center text-gray-700">
        <div class="col-md-8">
            <div class="card box-border px-20 py-6 border-4 border-gray-300 rounded">
                <div class="card-header box-border border-b-2 flex justify-center font-medium text-2xl p-2">
                New Post                    
                </div>
                <div class="card-body p-3 flex justify-center text-center">
                    <div>
						<form wire:submit.prevent="save" enctype="multipart/form-data" action="/posts" method="POST">
							@csrf
						    <div class="form-group p-2 row mx-auto">
							    <label for="title" class="col-md-4 col-form-label text-lg text-md-right">Title</label>
							    <input name="title" type="text" style="display: block;" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control mx-auto text-center" required>							    
							</div>
							@if ($errors->has('title'))
							    <p style="color: red">{{$errors->first('title')}}</p>
							@endif

						    <div class="form-group p-2 row mx-auto">
							    <label for="content" class="col-md-4 col-form-label text-lg text-md-right">Content</label>
							    <textarea name="content" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control mx-auto text-center" style="display: block; width: 100%; overflow: hidden; resize: both;" required>
								</textarea>
							</div>		    
							@if ($errors->has('content'))
							    <p style="color: red">{{$errors->first('content')}}</p>
							@endif
							
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



