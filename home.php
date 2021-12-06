<?php

session_start();

error_reporting(0);

//check to see which php file sent the form data
if (isset($_POST['routeform'])) {

    //checking to see if the checkbox of name= check was clicked or not
    if (isset($_POST['check'])) {
        //if it was clicked, then the value of the checkbox is stored in the variable $check
        $flexCheckDefault = "checked";
    } else {
        //if it was not clicked, then the value of the checkbox is stored in the variable $check
        $flexCheckDefault = "not checked";
    }



    $conn  = mysqli_connect('localhost:3306', 'aaoftech_ovais09', 'PqcofX2eqJDb', 'aaoftech_form');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $rowcount = $_POST['rows'];

    //insert the values into the Code_itineraireRoute column from the CodeTableRoute table
    $sql = "INSERT INTO CodeTableRoute (Code_itineraireRoute) VALUES ('$rowcount')";

    if (mysqli_query($conn, $sql)) {
        echo "Records inserted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    $dateTimeCreated = $_POST['var'];


    $Code_itinéraire = $_POST['id'];
    $_SESSION['Code_itinéraire'] = $Code_itinéraire;

    $Nom_itinéraire = $_POST['nameofroute'];
    $_SESSION['Nom_itinéraire'] = $Nom_itinéraire;

    $Description_itinéraire = $_POST['routedescription'];
    $filename = $Code_itinéraire . "_" . $_FILES['myfile']['name'];
    $tname = $_FILES['myfile']['tmp_name'];
    $uploads_dir = 'RouteFormUploads/';

    move_uploaded_file($tname, $uploads_dir . '/' . $filename);

    $create_table = "CREATE TABLE RouteForm (
    Code_itineraire VARCHAR(30) NOT NULL,
    Nom_itineraire VARCHAR(90) NOT NULL,
    Description_itineraire VARCHAR(50000) NOT NULL,
    image_name VARCHAR(100),
    checkbox_default VARCHAR(80),
    DateTimeCreated VARCHAR(200),
    LastModificationDate VARCHAR(200)
     )";

    // check to see if the table exists
    if (mysqli_query($conn, $create_table)) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }

    $sql = "INSERT INTO RouteForm (Code_itineraire, Nom_itineraire, Description_itineraire,image_name,checkbox_default, DateTimeCreated, LastModificationDate )
    VALUES ('$Code_itinéraire', 
'$Nom_itinéraire', '$Description_itinéraire', '$filename', ' $flexCheckDefault', '$dateTimeCreated', '$dateTimeCreated'); ";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>data stored in a database successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";
    } else {
        echo "ERROR: Hush! Sorr"
            . mysqli_error($conn);
    }











    // $fname =  $_REQUEST['fname'];
    // $lname = $_REQUEST['lname'];
    // $address = $_REQUEST['address'];
    // $email = $_REQUEST['email'];

    // $lat = floatval($_REQUEST['lat']);
    // $lng = floatval($_REQUEST['lng']);


    // $data = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    // $name = $_FILES["image"]["name"];




    // $create_table = "CREATE TABLE testss (
    //     id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    //     firstname VARCHAR(30) NOT NULL,
    //     lastname VARCHAR(30) NOT NULL,
    //     address VARCHAR(80) NOT NULL,
    //     email VARCHAR(50),
    //     lat FLOAT(10,6) NOT NULL,
    //     lng FLOAT(10,6) NOT NULL,
    //     image_name VARCHAR(100),
    //     image LONGBLOB
    //      )";


    // mysqli_query($conn, $create_table);


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



}

if (isset($_POST['enregistrer'])) {

    $conn  = mysqli_connect('localhost:3306', 'aaoftech_ovais09', 'PqcofX2eqJDb', 'aaoftech_form');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $routeid = $_POST['id'];
    $nameofroute = $_POST['nameofroute'];
    $routeidname = $routeid . "," . $nameofroute;
    $routedescription = $_POST['routedescription'];

    if (isset($_POST['check'])) {
        //if it was clicked, then the value of the checkbox is stored in the variable $check
        $flexCheckDefault = "checked";
    } else {
        //if it was not clicked, then the value of the checkbox is stored in the variable $check
        $flexCheckDefault = "not checked";
    }

    $dateTimeCreated = date("Y-m-d H:i:s");
    echo $dateTimeCreated;

    $filename = $routeid . "_" . $_FILES['myfile']['name'];
    $tname = $_FILES['myfile']['tmp_name'];
    $uploads_dir = 'RouteFormUploads/';

    move_uploaded_file($tname, $uploads_dir . '/' . $filename);

    $sql = "UPDATE RouteForm SET Nom_itineraire= '$nameofroute', Description_itineraire = '$routedescription', image_name = '$filename', checkbox_default = '$flexCheckDefault', LastModificationDate = '$dateTimeCreated' WHERE Code_itineraire= '$routeid'";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }


    $sqle = "UPDATE AuthorForm SET LinkToRoute = '$routeidname' WHERE LinkToRoute LIKE '%$routeid%'";

    if (mysqli_query($conn, $sqle)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}












