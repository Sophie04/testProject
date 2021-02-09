<div>
	<form wire:submit.prevent="save" enctype="multipart/form-data" action="/profile" method="POST">
	    <label for="firstName">First Name</label>
	    <input wire:model="firstName" type="text" class="form-control" required>
	    @if ($errors->has('firstName'))
	    	<p style="color: red">{{$errors->first('firstName')}}</p>
	    @endif

	    <label for="lastName">Last Name</label>
	    <input wire:model="lastName" type="text" class="form-control" required>
	    @if ($errors->has('lastName'))
	    	<p style="color: red">{{$errors->first('lastName')}}</p>
	    @endif

	    <label for="email">Email</label>
	    <input wire:model="email" type="text" class="form-control" required>
	    @if ($errors->has('email'))
	    	<p style="color: red">{{$errors->first('email')}}</p>
	    @endif

	    <label for="description">Description</label>
	    <input wire:model="description" type="text" class="form-control" required>
	    @if ($errors->has('description'))
	    	<p style="color: red">{{$errors->first('description')}}</p>
	    @endif

	    <!-- <label>Profile Photo</label>
	    @if ($errors->has('photo'))
	    	<p style="color: red">{{$errors->first('photo')}}</p>
	    @endif -->
	    <label for="photo">Avatar</label>
    	<input type="file" wire:model="photo" name="photo" accept="image/png, image/jpeg" class="border border-gray-400 p-2 w-full" required>
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    	@error('photo') <span class="error">{{$message}}</span>@enderror
    	<br>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>

    
</div>
