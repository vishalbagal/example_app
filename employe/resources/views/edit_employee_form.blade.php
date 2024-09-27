<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Data</title>
</head>


<body>
<form action="{{route('update.employee')}}" method="post">
<input type="hidden" name="id" value="{{$edit_data->id}}">
        @csrf
        Name: <input type="text" name="name" value="{{$edit_data->name}}">
        <span style="color:red;">@error('name') {{$message}} @enderror</span><br><br>
        Email: <input type="email" name="email" value="{{$edit_data->email}}">
        <span style="color:red;">@error('email') {{$message}} @enderror</span><br><br>
        Department: <input type="text" name="department" value="{{$edit_data->department}}">
        <span style="color:red;">@error('department') {{$message}} @enderror</span><br><br>
        Select Department:  <select name="department">
            <option value="Design">Design</option>
            <option value="Development">Development</option>
            <option value="Testing">Testing</option>
            <option value="Marketing">Marketing</option>
            <option value="HR">HR</option>
        </select><br>
        <span style="color:red;">@error('department') {{$message}} @enderror</span><br><br>
        Address: <textarea name="address" id="" cols="20" rows="10">{{$edit_data->address}}</textarea><br><br>
        <span style="color:red;">@error('address') {{$message}} @enderror</span><br><br>
        <input type="submit" value="update">
    </form>
</body>
</html>
