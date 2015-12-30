@extends('layouts.default')
@section('title', 'Sign Up')
@section('content')
<h1>Sign Up</h1>
    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif
    <form method="post" action="sign-up" role="form">
        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" required id="name" name="name" class="form-control" value="{{ isset($name) ? $name : '' }}"><br>
        </div>
        <div class="form-group">
            <label for="name">Email: </label>
            <input type="email" required id="email" name="email" class="form-control" value="{{ isset($email) ? $email : '' }}"><br>
        </div>
        <div class="form-group">
            <label for="password">Password: </label>
            <input type="password" required id="password" name="password" class="form-control"><br>
        </div>
        <div class="form-group">
            <label for="passwordCheck">Re-enter Password: </label>
            <input type="password" required id="passwordCheck" name="passwordCheck" class="form-control"><br>
        </div>
        <button type="submit" class="btn btn-default">Sign Up</button>
    </form>
@stop