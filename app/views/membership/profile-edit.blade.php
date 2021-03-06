@extends('layouts.default')
@section('title', 'Edit Profile')
@section('content')
<h1>Edit Profile</h1>
@include('membership.profile-menu')
    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif
    <form method="post" action="" role="form">
        <div class="form-group">
            <label for="name">Username: </label>
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
        <button type="submit" class="btn btn-default">Update</button>
    </form>
@stop