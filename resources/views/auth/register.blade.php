<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8fafc;
            background-image: radial-gradient(circle at 10% 20%, rgba(199, 210, 254, 0.1) 0%, rgba(255, 255, 255, 1) 90%);
        }

        .auth-card {
            width: 100%;
            max-width: 400px;
            background: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(226, 232, 240, 0.5);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
        }

        .input-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.2s ease;
        }

        input:focus {
            outline: none;
            border-color: #a5b4fc;
            box-shadow: 0 0 0 3px rgba(199, 210, 254, 0.5);
        }

        input::placeholder {
            color: #94a3b8;
        }

        .is-invalid {
            border-color: #fca5a5;
            background-color: #fef2f2;
        }

        .error-text {
            font-size: 13px;
            color: #dc2626;
            margin-top: 6px;
            font-weight: 500;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background-color: #4f46e5;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: all 0.2s ease;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #4338ca;
            transform: translateY(-1px);
        }

        .btn:active {
            transform: translateY(0);
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: #64748b;
        }

        .login-link a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .login-link a:hover {
            color: #4338ca;
            text-decoration: underline;
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: #94a3b8;
            font-size: 14px;
        }

        .divider::before, .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider::before {
            margin-right: 10px;
        }

        .divider::after {
            margin-left: 10px;
        }
    </style>
</head>
<body>

<div class="auth-card">
    <h2>Create your account</h2>
    
    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div class="input-group">
            <input type="text" name="name" 
                   class="@error('name') is-invalid @enderror" 
                   placeholder="Full name" value="{{ old('name') }}"
                   autocomplete="name" required>
            @error('name') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="input-group">
            <input type="email" name="email" 
                   class="@error('email') is-invalid @enderror" 
                   placeholder="Email address" value="{{ old('email') }}"
                   autocomplete="email" required>
            @error('email') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <div class="input-group">
            <input type="password" name="password" 
                   class="@error('password') is-invalid @enderror" 
                   placeholder="Create password"
                   autocomplete="new-password" required>
            @error('password') <div class="error-text">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Continue</button>
    </form>

    <div class="divider">or</div>

    <div class="login-link">
        Already have an account? <a href="{{ route('login') }}">Sign in</a>
    </div>
</div>

</body>
</html>