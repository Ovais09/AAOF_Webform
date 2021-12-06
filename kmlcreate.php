<?php


$conn  = mysqli_connect('localhost:3306', 'aaoftech_ovais09', 'PqcofX2eqJDb', 'aaoftech_form');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$justidroute = $_REQUEST['justidroute'];




//getting all the data from colunm Code_itneraire from table RouteForm
$sql = "SELECT Code_itineraire FROM RouteForm";
$nom = "SELECT Nom_itineraire FROM RouteForm";
if ($result = mysqli_query($conn, $sql)) {
    echo "works";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


//getting all the data from colunm Code_itneraire from table RouteForm and storing them in an array
$array = array();
while ($row = mysqli_fetch_array($result)) {
    $array[] = $row['Code_itineraire'];
}

if ($nomresult = mysqli_query($conn, $nom)) {
    echo "yay";
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
        echo "hopefully works";
    } else {
        echo "Error: " . $select . "<br>" . mysqli_error($conn);
    }

    $rows = mysqli_fetch_all($resultselect, MYSQLI_ASSOC);

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

    $authordescription = array();
    for ($i = 0; $i < count($rows); $i++) {
        $authordescription[] = $rows[$i]['LieuDescription'];
    }

    $kml = array('<?xml version="1.0" encoding="UTF-8"?>');
    $kml[] = '<kml xmlns="http://earth.google.com/kml/2.1">';
    $kml[] = ' <Document>';
    $kml[] = ' <name>' . $routename . '</name>';
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

    for($i = 0; $i < count($rows); $i++) {
        $kml[] = ' <Placemark>';
        $kml[] = ' <name>' . $fname[$i] . ' ' . $lname[$i] . '</name>';
        $kml[] = ' <description>' . $authordescription[$i] . '</description>';
        $kml[] = ' <styleUrl>#barStyle</styleUrl>';
        $kml[] = ' <Point>';
        $kml[] = ' <coordinates>' . $long[$i]. ',' . $lat[$i] . ',0</coordinates>';
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

    $uploads_dir = 'KMLFiles/';
    //copy the file to the server
    if (copy($routename . ".kml", $uploads_dir . $routename . ".kml")) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }

    unlink($routename . ".kml");
    



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