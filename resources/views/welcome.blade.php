@extends('layouts.app')

@section('content')
<div class="row my-5 row-hero ">
    <div class="col-5 rounded-end" id="home-hero"></div>
    <div class="col-7 card-col pt-5">
        <div class="container">
            <div class="card">
                <div class="card-body p-5">
                    <h4>Login</h4>
                    <form class="mt-5" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="staticEmail" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  id="inputPassword">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100" >
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
