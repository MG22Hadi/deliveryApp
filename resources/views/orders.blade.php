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

            <img src="{{ asset('webImages/logo2.png') }}" alt="Logo" class="logo">
            <p class="text" id="mytitle">Beeb Beeb</p>

            <ul class="list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('orders') }}">Orders</a></li>
                <li><a href="{{ route('drivers') }}">Drivers</a></li>
                <li><a href="{{ route('add-product') }}">Add</a></li>
            </ul>
        </div>
    </div>
</div>




<h1 id="t">Orders to send</h1>


<div class="container">
    <table class="table table-bordered table-dark  " id="mytable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">order id</th>
            <th scope="col">name</th>
            <th scope="col">location</th>
            <th scope="col">
                <div class="orders-header">
                    Orders
                    <div class="product-quantity-labels">
                        <span id="s2">product name</span><span id="s">|||</span><span>quantity</span>
                    </div>
                </div></th>
            <th scope="col">Total price</th>
            <th>Send order</th>


        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"></th>
            <th scope="row">1</th>
            <td>Noura</td>
            <td>paris</td><!----
          <td>
            <div class="row">
              <div class="col-6">اسم المنتج 1</div>
              <div class="col-6">الكمية: 2</div>
            </div>
            <div class="row">
              <div class="col-6">اسم المنتج 2</div>
              <div class="col-6">الكمية: 1</div>
            </div>
             <div class="row">
              <div class="col-6">اسم المنتج 3</div>
              <div class="col-6">الكمية: 5</div>
             </div>
          </td>-->

            <td>
                <dl class="product-list">
                    <dt>product1</dt><dd>2</dd>
                    <dt>اسم المنتج 2</dt><dd>1</dd>
                    <dt>اسم المنتج 3</dt><dd>5</dd>
                </dl>
            </td>
            <td>paris</td>
            <td><button href="#" class="ripple">SEND</button></td>

        </tr>

        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>



<!--
        <tr>
          <th scope="row"></th>
          <th scope="row">2</th>
          <td>محمد</td>
          <td>paris</td>
          <td>
              <div class="row">
                <div class="col-6">اسم المنتج 4</div>
                <div class="col-6">الكمية: 3</div>
              </div>
          </td>
          <td>paris</td>
        </tr>
            <tr>
          <th scope="row"></th>
          <th scope="row">3</th>
          <td>علي</td>
          <td>paris</td>
          <td>
              <div class="row">
                <div class="col-6">اسم المنتج 5</div>
                <div class="col-6">الكمية: 1</div>
              </div>
                 <div class="row">
                <div class="col-6">اسم المنتج 6</div>
                <div class="col-6">الكمية: 2</div>
              </div>
          </td>
          <td>paris</td>
        </tr>
        <tr>
          <th scope="row"></th>
          <th scope="row">3</th>
          <td>noura</td>
          <td>paris</td>
          <td>
              <div class="row">
                <div class="col-6">اسم المنتج 5</div>
                <div class="col-6">الكمية: 1</div>
              </div>
                 <div class="row">
                <div class="col-6">اسم المنتج 6</div>
                <div class="col-6">الكمية: 2</div>
              </div>
          </td>
          <td>paris</td>
        </tr>
        <tr>
          <th scope="row"></th>
          <th scope="row">3</th>
          <td>noura</td>
          <td>paris</td>
          <td>
              <div class="row">
                <div class="col-6">اسم المنتج 5</div>
                <div class="col-6">الكمية: 1</div>
              </div>
                 <div class="row">
                <div class="col-6">اسم المنتج 6</div>
                <div class="col-6">الكمية: 2</div>
              </div>
          </td>
          <td>paris</td>
        </tr>
        <tr>
          <th scope="row"></th>
          <th scope="row">3</th>
          <td>noura</td>
          <td>paris</td>
          <td>
              <div class="row">
                <div class="col-6">اسم المنتج 5</div>
                <div class="col-6">الكمية: 1</div>
              </div>
                 <div class="row">
                <div class="col-6">اسم المنتج 6</div>
                <div class="col-6">الكمية: 2</div>
              </div>
          </td>
          <td>paris</td>
        </tr>
        <tr>
          <th scope="row"></th>
          <th scope="row">3</th>
          <td>noura</td>
          <td>paris</td>
          <td>
              <div class="row">
                <div class="col-6">اسم المنتج 5</div>
                <div class="col-6">الكمية: 1</div>
              </div>
                 <div class="row">
                <div class="col-6">اسم المنتج 6</div>
                <div class="col-6">الكمية: 2</div>
              </div>
          </td>
          <td>paris</td>
        </tr>
        <tr>
          <th scope="row"></th>
          <th scope="row">3</th>
          <td>noura</td>
          <td>paris</td>
          <td>
              <div class="row">
                <div class="col-6">اسم المنتج 5</div>
                <div class="col-6">الكمية: 1</div>
              </div>
                 <div class="row">
                <div class="col-6">اسم المنتج 6</div>
                <div class="col-6">الكمية: 2</div>
              </div>
          </td>
          <td>paris</td>
        </tr>
        <tr>
          <th scope="row"></th>
          <th scope="row">3</th>
          <td>noura</td>
          <td>paris</td>
          <td>
              <div class="row">
                <div class="col-6">اسم المنتج 5</div>
                <div class="col-6">الكمية: 1</div>
              </div>
                 <div class="row">
                <div class="col-6">اسم المنتج 6</div>
                <div class="col-6">الكمية: 2</div>
              </div>
          </td>
          <td>paris</td>
        </tr>
        <tr>
          <th scope="row"></th>
          <th scope="row">3</th>
          <td>noura</td>
          <td>paris</td>
          <td>
              <div class="row">
                <div class="col-6">اسم المنتج 5</div>
                <div class="col-6">الكمية: 1</div>
              </div>
                 <div class="row">
                <div class="col-6">اسم المنتج 6</div>
                <div class="col-6">الكمية: 2</div>
              </div>
          </td>
          <td>paris</td>
        </tr>
        -->
