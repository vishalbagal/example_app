<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <div class="container mt-5">
            <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
            <table class="table table-bordered yajra-datatable">
                <thead>
                    <tr>
                    <th>Cv Name</th>
                    <th>Industry Name</th>
                    <th>Sub Industry Name</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js">
        </script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js">
        </script>

        <script type="text/javascript">
        $(function () {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('testtable.list') }}",
            columns: [

                {data: 'cv_name', name: 'cv_name'},
                {data: 'industry', name: 'industry'},
                {data: 'sub_industry', name: 'sub_industry'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

        });
        </script>
</html>
