{{-- this is for summernote package in laravel --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>

    <link rel="stylesheet" href="summernote/summernote.css">
    <link rel="stylesheet" href="summernote/summernote-lite.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="summernote/summernote.js"></script>
    <script src="summernote/summernote-lite.min.js"></script>
    <style>
        .editordata{

            width: 10px;
            height: 20px;
        }
    </style>
</head>
<body>




    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>

</body>
</html>
 --}}




 {{-- this is for a datatable package in laravel --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <div class="mt-3">
            <label for="about_description" class="col-form-label">Description:</label>
            <textarea class="summernote" name="about_description" id="about_description" placeholder="Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div>
    </form>
    @if(Session::has('success'))
        {{ Session::get('success') }}
@endif
    <h1>Employee List</h1>
    <table border="2">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Address</th>
            <th colspan="2">Action</th>
        </tr>
        <tbody>
            @foreach($employee_data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->department}}</td>
                    <td>{{$item->address}}</td>
                    <td><a href="edit_employee_data/{{$item->id}}">Edit</a></td>
                    <td><a href="delete_employee_data/{{$item->id}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table><br>

    <button><a href="add_employee_data">Add Employee</a></button>
</body>
</html>
