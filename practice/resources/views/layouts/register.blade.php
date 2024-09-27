
@extends('layouts.main')
@section('title','Sign up')

@section('content')

    <div class="container my-3 pl-80" style="display: flex; align-items: center;min-height: 50vh; justify-content:center; background-color:rgb(170, 91, 91);">
        <div class="card " style="width: 18rem;">
            <div class="card-header text-white" style=" background-color:rgb(116, 177, 124);">
                <h1>Sign Up</h1><hr>
                @if (session()->has('success'))
                    {{ session()->get('success') }}
                @endif
                @if (session()->has('error'))
                    {{ session()->get('error') }}
                @endif
                <form action="{{ route('sign-up') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your mail">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter your password">
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter your cpassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                    <a href="{{ route('login') }}" class="">Already have account? Login here</a>
                </form>
            </div>

        </div>
    </div>

@endsection

