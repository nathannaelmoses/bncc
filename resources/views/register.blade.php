<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Register</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>    
        <h2>Register</h2>
        
        <form id="myForm" method="POST">   
        @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <label for="password">Confirm Password:</label>
            <input type="password" name="password" id="password_confirmation" required>
            <br>
            <button type="submit">Register</button>
        </form>
    <a href="{{ route('toLoginPage') }}">Already have an account? Login here</a>
    </body>
    <script>
        console.log(document.querySelector('meta[name="csrf-token"]').getAttribute("content"))
        document.getElementById("myForm").addEventListener("submit",async (event) => {
            event.preventDefault();
            console.log("moses");
            const crsftoken =document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            let password_confirmation = document.getElementById("password_confirmation").value;
            if(password!=password_confirmation){
                alert("pass differs");
                return;
            }

            let response = await fetch("{{ route('register') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": crsftoken
                },
                body: JSON.stringify({
                    "email": email,
                    "password": password,
                })
            });

            let data = await response.json();
            console.log(data);
            if (response.ok) {
                alert("Registration successful!");
            } else {
                alert("Error: " + JSON.stringify(data));
            }
            
            window.location.href = "{{ route('toLoginPage') }}";
        })
    </script>   
</html>