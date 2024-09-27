@extends('layouts.default')
@section('title','Login')

@section('content')

    <div class="container my-3 pl-80" style="display: flex; align-items: center;min-height: 50vh; justify-content:center; background-color:rgb(170, 91, 91);">
        <div class="card " style="width: 18rem;">
            <div class="card-header text-white" style=" background-color:rgb(116, 177, 124);">
                <h1>Login</h1>
                @if (session()->has('success'))
                    {{ session()->get('success') }}
                @endif
                @if (session()->has('error'))
                    {{ session()->get('error') }}
                @endif
                <form action="{{ route('check.login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your mail">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{ route('register') }}" class="">Don't have account? Register here</a>
                </form>
            </div>

        </div>
    </div>

@endsection
