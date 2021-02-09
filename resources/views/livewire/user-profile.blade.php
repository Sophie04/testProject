<div>
	<form wire:submit.prevent="save" enctype="multipart/form-data">
	    <label for="firstName">First Name</label>
	    <input wire:model="firstName" type="text" class="form-control" id="firstName" required>
	    @if ($errors->has('firstName'))
	    	<p style="color: red">{{$errors->first('firstName')}}</p>
	    @endif

	    <label for="lastName">Last Name</label>
	    <input wire:model="lastName" type="text" class="form-control" id="lastName" required>
	    @if ($errors->has('lastName'))
	    	<p style="color: red">{{$errors->first('lastName')}}</p>
	    @endif

	    <label for="email">Email</label>
	    <input wire:model="email" type="text" class="form-control" id="email" required>
	    @if ($errors->has('email'))
	    	<p style="color: red">{{$errors->first('email')}}</p>
	    @endif

	    <label for="description">Description</label>
	    <input wire:model="description" type="text" class="form-control" id="description" required>
	    @if ($errors->has('description'))
	    	<p style="color: red">{{$errors->first('description')}}</p>
	    @endif

	    <!-- <label>Profile Photo</label>
	    @if ($errors->has('photo'))
	    	<p style="color: red">{{$errors->first('photo')}}</p>
	    @endif -->
	    <label for="photo">Avatar</label>
    	<input type="file" wire:model="photo" name="photo" id="photo" class="border border-gray-400 p-2 w-full">
    	@error('photo') <span class="error">{{$message}}</span>@enderror
    	<br>
    	<button type="submit" class="btn btn-primary">Save</button>
    </form>

    
</div>
