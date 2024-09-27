<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <div class="bg-dark py-3">
        <div>
            <center><h1 class="text-white">Simple Laravel CRUD</h1></center>
`       </div>
        <div class="l">
            <h2>Create Product</h2>
        </div>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div>
            <label>Name </label>
            <input type="text" name="name" placeholder="Name"><br><br>
            @error('name')
                {{$message}}
            @enderror
        </div>

        <div>
            <label>Sku </label>
            <input type="text" name="sku" placeholder="Sku"><br><br>
            @error('sku')
                {{$message}}
            @enderror
        </div>

        <div>
            <label>Price </label>
            <input type="text" name="price" placeholder="Price"><br><br>
        </div>

        <div>
            <label>Description </label>
            <textarea name="description" cols="30" rows="5"></textarea><br><br>
        </div>

        <div>
            <label>Image </label>
            <input type="file" name="image" placeholder="Image"><br><br>
        </div>

        <div>
            <button>Submit</button>
        </div>
    </form>
    </div>
</body>
</html>