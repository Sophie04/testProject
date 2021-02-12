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

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
