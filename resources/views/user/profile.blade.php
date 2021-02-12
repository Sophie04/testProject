@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex row justify-center text-gray-700">
        <div class="col-md-8">
            <div class="card box-border px-20 py-6 border-4 border-gray-300 rounded">
                <div class="card-header box-border border-b-2 flex justify-center font-medium text-2xl p-2">
                    <img src="/uploads/{{ $user->photo }}" style="width:150px; height:150px; border-radius:50%;">
                    <!-- <h2 class="mx-auto my-auto">{{ $user->firstName }}'s Profile</h2> -->
                </div>
                <div class="card-body p-3 flex justify-center text-center">
                    @livewire('user-profile')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
