<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Drivers</title>
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
                <li><a href="{{ route('add-product') }}">Add</a></li>
            </ul>
        </div>
    </div>
</div>





<div class="container">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="row row-cols-1 row-cols-md-5 g-4"> <!--- تعديل هنا
          --> <div class="col">
                <div class="card">
                    <img src="{{ asset('webImages/photo.jpg') }}" class="card-img-top card-img-custom" alt="  1">
                    <div class="card-body">
                        <h5 class="card-title card-title-custom"> driver 1</h5>
                        <p class="card-text">location</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('webImages/photo4.jpg') }}" class="card-img-top card-img-custom" alt="  1">
                    <div class="card-body">
                        <h5 class="card-title card-title-custom"> driver 2</h5>
                        <p class="card-text">location</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('webImages/photo3.jpg') }}" class="card-img-top card-img-custom" alt="  1">
                    <div class="card-body">
                        <h5 class="card-title card-title-custom"> driver 3</h5>
                        <p class="card-text">location</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('webImages/photo2.jpg') }}" class="card-img-top card-img-custom" alt="  1">
                    <div class="card-body">
                        <h5 class="card-title card-title-custom"> driver 4</h5>
                        <p class="card-text">location</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{ asset('webImages/photo5.jpg') }}" class="card-img-top card-img-custom" alt="  1">
                    <div class="card-body">
                        <h5 class="card-title card-title-custom"> driver 5</h5>
                        <p class="card-text">location</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
