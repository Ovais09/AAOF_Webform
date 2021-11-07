<?php

$conn  = mysqli_connect('localhost','ovais','test', 'onepiece');



// $fname =  $_REQUEST['fname'];
// $lname = $_REQUEST['lname'];
// $address = $_REQUEST['address'];
// $email = $_REQUEST['email'];

// $lat = floatval($_REQUEST['lat']);
// $lng = floatval($_REQUEST['lng']);


// $data = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
// $name = $_FILES["image"]["name"];




$create_table = "CREATE TABLE testss (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    address VARCHAR(80) NOT NULL,
    email VARCHAR(50),
    lat FLOAT(10,6) NOT NULL,
    lng FLOAT(10,6) NOT NULL,
    image_name VARCHAR(100),
    image LONGBLOB
     )";


mysqli_query($conn, $create_table);
   

// $sql = "INSERT INTO testss (firstname,lastname,address,email,lat,lng,image_name,image)
// VALUES ('$fname', 
// '$lname', '$address', '$email', '$lat', '$lng', '$name', '$data' )";


// mysqli_query($conn,$sql );

// if(mysqli_query($conn, $sql)){
//     echo "<h3>data stored in a database successfully." 
//         . " Please browse your localhost php my admin" 
//         . " to view the updated data</h3>"; 

// }
//  else{
//     echo "ERROR: Hush! Sorr" 
//         . mysqli_error($conn);
// }

// $query = 'SELECT * FROM testss';
// $result = mysqli_query($conn, $query);

$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://earth.google.com/kml/2.1">';
$kml[] = ' <Document>';
$kml[] = ' <Style id="restaurantStyle">';
$kml[] = ' <IconStyle id="restuarantIcon">';
$kml[] = ' <Icon>';
$kml[] = ' <href>http://maps.google.com/mapfiles/kml/pal2/icon63.png</href>';
$kml[] = ' </Icon>';
$kml[] = ' </IconStyle>';
$kml[] = ' </Style>';
$kml[] = ' <Style id="barStyle">';
$kml[] = ' <IconStyle id="barIcon">';
$kml[] = ' <Icon>';
$kml[] = ' <href>http://maps.google.com/mapfiles/kml/pal2/icon27.png</href>';
$kml[] = ' </Icon>';
$kml[] = ' </IconStyle>';
$kml[] = ' </Style>';


// while ($row = @mysqli_fetch_assoc($result)) 
// {
//   $kml[] = ' <Placemark id="placemark' . $row['id'] . '">';
//   $kml[] = ' <name>' . htmlentities($row['firstname']) . '</name>';
//   $kml[] = ' <description>' . htmlentities($row['address']) . '</description>';
//   $kml[] = ' <styleUrl>#' . ($row['email']) .'Style</styleUrl>';
//   $kml[] = ' <Point>';
//   $kml[] = ' <coordinates>' . $row['lng'] . ','  . $row['lat'] . '</coordinates>';
//   $kml[] = ' </Point>';
//   $kml[] = ' </Placemark>';
 
// } 


// $kml[] = ' </Document>';
// $kml[] = '</kml>';
// $kmlOutput = join("\n", $kml);
// header('Content-type: application/vnd.google-earth.kml+xml');
// echo $kmlOutput;




?>
















<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css" type="text/css">
    <title>Document</title>
</head>

<body>

    <div id="headere">
        <h2> <b>GESTION DES ROUTES DU LIVRE </b></h2>
    </div>

    <br>

    <div id="border"></div>

    <h2 id="gestion"> <b>Menu principal</b></h2>

    <img src="images/chrome_Qj4I3vwotA.png" width="250" height="200" id="a">

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  




    <div class="both">

    <button id="b1" onclick = "routechange()"   class="and" type="button">Créer un itinéraire</button>
    <button id="b2" onclick = "authorchange()" class="and"  type="button">Créer un lieu d'inspiration</button>
    <button id="b3" class="and"  type="button">Générer <br> Fichier KML</button>


    
    <button id="special"  class="and2" type="button">Consulter un Itinéraire </button>
    <button id="b2"   class="and2" type="button">Consulter lieu d'inspiration</button>
    <button id="b3" class="and2" type="button">Consulter Fichier KML</button>
   

    </div>

    <br>
    <br>

    <button type="button" class="custombutton" onclick="logout()">Quitter</button>

    <br>
    <br>
    
</body>

<script>

    function authorchange () {
        window.location.href="author.php";
        
    }

    function  routechange () {
        window.location.href="route.php";
    }

    function logout () {
        window.location.href="index.php";
    }

</script>


</html>
