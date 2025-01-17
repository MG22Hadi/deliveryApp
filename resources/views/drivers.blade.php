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

            <img src="{{ asset('webImages/logo2.png') }}" alt="Logo" class="logo">
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

<h1 id="tt">The Drivers</h1>


<div class="container" id="cardD">
    <div class="row justify-content-center"> <!-- توسيط الصف أفقيًا -->
        @foreach($drivers as $driver)
            <div class="col-12 col-sm-6 col-md-2 mb-4"> <!-- 3 كاردات في الصف الواحد -->
                <div class="card h-100 custom-card">
                    <!-- التحقق من وجود صورة السائق -->
                    @if($driver->image && file_exists(public_path($driver->image)))
                        <img src="{{ asset($driver->image) }}" class="card-img-top card-img-custom" alt="{{ $driver->name }}">
                    @else
                        <img src="{{ asset('storage/profile_images/default.jpg') }}" class="card-img-top card-img-custom" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title card-title-custom">{{ $driver->name }}</h5>
                        <p class="card-text"><strong>Location:</strong> {{ $driver->location }}</p>
                        <p class="card-text"><strong>Phone:</strong> {{ $driver->phone }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>


