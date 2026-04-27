<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f3f4f6;
        }

        .login-container {
            background: #fff;
            padding: 30px;
            width: 320px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 13px;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #2563eb;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #1e40af;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
        }

        .register-link a {
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email">
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password">
            </div>

            <button class="btn" type="submit">Sign In</button>
        </form>

        <div class="register-link">
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </div>
    </div>

</body>
</html>