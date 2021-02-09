@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img src="/uploads/{{ $user->photo }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>{{ $user->firstName }}'s Profile</h2>
                </div>
                <div class="card-body">
                    @livewire('user-profile')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

