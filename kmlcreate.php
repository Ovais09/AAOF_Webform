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




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/kmlcreate.css" type="text/css">
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