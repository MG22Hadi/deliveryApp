<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}" />
    <title>Form Input Wave</title>
</head>
<body>
<div class="container">
    <h1>Please Login</h1>
    <form>
        <div class="form-control">
            <input type="text" required>
            <label>Phone</label>
            <!-- <label>
              <span style="transition-delay: 0ms">E</span>
                <span style="transition-delay: 50ms">m</span>
                <span style="transition-delay: 100ms">a</span>
                <span style="transition-delay: 150ms">i</span>
                <span style="transition-delay: 200ms">l</span>
          </label> -->
        </div>

        <div class="form-control">
            <input type="password" required>
            <label>Password</label>
        </div>

        <button class="btn">Login</button>

        <p class="text">Don't have an account? <a href="{{route('register')}}">Register</a> </p>
    </form>
</div>
<script src="{{ asset('js/script2.js') }}"></script>
</body>
</html>
