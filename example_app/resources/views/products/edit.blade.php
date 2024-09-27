<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Crud</title>
  </head>
  <body>
    <div class="bg-dark text-white">
        @if(session()->has('error'))
            {{ session()->get('error') }}
        @endif
    </div>
    <div class="bg-dark py-3">
        <h1 class="text-white text-center">Laravel crud operations</h1>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <div class="card borde-0 shadow-lg my-4">
                    <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark text-white">
                        <h3>Edit Product</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('products.update',$productData->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label h5">Name:</label>
                                <input type="text" value="{{ old('name',$productData->name) }}" class="form-control form-control-lg" placeholder="Name" name="name">
                                <span style="color:red;">@error('name') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="sku" class="form-label h5">Sku:</label>
                                <input type="text" value="{{ old('sku',$productData->sku) }}" class="form-control form-control-lg" placeholder="SKU" name="sku">
                                <span style="color:red;">@error('sku') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label h5">Price:</label>
                                <input type="text" value="{{ old('price',$productData->price) }}" class="form-control form-control-lg" placeholder="price" name="price">
                                <span style="color:red;">@error('price') {{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label h5">Description:</label>
                                <textarea placeholder="description" name="desc" id="desc" cols="30" rows="5" class="form-control">{{ old('desc',$productData->description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label h5">Image:</label>
                                <input type="file" class="form-control form-control-lg" placeholder="image" name="image">

                                @if($productData->image != '')
                                    <img class="my-3" src="{{ asset('uploads/products/'.$productData->image) }}" alt="" style="width: 100px; height: 100px;">

                                @endif
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


  </body>
</html>
