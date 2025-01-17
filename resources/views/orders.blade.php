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

<!-- زر فتح القائمة الجانبية -->
<button class="nav-btn open-btn">
    <i class="fas fa-bars"></i>
</button>

<!-- القائمة الجانبية -->
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
                <li><a href="{{ route('add-product') }}">Add Product</a></li>
                <li><a href="{{ route('add-store') }}">Add Store</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- العنوان الرئيسي -->
<h1 id="t">Orders to send</h1>

<!-- الجدول -->
<div class="container">
    <table class="table table-bordered table-dark" id="mytable">
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
                    <td>
                        <button class="ripple send-order-btn" data-order-id="{{ $order['id'] }}">SEND</button>
                    </td>
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

<!-- النافذة المنبثقة -->
<div class="modal fade" id="driverModal" tabindex="-1" aria-labelledby="driverModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="driverModalLabel">Select a Driver</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul id="driver-list">
                    @foreach($drivers as $driver)
                        <li>
                            <button class="select-driver btn btn-link" data-driver-id="{{ $driver->id }}" data-order-id="">
                                {{ $driver['name'] }} {{ $driver['phone'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

<script>
    $(document).ready(function() {
        // عند النقر على زر SEND
        $('.send-order-btn').click(function() {
            const orderId = $(this).data('order-id'); // الحصول على order_id من الزر

            // تعيين order_id للأزرار داخل النافذة المنبثقة
            $('.select-driver').attr('data-order-id', orderId);

            // عرض النافذة المنبثقة
            $('#driverModal').modal('show');
        });

        // عند اختيار سائق
        $(document).on('click', '.select-driver', function() {
            const driverId = $(this).data('driver-id');
            const orderId = $(this).data('order-id');

            // إرسال الـ ID إلى API لتحديث حقل driver_id
            $.post('/api/orders/assign-driver', { driver_id: driverId, order_id: orderId }, function(response) {
                alert('تم تعيين السائق بنجاح!');
                $('#driverModal').modal('hide'); // إغلاق النافذة المنبثقة
                location.reload(); // إعادة تحميل الصفحة
            }).fail(function(error) {
                alert('حدث خطأ أثناء تعيين السائق.');
            });
        });
    });
</script>
</body>
</html>
