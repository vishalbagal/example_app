<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee Form</title>
</head>
<body>



    <form action="save_employee_data" method="post">
        @csrf
        Name: <input type="text" name="name" value="">
        <span style="color:red;">@error('name') {{$message}} @enderror</span><br><br>
        Email: <input type="email" name="email" value="">
        <span style="color:red;">@error('email') {{$message}} @enderror</span><br><br>
        Department: <select name="department">
            <option value="design">Design</option>
            <option value="development">Development</option>
            <option value="testing">Testing</option>
            <option value="marketing">Marketing</option>
            <option value="hR">HR</option>
        </select>
        <span style="color:red;">@error('department') {{$message}} @enderror</span><br><br>
        Address: <textarea name="address" id="" cols="20" rows="10"></textarea><br><br>
        <span style="color:red;">@error('address') {{$message}} @enderror</span><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>
