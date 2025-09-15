@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-2 border-warning rounded-3">
                <div class="card-header text-center bg-black text-warning fw-bold fs-4">
                    {{ __('Reset Password') }}
                </div>

                <div class="card-body bg-dark text-light p-4">
                    @if (session('status'))
                        <div class="alert alert-success text-center fw-semibold" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

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

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit"
                                    class="btn btn-warning fw-bold px-4 shadow-sm border border-2 border-black">
                                    {{ __('Send Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-footer bg-black text-center text-muted small">
                    <span class="text-warning">{{ __('Enter your email to reset your password') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
