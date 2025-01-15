<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Orders</title>
</head>
<body>

<button class="nav-btn open-btn">
    <i class="fas fa-bars"></i>
</button>

<div class="nav nav-black">
    <div class="nav nav-red">
        <div class="nav nav-white">
            <button class="nav-btn close-btn">
                <i class="fas fa-times"></i>
            </button>

            <img src="{{ asset('webImages/logo2.jpg') }}" alt="Logo" class="logo">
            <p class="text" id="mytitle">Beeb Beeb</p>

            <ul class="list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('orders') }}">Orders</a></li>
                <li><a href="{{ route('drivers') }}">Drivers</a></li>
            </ul>
        </div>
    </div>
</div>

<h1 id="t">Orders to send</h1>

<div class="container">
    <table table class="table table-bordered table-dark" id="mytable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order ID</th>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col">
                <div class="orders-header">
                    Orders
                    <div class="product-quantity-labels">
                        <span id="s2">Product Name</span><span id="s">|||</span><span>Quantity</span>
                    </div>
                </div>
            </th>
            <th scope="col">Total Price</th>
            <th>Send Order</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($pendingOrders) && count($pendingOrders) > 0)
            @foreach($pendingOrders as $index => $order)
                <tr>
                    <th scope="row"></th>
                    <td>{{ $order['id'] }}</td>
                    <td>{{$order['user']['first-name'] }} {{ $order['user']['last-name']}}</td>
                    <td>{{ 'N/A' }}</td>
                    <td>
                        <dl class="product-list">
                            @php
                                $items = json_decode($order['items'], true); // تحويل items من JSON إلى Array
                            @endphp
                            @foreach($items as $item)
                                <dt>{{ $item['product']['name'] ?? 'N/A' }}</dt>
                                <dd>{{ $item['quantity'] ?? 'N/A' }}</dd>
                            @endforeach
                        </dl>
                    </td>
                    <td>{{ $order['total_amount'] }}</td>
                    <td><button href="#" class="ripple">SEND</button></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">No pending orders found</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
