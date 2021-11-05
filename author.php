<?php

  $nameofroute = $_REQUEST['nameofroute'];


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


<form id="myForm">
<h3 id="b"> <b> GESTION DES AUTEURS </b> </h3>

<div id="border"></div>

<img src="images/chrome_Qj4I3vwotA.png" width="200" height="100" id="a">

<h3 id="c"> <b> Lieux proposés</b> </h3>


<h1 class="divider"></h1>

<br>

<label>Code Auteur</label>

<div class="input-group mb-3" style = "width:750px" >
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>


  <label id="titlelabels">Genre</label>
  <select class="form-control" style = "width:750px" >
    <option  disabled selected>Cliquez et sélectionnez</option>
    <option value="Mr">Femme</option>
    <option value="Ms">Homme</option>
    <option value="Mrs">Je préfère ne pas répondre</option>
    <option value="Miss">Autre</option>
  </select>

  <br>

<label>Nom (auteur.e)</label>
<div class="input-group mb-3" style = "width:750px" >
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="50">
</div>

<label>Prénom (auteur.e)</label>
<div class="input-group mb-3" style = "width:750px" >
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="50">
</div>

<h1 class="divider"></h1>

<br>

<!-- <label>Nom du lieu proposé</label>
<div class="input-group mb-3" style = "width:750px" >
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="90">
</div> -->

<label for="exampleFormControlTextarea1" id = "placemark_description">Description du lieu</label>
<div class="form-group" style = "width:750px">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<br>

<label id = "upload">Photo du lieu proposé</label>
<div class="custom-file" style = "width:750px">
    <input type="file" class="form-control" id="inputGroupFile04" accept=".jpg, .jpeg, .png, .tiff">
</div>

<br>


<label id = "upload">Vidéo du lieu proposé</label>
<div class="custom-file" style = "width:750px">
    <input type="file" class="form-control" id="inputGroupFile04" accept=".mp4, .wav, .wmv, .avi">
</div>

<br>

<label id = "upload">Podcast du lieu proposé</label>
<div class="custom-file" style = "width:750px">
    <input type="file" class="form-control" id="inputGroupFile04" accept=".jpg, .jpeg, .png, .tiff">
</div>

<br>

<label id = "upload">Icône liée au lieu proposé</label>
<div class="custom-file" style = "width:750px">
    <input type="file" class="form-control" id="inputGroupFile04" accept="image/*">
</div>

<br>

<h1 class="divider"></h1>

<br>

<label id="latitude-text">Latitude</label>
<div class="input-group mb-3" style = "width:250px" >
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<label id = "longitude-text">Longitude</label>
<div class="input-group mb-3" style = "width:250px" id = "long" >
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

  <label id="titlelabels">Nom de la route associée</label>
  <select class="form-control" style = "width:750px" id="dropdownmenu" >
    <option  disabled selected>(Identifiant numérique, Nom de la route)</option>>
  </select>

  <br>
  <br>

  <button type ="button"  style = "width:150px" onclick = "b()" class="d">Retour</button>
  <button type ="button"  style = "width:150px" id ="save" class="d">Sauvegarder</button>
  <button type ="button"  style = "width:150px" id="cancel" onclick = "jojo()" class="d">Reprendre</button>


  <br>
  <br>

  </form>


</body>


<script>

  function jojo() {
    document.getElementById("myForm").reset();
  }

  function b() {
    window.location.href="home.php";
  }

  function c() {
    document.getElementById("myForm").reset();
  }

  var abc = '<?php echo $nameofroute; ?>';

  window.onload = function exampleFunction() {

    if (!(abc.length ==0)) {
      var x = document.getElementById("dropdownmenu");
      var option = document.createElement("option");
      option.text = abc;
      x.add(option);
     }
  }

</script>

</html>