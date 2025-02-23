<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
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
