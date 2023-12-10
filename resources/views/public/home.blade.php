<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XiAO DiNG DoNG · Home</title>
    <link rel="stylesheet" href="{{ asset('css\public\home.css') }}">
    <link rel="icon" href="{{ asset('images\icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="body-class">
    <x-Navbar/>
    <div class="home-body">
        <div class="main">
            <div class="main-title1">
                <h1>菜单 | Menu</h1>
            </div>
            <div class="main-buttons">
                <button class="button">
                    <a href="{{route('mainCourse')}}">主菜 | Main Course</a>
                </button>
                <button class="button">
                    <a href="{{route('beverages')}}">饮料 | Beverages</a>
                </button>
                <button class="button">
                    <a href="{{route('desserts')}}">甜点 | Desserts</a>
                </button>
            </div>
            <div class="main-title2">
                <h3>食品和饮料 | Food & Beverages</h3>
            </div>
            @if(count($menu)!=0)
                <div class="main-desc">
                    @foreach($menu as $m)
                        <div class="card-back">
                            <a class="card-info" href="{{'menu/'.$m->food_id}}">
                                <img src="{{asset('storage/images/'.$m->food_img)}}" alt="Food">
                                <p>{{$m->food_name}}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="search-not-found">
                    <p>Food is not available</p>
                </div>
            @endif
        </div>
    </div>
    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
