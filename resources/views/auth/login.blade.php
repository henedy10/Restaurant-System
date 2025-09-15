@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-2 border-warning rounded-3">
                <div class="card-header text-center bg-black text-warning fw-bold fs-4">
                    <span><a href="{{ route('index') }}" class="nav-link">{{__('Nice Restaurant')}}</a></span>
                    <span>{{ __('Login') }}</span>
                </div>

                <div class="card-body bg-dark text-light p-4">
                    <form method="POST" action="{{ route('login') }}"
                            class="p-4  border-warning rounded-3 shadow-sm">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-warning fw-semibold">
                                {{ __('Email Address') }}
                            </label>
                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control bg-black text-warning border-warning @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-warning">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-warning fw-semibold">
                                {{ __('Password') }}
                            </label>
                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control bg-black text-warning border-warning @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-warning">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input bg-black border-warning" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-warning fw-semibold" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 d-flex align-items-center gap-2">
                                <button type="submit"
                                    class="btn btn-warning fw-bold px-4 shadow-sm border border-2 border-black">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-warning fw-semibold"
                                       href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-black  text-center text-muted small">
                    <span class="text-warning">{{ __('Welcome back! Please login to continue.') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
