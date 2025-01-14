<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <title>Beeb Beeb Admin</title>
</head>
<body >
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

<div class="centered-container">
<div class="container mt-5" id="j">
    <h1 class="text-center mb-4" id="addt">Add New Product</h1>
    <form>
        <div class="mb-3 d-flex align-items-center gap-3">
            <div>
                <label for="name" class="form-label" id="name_label">product name </label>
                <input type="text" class="form-control custom-input" id="name" name="name" required>
            </div>
            <div>
                <label for="storeName" class="form-label" id="storeName_label">store name </label>
                <input type="text" class="form-control custom-input" id="storeName" name="storeName" required>
            </div>

        </div>
        <div class="mb-3">
            <label for="description" class="form-label custom-label" id="description_label">description</label>
            <input class="form-control custom-inputd" id="description" name="description" required>
        </div>

        <!-- اسم القسم  في نفس السطر -->
        <!-- السعر والكمية في نفس السطر -->
        <div class="mb-3 d-flex align-items-center gap-3">
{{--            <div class="me-3">--}}
{{--                <label for="category_id" class="form-label" id="category_id_label">category id</label>--}}
{{--                <input type="text" class="form-control custom-input" id="category_id" name="category_id" required>--}}
{{--            </div>--}}
            <div>
                <label for="categoryName" class="form-label" id="categoryName_label">category name</label>
                <input type="text" class="form-control custom-inputcpq" id="categoryName" name="categoryName" required>
            </div>
            <div>
                <label for="price" class="form-label" id="price_label">price</label>
                <input type="text" class="form-control custom-inputcpq" id="price" name="price" required>
            </div>
            <div>
                <label for="quantity" class="form-label" id="quantity_label">quantity</label>
                <input type="text" class="form-control custom-inputcpq" id="quantity" name="quantity" required>
            </div>
        </div>

        <!-- صورة المنتج وصورة الإعلان في نفس السطر -->
        <div class="mb-3 d-flex align-items-center gap-3">
            <div>
                <label for="image" class="form-label" id="image_label">add image</label>
                <input type="file" class="form-control custom-input" id="image" name="image" required>
            </div>
            <div>
                <label for="Ad-image" class="form-label" id="Ad-image_label">is there an AD image?</label>
                <input type="file" class="form-control custom-input" id="Ad-image" name="Ad-image">
            </div>
        </div>


        <button type="submit" class="btn btn-secondary" id="add-b">ADD PRODUCT</button>
    </form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
