@extends('layouts.default')
@section('title', 'Login')
@section('content')
<h1>Login</h1>
    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif
    <form method="post" action="login" role="form">
        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" required id="email" name="email" class="form-control" value="{{ isset($email) ? $email : '' }}"><br>
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" required id="password" name="password" class="form-control"><br>
        </div>
        <button type="submit" class="btn btn-default">Login</button>
    </form>
@stop