<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    
    <h1>Student List</h1>   
    @if(Session::has('success'))
        {{ Session::get('success') }}
    @endif 
    <table border="2">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Standard</th>
            <th>Address</th>
            <th colspan="2">Action</th>
        </tr>
        <tbody>
            @foreach ($student_data as $item)
                <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->age}}</td>
                <td>{{$item->standard}}</td>
                <td>{{$item->address}}</td>
                <td><a href="edit_student_data/{{$item->id}}">Edit</a></td>
                <td><a href="delete_student_data/{{$item->id}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table><br>
    <button><a href="add_student">Add Student</a></button>

</body>
</html>