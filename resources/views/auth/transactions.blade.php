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
                <h2>您的购物车 | Transaction History</h2>
            </div>
            @if (count($transactions) > 0)
                <table class="cart-table">
                    <thead class="cart-table-header">
                        <tr class="cart-table-header-row">
                            <th>Transaction ID</th>
                            <th>Purchase Date</th>
                            <th>Food Name</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody class="cart-table-body">
                        @foreach ($transactions as $transaction)
                            @foreach ($transaction->transactionItems as $transactionItem)
                                <tr>
                                    <td>{{ $transactionItem->transaction_id }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transactionItem->menu->food_name }}</td>
                                    <td>{{ $transactionItem->menu->food_price * $transactionItem->quantity }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="cart-empty-message">
                    <div class="cart-empty-message-title">There are no transactions yet...</div>
                    <div class="cart-empty-message-content">
                        Poof! Transaction history gone. Time to make delicious memories all over again.
                        Let's fill this blank page with savory stories and culnary adventures. Bon appetit!
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
