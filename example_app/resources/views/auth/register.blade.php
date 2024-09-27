
@extends('layouts.default')
@section('title','Registration')
@section('content')

<div class="container">
    <h1 class="text-center">Signup to our website</h1>
    @if (session()->has('success'))
        {{ sesion()->get('success') }}
    @endif
    @if (session()->has('error'))
        {{ sesion()->get('error') }}
    @endif
    <form action="{{ route('register.save') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" value="" placeholder="" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email">
          </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="userpassword" name="password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="password_confirmation">
        </div>


        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <a href="/"><button type="button" class="btn btn-primary">Already have account? Login here</button></a>
</div>
