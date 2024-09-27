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

  {{-- <div class="row d-flex justify-content-center">
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
                            <th>Industry name</th>
                            <th>Sub Industry name</th>
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
                            <td>{{ $item->industry_id }}</td>
                            <td>{{ $item->sub_industry_id }}</td>
                            <td>
                                <a href="{{ route('products.edit',$item->id) }}" class="btn btn-dark">Edit</a>
                                <a href="{{ route('products.disable',$item->id) }}" class="btn btn-dark">Disable</a>
                                <a href="{{ route('products.edit',$item->id) }}" class="btn btn-dark">Preview&Publish</a>
                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</div>

{{-- <div class="container">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Industry Name</th>
                <th>Sub Industry Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div> --}}


<div class="container">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>department</th>
                <th>address</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script type="text/javascript">
    $(function() {
        gb_DataTable = $(".data-table").DataTable({
            autoWidth: false,
            order: [0, "ASC"],
            processing: true,
            serverSide: true,
            searchDelay: 2000,
            paging: true,
            ajax: "{{ route('blogs.index') }}",
            iDisplayLength: "25",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'department', name: 'department' },
                { data: 'address', name: 'address' },
            ],
            lengthMenu: [25, 50, 100]
        });
    });
</script>



@endsection
