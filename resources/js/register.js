
document.getElementById("myForm").addEventListener("click",async (event) => {
    event.preventDefault();
    console.log("moses")
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
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            "email": email,
            "password": password,
        })
    });

    let data = await response.json();

    if (response.ok) {
        alert("Registration successful!");
    } else {
        alert("Error: " + JSON.stringify(data));
    }
    let rs=await fetch("{{ route('toLoginPage') }}");
})