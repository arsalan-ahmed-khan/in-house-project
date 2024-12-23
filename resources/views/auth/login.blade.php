<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f5ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #4a148c;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px 40px;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
            text-align: center;
        }
        h1 {
            font-size: 24px;
            color: #4a148c;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }
        input:focus {
            border-color: #7e57c2;
        }
        button {
            padding: 12px;
            background-color: #7e57c2;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #5e35b1;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            color: #7e57c2;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }
        a:hover {
            color: #5e35b1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="{{ route('register') }}">Don't have an account? Register</a>
    </div>
</body>
</html>
