<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
    <title>Register</title>
</head>
<body>
<div class="container">
    <h1>Please Register</h1>
    <form action="{{ route('admin.register.submit') }}" method="POST">
        @csrf <!-- إضافة CSRF Token -->

        <!-- حقل الاسم -->
        <div class="form-control">
            <input type="text" id="name" name="name" required />
            <label for="name">Name</label>
        </div>

        <!-- حقل رقم الهاتف -->
        <div class="form-control">
            <input type="text" id="phone" name="phone" required />
            <label for="phone">Phone</label>
        </div>

        <!-- حقل كلمة المرور -->
        <div class="form-control">
            <input type="password" id="password" name="password" required />
            <label for="password">Password</label>
        </div>

        <!-- حقل تأكيد كلمة المرور -->
        <div class="form-control">
            <input type="password" id="confirm-password" name="password_confirmation" required />
            <label for="confirm-password">Confirm Password</label>
        </div>

        <!-- زر التسجيل -->
        <button type="submit" class="btn">Register</button>

        <!-- رابط للانتقال إلى صفحة تسجيل الدخول -->
        <p class="text">Already have an account? <a href="{{ route('admin.login') }}">Login</a></p>
    </form>
</div>
<script src="{{ asset('js/script2.js') }}"></script>
</body>
</html>
