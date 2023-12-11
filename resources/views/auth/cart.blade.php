<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XiAO DiNG DoNG · Cart</title>
    <link rel="stylesheet" href="{{ asset('css/auth/cart.css') }}">
    <link rel="icon" href="{{ asset('images\icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"
</head>
<body class="body-class">
    @if ($errors->any())
        <div class="login-page-error-alerts">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="alert-message">{{ $error }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @elseif (session('success'))
        <div class="edit-profile-page-success-alerts">
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-message">{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <x-Navbar/>
    <div class="cart-body">
        <div class="cart-main">
            <div class="cart-title">
                <h2>您的购物车 | Your Cart</h2>
            </div>
            @if (count($cart->cartItems) > 0)
                <table class="cart-table">
                    <thead class="cart-table-header">
                        <tr class="cart-table-header-row">
                            <th>Food</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody class="cart-table-body">
                        @foreach ($cart->cartItems as $cartItem)
                            <tr>
                                <td class="table-content">{{ $cartItem->menu->food_name }}</td>
                                <td class="table-content">${{ $cartItem->menu->food_price }}</td>
                                <td class="table-content-q">
                                    <form action="{{ route('decreaseQuantity', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger">-</button>
                                    </form>

                                    {{ $cartItem->quantity }}
                                    
                                    <form action="{{ route('increaseQuantity', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger">+</button>
                                    </form>
                                </td>
                                <td class="table-content">${{ $cartItem->menu->food_price * $cartItem->quantity }}</td>
                                <td class="table-content">
                                    <form action="{{ route('deleteFromCart', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="checkout-res">
                    <h2>Total: ${{ $total }}</h2>
                    <form action="{{ route('checkout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger">Proceed to Checkout</button>
                    </form>
                </div>
            @else
                <div class="cart-empty-message">
                    <div class="cart-empty-message-title">Your cart is empty...</div>
                    <div class="cart-empty-message-content">
                        Looks like your cart is on a diet!
                        Don't worry, our delicious dishes are just a few clicks away.
                        Start filling up your cart and let the feast begin!
                    </div>
                </div>
            @endif
        </div>
    </div>
    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
