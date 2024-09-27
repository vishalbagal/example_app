<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .hide{
            display: none;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    @if(Session::has('success'))
    {{ Session::get('success') }}
    @endif
    <form action="{{ route('brandcv') }}" method="post">
        @csrf
        <div class="container">
            <h4 class="card-title"> <a href="">Section 1 - Sonic Radar Name</a> </h4>
            <div id="loadd">
                <label for="cv_name">Name:</label>
                <div>
                    {{-- <input type="hidden" id="bUrl" value="{{ url('get-taxonomy-brands-data') }}"> --}}
                    <select name="cv_name" id="cv_name">
                        <option value="0" class="hide">Select brand name</option>
                        @foreach ($brand_data as $item )
                            <option value="{{ $item->brand_name }}">{{ $item->brand_name }}</option>
                        @endforeach
                    </select>
                </div><br>

                <div class="mb-3">
                    <label for="cv_date">Date: <span>*</span> (MM-YYYY)</label>
                    <div>
                        <input type="date" id="cv_date" name="cv_date" value="{{ old('cv_date') }}" >
                      <span class="text-danger">@error('cv_date') {{ $message }} @enderror</span>
                    </div>
                </div>

                <div>
                    <label for="industry_name">Industry Name:</label>
                    <div>
                        <select name="industry_name" id="industry_name">
                            <option value="0">Select Industry</option>
                            @foreach ($industry_data as $item )
                                <option value="{{ $item->industry_id }}">{{ $item->industry_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><br>

                <div>
                    <label for="sub_industry_name">Sub Industry Name:</label><br>
                    <div>
                        <select name="sub_industry_name" id="sub_industry_name">
                            <option value="0">Select Sub Industry</option>
                            @foreach ($sub_industry_data as $item )
                                    <option value="{{ $item->sub_industry_id }}">{{ $item->sub_industry_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><br>

                <div>
                    <label for="cv_logo">Cv Logo: </label>
                    <div>
                        <input id="cv_logo" name="cv_logo" type='file' onchange="upload(this);" />
                        <img id="image" src="{{url('public/images/no-image.jpg')}}" alt="your image" />
                    </div>
                </div>


            </div><br>
            <button class="btn btn-primary" type="submit">Save as Draft</button>
        </div>

    </form>
    <a href="brandcvs"><button class="btn btn-primary" type="submit">Brand List</button></a>

    <script>
        function upload(input) {
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $wrap = $('#loadd');

    var selectedDropdownId = $wrap.find('select').attr("id");

    console.log("Selected Dropdown ID:", selectedDropdownId);

    var selected = $(this).attr('data-value');
    $wrap.find('.fs-option').removeClass('selected');
    $(this).addClass('selected');
    console.log("Selected :", selected);

    if(selectedDropdownId == 'cv_name') {

        $('#' + selectedDropdownId).on('change', function() {
            console.log("Selected :", selected);
            $('.container').css('background-color', 'violet');
        });
    }



    </script>
</body>
</html>















