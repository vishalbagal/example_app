{{-- @if(session()->has('LoggedUser'))
    <div class="container">
        <h1>Welcome to Laravel world</h1>
        <a href="{{route('exit')}}"><button type="button" class="btn btn-primary">logout</button></a>
    </div>
@else
    please login and come here
    <a href="{{route('login')}}"><button type="button" class="btn btn-primary">login</button></a>
@endif --}}

{{-- <div class="container">
    <h1>Welcome to Laravel world</h1>
    <a href="{{route('exit')}}"><button type="button" class="btn btn-primary">logout</button></a>
</div> --}}


@extends('layouts.main')

@section('content')
    @if(session()->has('LoggedUser') )
        <div class="container">
            <h1>Welcome to Laravel world</h1>
                <div class="jumbotron">
                    <h1 class="display-4">Hello, world!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
                </div>
        </div>

    @endif
@endsection


{{-- if(!session()->has('LoggedUser') && $request->path() != '/')
{
    return redirect('/')->with('fail','Login to Proceed');
}
 --}}
