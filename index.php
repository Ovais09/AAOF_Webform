<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <img src="images/chrome_Qj4I3vwotA.png" width="400" height="200">
    <h1>Main menu</h1>

    <button id="b1" onclick = "authorchange()">Access <br> Author <br>Form</button>
    <button id="b2" onclick = "routechange()">Access <br> Route <br> Form</button>
    <button id="b3" onclick = "changepage()">Generate <br> KML <br> File</button>
    
</body>

<script>

    function authorchange () {
        window.location.href="author.php";
    }

    function  routechange () {
        window.location.href="route.php";
    }

</script>


</html>


 <!-- <form action="confirmation.php" method="post" enctype="multipart/form-data">
    <label>First Name</label><br>
    <input type="text" name="fname"><br>
    <label>Last Name</label><br>
    <input type="text" name="lname"> <br>
    <label>Address</label><br>
    <input type="text" name="address"> <br>
    <label>Email</label><br>
    <input type="text" name="email"> <br>
    <label>Latitude</label><br>
    <input type="text" name="lat"> <br>
    <label>Longitude</label><br>
    <input type="text" name="lng"> <br>
    <label>Upload a file if you want</label><br>
    <input type="file" name="image"> <br> <br>
    <input type="submit">
    </form> -->