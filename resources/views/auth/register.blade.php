<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

        .auth-card {
            width: 100%;
            max-width: 320px;
            background: #fff;
            padding: 30px;
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

        .is-invalid {
            border-color: #dc2626;
            background-color: #fef2f2;
        }

        .error-text {
            font-size: 12px;
            color: #dc2626;
            margin-top: 5px;
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

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
        }

        .login-link a {
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="auth-card">
    <h2>Create Account</h2>
    
    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div class="input-group">
            <input type="text" name="name" 
                   class="@error('name') is-invalid @enderror" 
                   placeholder="Full Name" value="{{ old('name') }}">
            @error('name') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="input-group">
            <input type="email" name="email" 
                   class="@error('email') is-invalid @enderror" 
                   placeholder="Email Address" value="{{ old('email') }}">
            @error('email') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="input-group">
            <input type="password" name="password" 
                   class="@error('password') is-invalid @enderror" 
                   placeholder="Password">
            @error('password') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Create Account</button>
    </form>

    <div class="login-link">
        Already have an account? <a href="{{ route('login') }}">Sign in</a>
    </div>
</div>

</body>
</html>