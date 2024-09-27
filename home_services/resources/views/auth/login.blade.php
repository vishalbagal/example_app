
@extends('layouts.default')
@section('content')

<div class="container my-3 pl-80">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            @if(session()->has('success'))
                {{ session()->get('success') }}
            @endif
            @if(session()->has('error'))
                {{ session()->get('error') }}
            @endif
            <h1 class="text-center">Login</h1>
            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email">
                  </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="userpassword" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>

        </div>
        <a href="register/"><button type="button" class="btn btn-primary">Don't have account? Register here</button></a>
      </div>
</div>

@endsection



