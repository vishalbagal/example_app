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
    <h1 class="text-white text-center">Laravel CRUD Operations</h1>
</div>

<div class="container">
    <div class="row d-flex justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <div class="card border-0 shadow-lg my-4">
                <a href="{{ route('products.create') }}" class="btn btn-dark">Add Product</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Industry Name</th>
                    <th>Sub Industry Name</th>
                    <th>Image</th>
                    <th style="width:25%">
                        <div style="display: flex; flex-direction:row; align-items: center">
                          <span style="margin-right: 10px">Action</span>
                          <select id='status' class="card_inputs dropdownDownArrow" style="width: 150px">
                            <option value="">Select Status</option>
                            <option value="Edit">Edit</option>
                            {{-- <option value="Unpublished">Unpublished</option>
                            <option value="Disabled">Disabled</option> --}}
                          </select>
                        </div>

                      </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

<script type="text/javascript">
    $(function() {
        gb_DataTable = $(".data-table").DataTable({
            autoWidth: false,
            order: [0, "ASC"],
            processing: true,
            serverSide: true,
            searchDelay: 2000,
            paging: true,
            ajax: "{{ route('products.index') }}",
            iDisplayLength: 25,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'industry_id', name: 'industry_id' },
                { data: 'sub_industry_id', name: 'sub_industry_id' },
                { data: 'image', name: 'image' },
                { data: 'action', name: 'action' }
            ],
            lengthMenu: [25, 50, 100]
        });
    });
</script>
@endpush
