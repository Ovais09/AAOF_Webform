<?php

session_start();

$conn  = mysqli_connect('sql304.epizy.com', 'epiz_30180170', 'PqcofX2eqJDb', 'epiz_30180170_AAOFdata');
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


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
error_reporting(0);

try {
  // $nameofroute = $_REQUEST['nameofroute'];
  // $id = $_REQUEST['id'];
} catch (ErrorException $e) {
  // echo "Error: " . $e->getMessage();
}





?>








<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/author.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>


  <form id="myForm" action="home.php" method="POST" enctype="multipart/form-data">

    <h3 id="b"> <b> GESTION DES AUTEURS </b> </h3>

    <div id="border"></div>

    <img src="images/chrome_Qj4I3vwotA.png" width="250" height="200" id="a">

    <h3 id="c"> <b> Lieux proposés</b> </h3>


    <h1 class="divider"></h1>

    <br>

    <label>Code Auteur</label>

    <div class="input-group mb-3" style="width:750px">
      <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" id="code" name="authorcode" readonly>
    </div>


    <label id="titlelabels">Genre</label>
    <select class="form-control" style="width:750px" name="gender">
      <option disabled selected>Cliquez et sélectionnez</option>
      <option value="Femme">Femme</option>
      <option value="Homme">Homme</option>
      <option value="Je préfère ne pas répondre">Je préfère ne pas répondre</option>
      <option value="Autre">Autre</option>
    </select>

    <br>


    <label>Prénom (auteur.e)</label>
    <div class="input-group mb-3" style="width:750px">
      <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="50" name="lname">
    </div>
    
    <br>
    
    <label>Nom (auteur.e)</label>
    <div class="input-group mb-3" style="width:750px">
      <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="50" name="fname">
    </div>



    <h1 class="divider"></h1>

    <br>

    <!-- <label>Nom du lieu proposé</label>
<div class="input-group mb-3" style = "width:750px" >
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="90">
</div> -->

    <label for="exampleFormControlTextarea1" id="placemark_description">Description du lieu</label>
    <div class="form-group" style="width:750px">
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    </div>

    <br>

    <label id="upload">Photo du lieu proposé</label>
    <div class="custom-file" style="width:750px">
      <input type="file" class="form-control" id="inputGroupFile04" accept=".jpg, .jpeg, .png, .tiff" name="photo">
    </div>

    <br>


    <label id="upload">Vidéo du lieu proposé</label>
    <div class="custom-file" style="width:750px">
      <input type="file" class="form-control" id="inputGroupFile04" accept=".mp4, .wav, .wmv, .avi" name="video">
    </div>

    <br>

    <label id="upload">Podcast du lieu proposé</label>
    <div class="custom-file" style="width:750px">
      <input type="file" class="form-control" id="inputGroupFile04" accept=".jpg, .jpeg, .png, .tiff" name="podcast">
    </div>

    <br>

    <label id="upload">Icône liée au lieu proposé</label>
    <div class="custom-file" style="width:750px">
      <input type="file" class="form-control" id="inputGroupFile04" accept="image/*" name="icone">
    </div>

    <br>

    <h1 class="divider"></h1>

    <br>

    <label id="latitude-text">Latitude</label>
    <div class="input-group mb-3" style="width:250px">
      <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="lat">
    </div>

    <label id="longitude-text">Longitude</label>
    <div class="input-group mb-3" style="width:250px" id="long">
      <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="long">
    </div>

    <label id="titlelabels">Nom de la route associée</label>
    <select class="form-control" style="width:750px" id="dropdownmenu" name="routeassociation">
      <option disabled selected>(Identifiant numérique, Nom de la route)</option>>
    </select>

    <input type="text" style="display:none" name="varauthor" id="varauthor">

    <br>
    <br>

    <button type="button" style="width:150px" onclick="b()" class="d">Retour</button>
    <button type="submit" style="width:150px" id="save" class="d" name="authorform">Sauvegarder</button>
    <button type="button" style="width:150px" id="cancel" onclick="jojo()" class="d">Reprendre</button>


    <br>
    <br>

  </form>


</body>


<script>
  sessionStorage['code'] =
    document.getElementById('code').value =
    parseInt(sessionStorage['code'] || '0', 10) + 1;

  document.getElementById('code').value = "AUT-" + sessionStorage['code'];

  function jojo() {
    document.getElementById("myForm").reset();
  }

  function b() {
    window.location.href = "home.php";
  }

  function c() {
    document.getElementById("myForm").reset();
  }

  var array = "<?php echo implode(",", $array); ?>".split(",");
  var namearray = "<?php echo implode(",", $nomarray); ?>".split(",");

  var newarray = [];
  for (var i = 0; i < array.length; i++) {
    newarray.push(array[i] + "," + namearray[i]);
  }

  var x = document.getElementById("dropdownmenu");

  sessionStorage['authordate'] = new Date();

  document.getElementById("varauthor").value = sessionStorage.getItem('authordate');



  window.onload = function exampleFunction() {

    for (var i = 0; i < array.length; i++) {
        var option = document.createElement("option");
        option.text = newarray[i];
        x.add(option);
    }


    // var option = document.createElement("option");
    // option.text = id + "," + abc;
    // // option.setAttribute("disabled", true)
    // x.add(option);
    // localStorage.setItem(id, option.text);

    // for (var i = 0; i < localStorage.length - 1; i++) {
    //   var a = localStorage.getItem(localStorage.key(i));

      //get rid of duplicates in dropdown menu
      // ;if (a != option.text) 
      //   var option = document.createElement("option");
      //   option.text = a;
      //   x.add(option)


        //  var option = document.createElement("option");
        //  option.text = a;
        //  x.add(option);
      

    




  }
</script>

</html>