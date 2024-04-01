@extends('layouts.auth-master')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <div class="card-body">
                    <h1 class="h3 mb-4 fw-normal text-center">Register</h1>
                    @include('layouts.partials.messages')
                    <form method="post" action="{{ route('register.perform') }}" class="d-flex flex-column">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label visually-hidden">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label visually-hidden">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label visually-hidden">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label visually-hidden">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-lg btn-primary w-100" type="submit">Register</button>
                        </div>
                        <div class="mb-3">
    <label for="user_type" class="form-label visually-hidden">User Type</label>
    <select class="form-select" id="user_type" name="user_type">
        <option value="user" {{ old('user_type') == 'user' ? 'selected' : '' }}>User</option>
        <option value="mechanicien" {{ old('user_type') == 'mechanicien' ? 'selected' : '' }}>Mechanicien</option>
        <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Admin</option>
    </select>
    @if ($errors->has('user_type'))
        <span class="text-danger text-left">{{ $errors->first('user_type') }}</span>
    @endif
</div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
