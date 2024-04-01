@extends('layouts.auth-master')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow p-4" style="height: 400px;">
                <div class="card-body">
                    <h1 class="h3 mb-4 fw-normal text-center">Login</h1>
                    @include('layouts.partials.messages')
                    <form method="post" action="{{ route('login.perform') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label visually-hidden">Email or Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Email or Username" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label visually-hidden">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value="1" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <div>
                                <a href="{{ route('forget.password.get') }}" class="text-decoration-none">Forgot password?</a>
                            </div>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
