@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex row justify-center text-gray-700">
        <div class="col-md-8">
            <div class="card box-border px-20 py-6 border-4 border-gray-300 rounded">
                <div class="card-header box-border border-b-2 flex justify-center font-medium text-2xl">{{ __('Login') }}</div>

                <div class="card-body p-3 flex justify-center text-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group p-2 row mx-auto">
                            <label for="email" class="col-md-4 col-form-label text-lg text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2 row mx-auto">
                            <label for="password" class="col-md-4 col-form-label text-lg text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="bg-gray-200 focus:bg-gray-100 box-border rounded form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group p-2 row mx-auto">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mx-auto">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="bg-gray-300 text-lg text-gray-600 hover:bg-gray-200 px-4 py-2 rounded btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="px-2 text-sm btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
