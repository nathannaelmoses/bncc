<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 20px;
                text-align: center;
            }

            h2, h1 {
                color: #333;
            }

            button {
                background-color: #007bff;
                color: white;
                border: none;
                padding: 10px 15px;
                cursor: pointer;
                font-size: 16px;
                border-radius: 5px;
                margin: 10px;
                transition: background 0.3s;
            }

            button:hover {
                background-color: #0056b3;
            }

            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                background: white;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            th, td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: center;
            }

            th {
                background-color: #007bff;
                color: white;
            }

            form {
                background: white;
                width: 20%;
                margin: 20px auto;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            label {
                display: block;
                font-weight: bold;
                margin-top: 10px;
                text-align: left;
            }

            input {
                width: 100%;
                padding: 8px;
                margin-top: 5px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }

            input:focus {
                border-color: #007bff;
                outline: none;
            }

            a {
                display: block;
                margin-top: 10px;
                color: #007bff;
                text-decoration: none;
                font-weight: bold;
            }

            a:hover {
                text-decoration: underline;
            }

        </style>
    </head>
    <body>    
        <h2>Login</h2>
        
        <form action="{{ route('home') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    <a href="{{ route('toRegisterPage') }}">Don't have an account? Register here</a>
            
    </body>
</html>
