<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XiAO DiNG DoNG · Add</title>
    <link rel="stylesheet" href="{{ asset('css/auth/add.css') }}">
    <link rel="icon" href="{{ asset('images\icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="body-class">
    <x-Navbar/>
    @if($errors->any())
        <div class="add-error-alerts">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="alert-message">{{ $error }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @endif
    <div class="add-body">
        <div class="add-title">
            <h1>添加新食物 | Add New Food</h1>
        </div>
        <form action="{{ route('addMenu') }}" method="post" enctype="multipart/form-data" class="form-body">
            @csrf
            <div class="form-col">
                <label for="food_name">Food Name: </label>
                <input type="text" id="food_name" name="food_name" placeholder="Minimum 5 Characters">
            </div>
            <div class="form-col">
                <label for="brief_desc">Food Brief Description: </label>
                <input type="text" id="brief_desc" name="brief_desc" placeholder="Maximum 100 Characters">
            </div>
            <div class="form-col">
                <label for="about_food">Food Full Description: </label>
                <input type="text" id="about_food" name="about_food" placeholder="Maximum 255 Characters">
            </div>
            <div class="form-col"> 
                <label for="food_type">Food Category: </label>
                <select name="food_type" id="food_type">
                    <option value="Main Course" selected>Main Course</option>
                    <option value="Beverages">Beverages</option>
                    <option value="Desserts">Desserts</option>
                </select>
            </div>
            <div class="form-col">
                <label for="food_price">Food Price: </label>
                <input type="number" id="food_price" name="food_price" placeholder="Must be more than 0">
            </div>
            <div class="form-col">
                <label for="food_img">Food Picture: </label>
                <input type="file" name="food_img" id="food_img" required="required">
                @error('food_img')
                    <span class="error-input">Only .jpg, .jpeg, and .png files allowed</span>
                @enderror
            </div>
            <div class="form-submit">
                <button><a class="cancel" href="{{route('home')}}">Cancel</a></button>
                <button type="submit">Add</button>
            </div>
        </form>
    </div>
    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>