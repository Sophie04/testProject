<div>
	<form wire:submit.prevent="save" enctype="multipart/form-data" action="/profile" method="POST">
	    <div class="form-group p-2 row mx-auto">
		    <label for="firstName" class="col-md-4 col-form-label text-lg text-md-right">First Name</label>
		    <input wire:model="firstName" type="text" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control text-center" required>		    
		</div>
		@if ($errors->has('firstName'))
		    <p style="color: red">{{$errors->first('firstName')}}</p>
		@endif

	    <div class="form-group p-2 row mx-auto">
		    <label for="lastName" class="col-md-4 col-form-label text-lg text-md-right">Last Name</label>
		    <input wire:model="lastName" type="text" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control text-center" required>
		</div>		    
		@if ($errors->has('lastName'))
		    <p style="color: red">{{$errors->first('lastName')}}</p>
		@endif

		<div class="form-group p-2 row mx-auto">
		    <label for="email" class="col-md-4 col-form-label text-lg text-md-right pr-11">Email</label>
		    <input wire:model="email" type="email" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control text-center" required>
		</div>
		@if ($errors->has('email'))
		    <p style="color: red">{{$errors->first('email')}}</p>
		@endif

		<div class="form-group p-2 row mx-auto">
		    <label for="description" class="col-md-4 col-form-label text-lg text-md-right">Description</label>
		    <input wire:model="description" type="text" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control text-center" required>		    
		</div>
		@if ($errors->has('description'))
		    <p style="color: red">{{$errors->first('description')}}</p>
		@endif

	    <!-- <label>Profile Photo</label>
	    @if ($errors->has('photo'))
	    	<p style="color: red">{{$errors->first('photo')}}</p>
	    @endif -->
	    <div class="form-group p-2 row mx-auto flex flex-wrap justify-center">
		    <label for="photo" class="col-md-4 col-form-label text-lg text-md-right flex justify-center">Avatar</label>
	    	<input type="file" wire:model="photo" name="photo" accept="image/png, image/jpeg" class="border border-gray-400 p-2 w-full flex text-center rounded" required>
	    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    	@error('photo') <span class="error text-center">{{$message}}</span>@enderror
	    </div>
    	<br>
    	<button type="submit" class="bg-gray-300 text-lg text-gray-600 hover:bg-gray-200 px-4 py-2 rounded btn btn-primary">Save</button>
    </form>

    
</div>
