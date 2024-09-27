
@extends('layouts.default')
@section('title','Registration')
@section('content')

<div class="container">
    @if(session()->has('success'))
        {{ session()->get('success') }}
    @endif
    @if(session()->has('error'))
        {{ session()->get('error') }}
    @endif
    <h1 class="text-center">Signup to our website</h1>
    <form action="{{ route('register.post') }}" method="post">
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

        <div class="mb-3">
            <label for="role" class="form-label">User Role:</label>
            <div class="input-group">
              <select class="form_control_inner dropdownDownArrow" name="role" id="role">
                  <option value="0">Select Role</option>
                  @foreach ($data as $item)
                      <option value="{{ $item->id }}" {{ ( $item->id  ==  1 ) ? 'selected' : '' }}> {{ $item->role_name }} </option>
                  @endforeach
              </select>
              <input type="hidden" name="sel_role" value="1">
            </div>
          </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <a href="/"><button type="button" class="btn btn-primary">Already have account? Login here</button></a>
</div>