if (isset($_POST['authorform'])) {
    $conn  = mysqli_connect('localhost:3306', 'aaoftech_ovais09', 'PqcofX2eqJDb', 'aaoftech_form');
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $dateTimeCreatedAuthor = $_POST['varauthor'];

    $authorcode = $_POST['authorcode'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $description = $_POST['description'];

    $uploads_dir = 'AuthorFormUploads/';

    $filenamephoto = $authorcode . "_" . "Photo" . "." . end(explode(".", $_FILES['photo']['name']));
    $tnamephoto = $_FILES['photo']['tmp_name'];

    $filenamevideo = $authorcode . "_" . "Video" . "."  . end(explode(".", $_FILES['video']['name']));
    $tnamevideo = $_FILES['video']['tmp_name'];

    $filenamepodcast = $authorcode . "_" . "Podcast" . "." . end(explode(".", $_FILES['podcast']['name']));
    $tnamepodcast = $_FILES['podcast']['tmp_name'];

    $filenameicone = $authorcode . "_" . "Icone" . "." . end(explode(".", $_FILES['icone']['name']));
    $tnameicone = $_FILES['icone']['tmp_name'];

    move_uploaded_file($tnamephoto, $uploads_dir . '/' . $filenamephoto);
    move_uploaded_file($tnamevideo, $uploads_dir . '/' . $filenamevideo);
    move_uploaded_file($tnamepodcast, $uploads_dir . '/' . $filenamepodcast);
    move_uploaded_file($tnameicone, $uploads_dir . '/' . $filenameicone);

    $routeassociation = $_POST['routeassociation'];


    if (isset($_POST['authorform'])) {
        $rowcount = $_POST['rowes'];

        //insert the values into the Code_itineraireRoute column from the CodeTableRoute table
        $sqle = "INSERT INTO AuthorTableRoute (AuthorCodeRoute) VALUES ('$rowcount')";

        if (mysqli_query($conn, $sqle)) {
            echo "inserted row number";
        } else {
            echo "ERROR: Hush! Sorr"
                . mysqli_error($conn);
        }
    }



    $create_table = "CREATE TABLE AuthorForm (
        AuthorCode VARCHAR(30) NOT NULL,
        FirstName VARCHAR(50) NOT NULL,
        LastName VARCHAR(50) NOT NULL,
        Gender VARCHAR(80) NOT NULL,
        Lat DECIMAL(8,6) NOT NULL, 
        Longitude DECIMAL(8,6) NOT NULL, 
        image_name_photo VARCHAR(100),
        image_name_video VARCHAR(100),
        image_name_podcast VARCHAR(100),
        image_name_icon VARCHAR(100),
        LinkToRoute VARCHAR(100),
        DateTimeCreated VARCHAR(200),
        LastModificationDate VARCHAR(200),
        LieuDescription VARCHAR(50000)
         )";

    // check to see if the table exists
    if (mysqli_query($conn, $create_table)) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }


    $sql = "INSERT INTO AuthorForm (AuthorCode, FirstName, LastName, Gender, Lat, Longitude, image_name_photo, image_name_video, image_name_podcast, image_name_icon, LinkToRoute, DateTimeCreated, LastModificationDate, LieuDescription)
        VALUES ('$authorcode', 
        '$fname', '$lname ', '$gender', '$lat', '$long', '$filenamephoto', '$filenamevideo', '$filenamepodcast', '$filenameicone', '$routeassociation', '$dateTimeCreatedAuthor', '$dateTimeCreatedAuthor', '$description')";

    if (mysqli_query($conn, $sql)) {
        echo "<h3>data stored in a database successfully."
            . " Please browse your localhost php my admin"
            . " to view the updated data</h3>";
    } else {
        echo "ERROR: Hush! Sorr"
            . mysqli_error($conn);
    }
}








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

        <button id="b1" onclick="routechange()" class="and" type="button">Créer un itinéraire</button>
        <button id="b2" onclick="authorchange()" class="and" type="button">Créer un lieu d'inspiration</button>
        <button id="b3" class="and" type="button" onclick="createkmlfile()">Générer <br> Fichier KML</button>



        <button id="special" class="and2" type="button" onclick="consulter()">Consulter un Itinéraire </button>
        <button id="b2" class="and2" type="button">Consulter lieu d'inspiration</button>
        <button id="b3" class="and2" type="button">Consulter Fichier KML</button>


    </div>

    <br>
    <br>

    <button type="button" class="custombutton" onclick="logout()">Retour</button>

    <br>
    <br>

</body>

<script>
    function createkmlfile() {
        console.log("iksrgjwrigiujgnhwueijghnewiujhjneth");
        window.location.href = "kmlcreate.php";
    }

    function authorchange() {
        window.location.href = "author.php";

    }

    function routechange() {
        window.location.href = "route.php";
    }

    function logout() {
        window.location.href = "index.php";
    }

    function consulter() {
        window.location.href = "consulter.php";
    }
</script>


</html>