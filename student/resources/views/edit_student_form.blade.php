<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Data</title>
</head>
<body>
<body>
    <form action="{{route('update.student')}}" method="post">
        <input type="hidden" name="id" value="{{$edit_data->id}}">
        @csrf
        Name: <input type="text" name="name" value="{{$edit_data->name}}"><br><br>
        <span style="color:red;">@error('name') {{$message}} @enderror</span>
        Age: <input type="text" name="age" value="{{$edit_data->age}}"><br><br>
        <span style="color:red;">@error('age') {{$message}} @enderror</span>
        Standard: <input type="text" name="standard" value="{{$edit_data->standard}}"><br><br>
        <span style="color:red;">@error('standard') {{$message}} @enderror</span>
        Address: <textarea name="address" id="" cols="20" rows="10">{{$edit_data->address}}</textarea><br><br>
        <span style="color:red;">@error('address') {{$message}} @enderror</span>
        <input type="submit" value="update">
    </form>
</body>
</body>
</html>