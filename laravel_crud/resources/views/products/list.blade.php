@extends('layouts.main')

@section('content')



<div class="bg-dark text-white">
    @if(session()->has('success'))
        {{ session()->get('success') }}
    @endif
    @if(session()->has('error'))
        {{ session()->get('error') }}
    @endif
</div>
<div class="bg-dark py-3 ml-100">
    <h1 class="text-white text-center">Laravel crud operations</h1>
</div>

<div class="container">
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <div class="card borde-0 shadow-lg my-4">
                <a href="{{ route('products.create') }}" class="btn btn-dark">Add Product</a>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        @if(session()->has('success'))
            {{ session()->get('success') }}
        @endif
        @if(session()->has('error'))
            {{ session()->get('error') }}
        @endif
        <div class="col-md-10">
            <div class="card borde-0 shadow-lg my-4">
                <div class="card-header bg-dark text-white">
                    <h3>Products</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th></th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                        @if($data != '')
                        @foreach ($data as $item )
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                @if($item->image != '')
                                    <img src="{{ asset('uploads/products/'.$item->image) }}" alt="" style="width: 50px; height: 50px;">
                                @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->sku }}</td>
                            <td>${{ $item->price }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}</td>
                            <td>
                                <a href="{{ route('products.edit',$item->id) }}" class="btn btn-dark">Edit</a>
                                <a href="{{ route('products.delete',$item->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
