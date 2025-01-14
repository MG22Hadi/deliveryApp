<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Admin Add Store</title>
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

<div class="centered-container">
    <div class="container mt-5" id="j">
        @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'store added successfully',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'okay',
                    customClass: {
                        popup: 'custom-popup',
                        title: 'custom-title',
                        htmlContainer: 'custom-text',
                        confirmButton: 'custom-button'
                    }
                });
            </script>
        @endif

        <h1 class="text-center mb-4" id="addt">Add New Store</h1>
        <form action="{{ route('add-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 d-flex align-items-center gap-3">
                <div>
                    <label for="name" class="form-label" id="name_label">Store Name</label>
                    <input type="text" class="form-control custom-input" id="name" name="name" required>
                </div>
                <div>
                    <label for="address" class="form-label" id="address_label">Address</label>
                    <input type="text" class="form-control custom-input" id="address" name="address" required>
                </div>
            </div>
            <div class="mb-3 d-flex align-items-center gap-3">
                <div>
                    <label for="phone" class="form-label" id="phone_label">Phone</label>
                    <input type="text" class="form-control custom-input" id="phone" name="phone" required>
                </div>
                <div>
                    <label for="logo" class="form-label" id="logo_label">Logo</label>
                    <input type="file" class="form-control custom-input" id="logo" name="logo" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label custom-label" id="description_label">Description</label>
                <textarea class="form-control custom-inputd" id="description" name="description" required></textarea>
            </div>
            <button type="submit" class="btn btn-secondary" id="add-b">ADD STORE</button>
        </form>
    </div>
</div>

@if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ $errors->first() }}',
            confirmButtonText: 'ok',
            customClass: {
                popup: 'custom-popup',
                title: 'custom-title',
                htmlContainer: 'custom-text',
                confirmButton: 'custom-button'
            }
        });
    </script>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
