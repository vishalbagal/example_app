<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Crud</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .hide{
            display: none;
        }
    </style>
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
                        <h3>Create Product</h3>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="cv_name" class="form-label h5">Name:</label>
                                <input type="text" value="{{ old('cv_name') }}" class="form-control form-control-lg" placeholder="cv_name" name="cv_name">

                                <span style="color:red;">@error('cv_name') {{$message}} @enderror</span>
                            </div>

                            <div>
                                <label for="industry_name" class="form-label h5">Industry Name:</label>
                                <div class="input-group mb-3">
                                    <select name="industry_name" id="industry_name" class="form-control form-control-lg">
                                        <option value="0">Select Industry</option>
                                        @foreach ($industry_data as $item)
                                            <option value="{{ $item->industry_id }}">{{ $item->industry_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                                <label for="sub_industry_name" class="form-label h5">Sub Industry Name:</label>
                                <div class="input-group mb-3">
                                    <select name="sub_industry_name" id="sub_industry_name" class="form-control form-control-lg" disabled>
                                        <option value="0">select sub industry</option>
                                        @foreach ($sub_industry_data as $item)
                                            <option value="{{ $item->sub_industry_id }}" class="{{ $item->parent_industry_id }}">{{ $item->sub_industry_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div>
                            </div>

                            <div class="col-md-6">
                                <label for="cv_logo" class="form-label h5">Logo:</label>
                                <div class="input-group mb-3">
                                    <div class="btn btn-info btn-file btn-sm">
                                        Upload
                                        <input type="file" id="cv_logo" name="cv_logo" onchange="uploadcvLogo.cvLogo()">
                                    </div>
                                    <div class="mtop10 cv_logo mt-3">
                                        <img src="{{url('/images/no-image.jpg')}}" alt="" class="noImg">
                                        <img id="cv_logo_preview" src="" alt="" class="previewImg hide">
                                    </div>
                                </div>
                                <span class="text-danger">@error('cv_logo') {{ $message }} @enderror</span>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('custom/js/custom.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  </body>
</html>
