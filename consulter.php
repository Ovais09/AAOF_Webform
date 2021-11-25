<?php


$conn  = mysqli_connect('sql304.epizy.com', 'epiz_30180170', 'PqcofX2eqJDb', 'epiz_30180170_AAOFdata');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//getting all the data from colunm Code_itneraire from table RouteForm
$sql = "SELECT Code_itineraire FROM RouteForm";
$nom = "SELECT Nom_itineraire FROM RouteForm";
if($result = mysqli_query($conn, $sql)) {
    echo "works";
}

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


//getting all the data from colunm Code_itneraire from table RouteForm and storing them in an array
$array = array();
while($row = mysqli_fetch_array($result)) {
    $array[] = $row['Code_itineraire'];
}

if($nomresult = mysqli_query($conn, $nom)) {
    echo "yay";
}

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$nomarray = array();
while($rownom = mysqli_fetch_array($nomresult)) {
    $nomarray[] = $rownom['Nom_itineraire'];
}




//store the data from the colunm Code_itneraire in an array
// $array = array();
// foreach ($rows as $row) {
//     array_push($array, $row);
// }

// echo $array[0];
// echo $array[1];



?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/consulter.css">
    <title>Document</title>
</head>

<body>

    <h2><b>GESTION DES ROUTES</b></h2>

    <br>

    <h2>Consulter/Modifier Route</h2>

    <br>

    <form id="myForm" method="post">


        <label id="titlelabels">Nom de la route associée</label>
        <div>
            <select class="form-control" style="width:750px" id="dropdownmenu" name="routeassociation">
                <option disabled selected>(Identifiant numérique, Nom de la route)</option>>
            </select>
        </div>

        <br>

        <div>
            <button type="button" style="width:150px" onclick="displaySubform()" class="d">Chercher</button>
        </div>

        <h2 class="divider2"></h2>

        <br>
        <br>


        <label>Code itinéraire</label>
        <div class="input-group mb-3" style="width:750px">
            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" id="change" readonly name="id">
        </div>

        <label>Nom itinéraire</label>
        <div class="input-group mb-3" style="width:750px">
            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="90" name="nameofroute">
        </div>

        <label for="exampleFormControlTextarea1" id="placemark_description">Description itinéraire <br> (route)</label>
        <div class="form-group" style="width:750px">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="routedescription"></textarea>
        </div>

        <br>

        <label id="upload">Photo itinéraire</label>
        <div class="custom-file" style="width:750px">
            <input type="file" name="myfile" class="form-control" id="inputGroupFile04" accept=".jpg, .jpeg, .png, .tiff">
        </div>

        <br>


        <label>Statut Disponibilité</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="check">
            Checkbox
        </div>

        <br>
        <h2 class="divider2"></h2>

        <br>
        <br>



        <label style="margin-left:500px;">Auteur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Lieu proposé &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Photo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Video &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Podcast &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Icone
        </label>

        <br>
        <br>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


        </div>

        <button type="button" style="width:150px; margin-left:500px" onclick="homepage()" class="d">Retour</button>
        <button type="button" style="width:150px; margin-left:150px" onclick="reset()" class="d">Reprendre</button>
        <button type="button" style="width:150px; margin-left:125px" onclick="b()" class="d">Enregistrer</button>

    </form>

    <br>
    <br>

    <!-- <label id="ava">Disponible depuis</label>
    <input type="date" id="birthday" name="birthday">

    <label>à</label>
    <input type="date" id="to" name="birthday" class="s2"> -->

</body>

<script>

    function homepage() {
        window.location.href = "home.php";
    }

    function reset() {
        document.getElementById("myForm").reset();
    }

    var array = "<?php echo implode(",", $array); ?>".split(",");
    var namearray =  "<?php echo implode(",", $nomarray); ?>".split(",");
    
    var newarray = [];
    for (var i =0; i <array.length; i++) {
        newarray.push(array[i] + "," + namearray[i]);
    }


    var x = document.getElementById("dropdownmenu");

    for (var i = 0; i < array.length; i++) {
        var option = document.createElement("option");
        option.text = newarray[i];
        x.add(option);
    }

    function displaySubform () {
        var x = document.getElementById("dropdownmenu");
        var y = x.options[x.selectedIndex].text;
        
    }


</script>

</html>