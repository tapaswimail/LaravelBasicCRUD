<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <!-- Background Image Layer -->
    <div class="background"></div>

    <!-- Transparent Yellow Overlay -->
    <div class="overlay">
    <div class="login-form">
            <h2>Login</h2>
            <form action="/basiccrud2/public/loginuser" method="POST">
                @csrf
                <div class="form-group">
                    <label for="userId">User ID</label>
                    <input type="text" id="userId" name="userId" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
                <a href="{{route('register')}}" class="register-link">Register</a>
            </form>
        </div>
    </div>
</body>
</html>
