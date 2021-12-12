<?php
session_start();

$conn  = mysqli_connect('localhost:3306', 'aaoftech_ovais09', 'PqcofX2eqJDb', 'aaoftech_form');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$justidroute = $_REQUEST['justidroute'];




//getting all the data from colunm Code_itneraire from table RouteForm
$sql = "SELECT Code_itineraire FROM RouteForm";
$nom = "SELECT Nom_itineraire FROM RouteForm";
if ($result = mysqli_query($conn, $sql)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


//getting all the data from colunm Code_itneraire from table RouteForm and storing them in an array
$array = array();
while ($row = mysqli_fetch_array($result)) {
    $array[] = $row['Code_itineraire'];
}

if ($nomresult = mysqli_query($conn, $nom)) {
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$nomarray = array();
while ($rownom = mysqli_fetch_array($nomresult)) {
    $nomarray[] = $rownom['Nom_itineraire'];
}

if (isset($_REQUEST['kml'])) {
    $idroute = $_REQUEST['idroute'];

    $conn  = mysqli_connect('localhost:3306', 'aaoftech_ovais09', 'PqcofX2eqJDb', 'aaoftech_form');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $select = "SELECT * FROM AuthorForm WHERE LinkToRoute = '$idroute'";
    if ($resultselect = mysqli_query($conn, $select)) {
    } else {
        echo "Error: " . $select . "<br>" . mysqli_error($conn);
    }

    //getting the file from the server and storing it in a variable;


    $rows = mysqli_fetch_all($resultselect, MYSQLI_ASSOC);

    $photos = array();
    for ($i = 0; $i < count($rows); $i++) {
        $photos[] = $rows[$i]['image_name_photo'];
    }

    $photo = file_get_contents('AuthorFormUploads/' . $photos[0]);
    $photo  = base64_encode($photo);



    $fname = array();
    for ($i = 0; $i < count($rows); $i++) {
        $fname[] = $rows[$i]['FirstName'];
    }

    $lname = array();
    for ($i = 0; $i < count($rows); $i++) {
        $lname[] = $rows[$i]['LastName'];
    }

    $lat = array();
    for ($i = 0; $i < count($rows); $i++) {
        $lat[] = $rows[$i]['Lat'];
    }

    $long = array();
    for ($i = 0; $i < count($rows); $i++) {
        $long[] = $rows[$i]['Longitude'];
    }

    $routename = explode(",", $idroute);
    $routename = $routename[1];
    $_SESSION['routename'] = $routename;

    $authordescription = array();
    for ($i = 0; $i < count($rows); $i++) {
        $authordescription[] = $rows[$i]['LieuDescription'];
    }

    $kml = array('<?xml version="1.0" encoding="UTF-8"?>');
    $kml[] = '<kml xmlns="http://earth.google.com/kml/2.2" xmlns:gx="http://www.google.com/kml/ext/2.2" xmlns:kml="http://www.opengis.net/kml/2.2" xmlns:atom="http://www.w3.org/2005/Atom">';
    $kml[] = ' <Document>';
    $kml[] = ' <name>' . $routename . '</name>';
    $kml[] = '<gx:CascadingStyle kml:id="__managed_style_1A0BB232B11EE1F96DBA">';
    $kml[] = '<styleUrl>https://earth.google.com/balloon_components/base/1.0.23.0/simple_template.kml#main</styleUrl>';
    $kml[] = '<Style>';
    $kml[] = '<IconStyle>';
    $kml[] = '<Icon>';
    $kml[] = '<href>https://earth.google.com/earth/rpc/cc/icon?color=d32f2f&amp;id=2000&amp;scale=4</href>';
    $kml[] = '</Icon>';
    $kml[] = '<hotSpot x="64" y="128" xunits="pixels" yunits="insetPixels"/>';
    $kml[] = '</IconStyle>';
    $kml[] = '<LabelStyle>';
    $kml[] = '</LabelStyle>';
    $kml[] = "<LineStyle>";
    $kml[] = '<width>5.062</width>';
    $kml[] = '</LineStyle>';
    $kml[] = '<PolyStyle>';
    $kml[] = '</PolyStyle>';
    $kml[] = '<BalloonStyle>';
    $kml[] = '<gx:displayMode>panel</gx:displayMode>';
    $kml[] = '</BalloonStyle>';
    $kml[] = '</Style>';
    $kml[] = '</gx:CascadingStyle>';
    $kml[] = '<gx:CascadingStyle kml:id="__managed_style_258406A9BD1EE1F96DBA">';
    $kml[] = '<styleUrl>https://earth.google.com/balloon_components/base/1.0.23.0/simple_template.kml#main</styleUrl>';
    $kml[] = '<Style>';
    $kml[] = '<IconStyle>';
    $kml[] = '<scale>1.2</scale>';
    $kml[] = '<Icon>';
    $kml[] = '<href>https://earth.google.com/earth/rpc/cc/icon?color=d32f2f&amp;id=2000&amp;scale=4</href>';
    $kml[] = '</Icon>';
    $kml[] = '<hotSpot x="64" y="128" xunits="pixels" yunits="insetPixels"/>';
    $kml[] = '</IconStyle>';
    $kml[] = '<LabelStyle>';
    $kml[] = '</LabelStyle>';
    $kml[] = "<LineStyle>";
    $kml[] = '<width>7.593</width>';
    $kml[] = '</LineStyle>';
    $kml[] = '<PolyStyle>';
    $kml[] = '</PolyStyle>';
    $kml[] = '<BalloonStyle>';
    $kml[] = '<gx:displayMode>panel</gx:displayMode>';
    $kml[] = '</BalloonStyle>';

    $kml[] = '</Style>';
    $kml[] = '</gx:CascadingStyle>';
    $kml[] = '<StyleMap id="__managed_style_01053936C21EE1F96DBA">';
    $kml[] = '<Pair>';
    $kml[] = '<key>normal</key>';
    $kml[] = '<styleUrl>#__managed_style_1A0BB232B11EE1F96DBA</styleUrl>';
    $kml[] = '</Pair>';
    $kml[] = '<Pair>';
    $kml[] = '<key>highlight</key>';
    $kml[] = '<styleUrl>#__managed_style_258406A9BD1EE1F96DBA</styleUrl>';
    $kml[] = '</Pair>';
    $kml[] = '</StyleMap>';



    for ($i = 0; $i < count($rows); $i++) {
        $kml[] = ' <Placemark>';
        $kml[] = ' <name>' . $fname[$i] . ' ' . $lname[$i] . '</name>';
        $kml[] = ' <description>' . $authordescription[$i] . '</description>';
        $kml[] = ' <styleUrl>#__managed_style_01053936C21EE1F96DBA</styleUrl>';

        $kml[] = ' <Point>';
        $kml[] = ' <coordinates>' . $long[$i] . ',' . $lat[$i] . ',0</coordinates>';
        $kml[] = ' </Point>';
        $kml[] = ' </Placemark>';
    }


    // while ($row = @mysqli_fetch_assoc($resultselect)) {
    //     $kml[] = ' <Placemark id="placemark' . $row['id'] . '">';
    //     $kml[] = ' <name>' . htmlentities($row['firstname']) . '</name>';
    //     $kml[] = ' <description>' . htmlentities($row['address']) . '</description>';
    //     $kml[] = ' <styleUrl>#' . ($row['email']) . 'Style</styleUrl>';
    //     $kml[] = ' <Point>';
    //     $kml[] = ' <coordinates>' . $row['lng'] . ','  . $row['lat'] . '</coordinates>';
    //     $kml[] = ' </Point>';
    //     $kml[] = ' </Placemark>';
    // }


    $kml[] = ' </Document>';
    $kml[] = '</kml>';


    $kmlOutput = join("\n", $kml);

    // header('Content-type: application/vnd.google-earth.kml+xml');

    $myfile = fopen($routename . ".kml", "w") or die("Unable to open file!");
    fwrite($myfile, $kmlOutput);
    fclose($myfile);

    $uploads_dir = 'KMLFiles/';

    if (copy($routename . ".kml", $uploads_dir . $routename . ".kml")) {
    } else {
        echo "Possible file upload attack!\n";
    }

    // if (copy($routename . ".kml", "https://drive.google.com/drive/folders/1lz9shegHBYTzEZlZHzDt-9qaaNk4HgHU/" . $routename . ".kml")) {
    //     echo "File is valid, and was successfully uploaded.\n";
    // } else {
    //     echo "Possible file upload attack!\n";
    // }

    // unlink($routename . ".kml");


    header("Location: download.php");





    // //sending the file to the user's download folder
    // header('Content-disposition: attachment; filename=' . $routename . '.kml');

    // // //delete the php content from the kml file




    // // // header('Content-type: application/vnd.google-earth.kml+xml');

    // // // header('Content-Length: ' . filesize($routename . ".kml"));

    // readfile("KMLFiles/" . $routename . ".kml");





}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/kmlcreate.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>

    <h2> <b>Générer Fichier KML</b></h2>

    <br>


    <form action="kmlcreate.php" method="post">



        <label id="titlelabels">Nom de la route associée</label>
        <div>
            <select class="form-control" style="width:750px" id="dropdownmenu" name="routeassociation" onchange="findelement()">
                <option disabled selected>(Identifiant numérique, Nom de la route) </option>
            </select>
        </div>

        <br>

        <input type="text" style="display:none" name="idroute" id="idroute">
        <input type="text" style="display:none" name="justidroute" id="justidroute">
        <button type="submit" style="width:250px; margin-left:500px;" class="d" name="kml" id="kml">Générer Fichier KML</button>

    </form>

</body>

<script>
    function findelement() {
        var x = document.getElementById("dropdownmenu").value;
    }

    var array = "<?php echo implode(",", $array); ?>".split(",");
    var namearray = "<?php echo implode(",", $nomarray); ?>".split(",");

    var newarray = [];
    for (var i = 0; i < array.length; i++) {
        newarray.push(array[i] + "," + namearray[i]);
    }


    var x = document.getElementById("dropdownmenu");

    for (var i = 0; i < array.length; i++) {
        var option = document.createElement("option");
        option.text = newarray[i];
        x.add(option);
    }



    function findelement() {
        var x = document.getElementById("dropdownmenu");
        var y = x.options[x.selectedIndex].text;
        document.getElementById("idroute").value = y;
        var z = y.split(",");
        var routejustid = z[0];
        document.getElementById("change").value = routejustid;
        document.getElementById("justidroute").value = routejustid;
    }
</script>

</html>