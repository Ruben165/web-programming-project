<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XiAO DiNG DoNG · Detail</title>
    <link rel="stylesheet" href="{{ asset('css/public/menu.css') }}">
    <link rel="icon" href="{{ asset('images\icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="body-class">
    @if (isset($success))
        <div class="edit-profile-page-success-alerts">
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-message">{{ $success }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <x-Navbar/>
    <div class="detail-body">
        <div class="detail-title">
            <h1>食物细节 | Food Detail</h1>
        </div>
        <div class="detail-main">
            <div class="detail-img">
                <img src="{{asset('storage/images/'.$menu->food_img)}}" alt="Food">
            </div>
            <div class="detail-info">
                <form action="{{ route('addToCart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{$menu->food_id}}">
                    <h2>{{$menu->food_name}}</h2>
                    <div class="info-extra">
                        <h4>Food Type</h4>
                        <p>{{$menu->food_type}}</p>
                    </div>
                    <div class="info-extra">
                        <h4>Food Price</h4>
                        <p>${{$menu->food_price}}</p>
                    </div>
                    <div class="info-extra">
                        <h4>Brief Description</h4>
                        <p>{{$menu->brief_desc}}</p>
                    </div>
                    <div class="info-extra">
                        <h4>About This Food</h4>
                        <p>{{$menu->about_food}}</p>
                    </div>
                    @if(auth()->check() && auth()->user()->role == 'member')
                        <button type='submit' class="add-cart">Add to Cart</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
