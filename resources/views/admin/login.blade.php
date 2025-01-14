<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
    <title>Login</title>
</head>
<body>
<div class="container">
    <h1>Please Login</h1>
    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf <!-- إضافة CSRF Token -->
        <div class="form-control">
            <input type="text" name="phone" id="phone" required>
            <label>Phone</label>
        </div>

        <div class="form-control">
            <input type="password" name="password" id="password" required>
            <label>Password</label>
        </div>

        <button type="submit" class="btn">Login</button>

        <p class="text">Don't have an account? <a href="{{ route('admin.register') }}">Register</a></p>
    </form>
</div>
<script src="{{ asset('js/script2.js') }}"></script>
</body>
</html>
