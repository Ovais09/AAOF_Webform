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

    <img src="images/chrome_Qj4I3vwotA.png" width="400" height="200" id="a">

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
