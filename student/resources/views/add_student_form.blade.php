<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student Form</title>
</head>
<body>
    <form action="save_student_data" method="post">
        @csrf
        Name: <input type="text" name="name" value="{{old('name')}}"><br><br>
        <span style="color:red;">@error('name') {{$message}} @enderror</span>
        Age: <input type="text" name="age" value="{{old('age')}}"><br><br>
        <span style="color:red;">@error('age') {{$message}} @enderror</span>
        Standard: <input type="text" name="standard" value="{{old('standard')}}"><br><br>
        <span style="color:red;">@error('standard') {{$message}} @enderror</span>
        Address: <textarea name="address" id="" cols="20" rows="10"></textarea><br><br>
        <span style="color:red;">@error('address') {{$message}} @enderror</span>
        <input type="submit" value="submit">
    </form>
</body>
</html>