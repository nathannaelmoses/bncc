<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Home</title>

        <style>
            #navBar{
                display:flex;
            }
            body {
                font-family: 'Nunito', sans-serif;
            }
            .borderan{
                border:1px solid black;
                text-align: center;
            }
            ul{
                
            }
        </style>
    </head>
    <body>

        <h2>PT ChipiChapa Employees</h2>
        <button id="View">View All Karyawan</button>
        <table id="tableView" >
            <tr class="borderan">
                <th class="borderan">Name</th>
                <th class="borderan">Age</th>
                <th class="borderan">Address</th>
                <th class="borderan">Whatsapp Number</th>
            </tr>
        </table>
        <br>
        <form id="updateForm" method="POST">
            @csrf
            <h1>Update Karyawan</h1>
            <label for="text">Name:</label>
            <input type="text" name="username" id="usernameU" required>
            <br>
            <label for="text">Age:</label>
            <input type="text" name="age" id="ageU" required>
            <br>
            <label for="text">Address:</label>
            <input type="text" name="address" id="addressU" required>
            <br>
            <label for="text">Telp:</label>
            <input type="text" name="telp" id="telpU" required>
            <br>
            <button id="Update" type="submit">Update Karyawan</button>
        </form>
        <br>

        <form id="deleteForm" method="DELETE">
            @csrf
            <h1>Delete Karyawan</h1>
            <label for="text">Name:</label>
            <input type="text" name="username" id="usernameD" required>
            <br>
            <button id="Delete" type="submit">Delete Karyawan</button>
        </form>

        <br>
        <form id="insertForm" method="POST">
            @csrf
            <h1>Insert Karyawan</h1>
            <label for="text">Name:</label>
            <input type="text" name="username" id="usernameI" required>
            <br>
            <label for="text">Age:</label>
            <input type="text" name="age" id="ageI" required>
            <br>
            <label for="text">Address:</label>
            <input type="text" name="address" id="addressI" required>
            <br>
            <label for="text">Telp:</label>
            <input type="text" name="telp" id="telpI" required>
            <br>
            <button id="Insert" type="submit">Insert Karyawan</button>
        </form>
    </body>
    <script>
        document.getElementById("View").addEventListener("click", async () => {
            const crsftoken =document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            let data = await fetch("{{ route('view') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": crsftoken
                }
            });
            let datajson= await data.json()
            let table= document.getElementById("tableView")
            table.innerHTML = `<tr class="borderan">
                <th class="borderan">Name</th>
                <th class="borderan">Age</th>
                <th class="borderan">Address</th>
                <th class="borderan">Whatsapp Number</th>
            </tr>`
            for (let d of datajson["data"]) {
                let row = `<tr class="borderan">
                    <td class="borderan">${d["KaryawanName"]}</td>
                    <td class="borderan">${d["KaryawanAge"]}</td>
                    <td class="borderan">${d["KaryawanAddress"]}</td>
                    <td class="borderan">${d["KaryawanTelp"]}</td>
                </tr>`;
                table.innerHTML += row;
            }
        })

        document.getElementById("updateForm").addEventListener("submit", async () => {
            event.preventDefault();
            console.log("moses");
            const crsftoken =document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            let username = document.getElementById("usernameU").value;
            let age = document.getElementById("ageU").value;
            let address = document.getElementById("addressU").value;
            let telp = document.getElementById("telpU").value;


            let response = await fetch("{{ route('update') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": crsftoken
                },
                body:JSON.stringify({
                    "name":username,
                    "age":age,
                    "address":address,
                    "telp":telp
                })
            })
            if (response.ok) {
                alert("Update successful!");
            } else if (response.status === 400) {
                alert("There is no such Karyawan.");
            }
            location.reload();

        })
        

        document.getElementById("deleteForm").addEventListener("submit", async () => {
            event.preventDefault();
            const crsftoken =document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            let username = document.getElementById("usernameD").value;
            let response = await fetch("{{ route('delete') }}", {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": crsftoken
                },
                body:JSON.stringify({
                    "name":username
                })
            })
            if (response.ok) {
                alert("Update successful!");
            } else if (response.status === 400) {
                alert("There is no such Karyawan.");
            }
            location.reload();
        })

        document.getElementById("insertForm").addEventListener("submit", async () => {
            event.preventDefault();
            const crsftoken =document.querySelector('meta[name="csrf-token"]').getAttribute("content");
            let username = document.getElementById("usernameI").value;
            let age = document.getElementById("ageI").value;
            let address = document.getElementById("addressI").value;
            let telp = document.getElementById("telpI").value;

            if (username.length < 5 || username.length > 20) {
                alert("Nama Karyawan harus 5-20 karakter bro");
                return;
            }
            
            if (parseInt(age) <= 20) {
                alert("Umur Karyawan mesti lebih dari 20 tahun bro");
                return;
            }
            if (address.length < 10 || address.length > 40) {
                alert("Alamat Karyawan harus 10-40 karakter bro");
                return;
            }
            if (!/^08\d{7,10}$/.test(telp)) {
                alert("Nomor telpon gak valid");
                return;
            }

            let response = await fetch("{{ route('insert') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": crsftoken
                },
                body:JSON.stringify({
                    "name":username,
                    "age":age,
                    "address":address,
                    "telp":telp
                })
            })
            alert("Inserted succesfully")
            location.reload();

        })
        

    </script>
</html>
