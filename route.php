<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/route.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
    
    <br>
    <br>
    <br>
    <br>

<h3><b>GESTION DES ITINERAIRES</b></h3>

<div id="border"></div>

<br>

<img src="images/chrome_Qj4I3vwotA.png" width="400" height="250" id="a">

<br>
<br>
<br>

<h2 class="divider2"></h2>

<br>
<br>

<br>


<form action="author.php" method="post">


    <label>Code itinéraire</label>
    <div class="input-group mb-3" style = "width:750px" >
        <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>

    <label>Nom itinéraire</label>
    <div class="input-group mb-3" style = "width:750px" >
        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="90" name = "nameofroute">
    </div>

    <label for="exampleFormControlTextarea1" id = "placemark_description">Description itinéraire <br> (route)</label>
    <div class="form-group" style = "width:750px">
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <br>

    <label id = "upload">Photo itinéraire</label>
    <div class="custom-file" style = "width:750px">
        <input type="file" class="form-control" id="inputGroupFile04" accept=".jpg, .jpeg, .png, .tiff">
    </div>

    <br>


    <label>Statut Disponibilité</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        Checkbox
    </div>

    <br>

    <h1 class="divider" style="margin-left:200px; width:1200px;"></h1>

    <br>


    
    <br>

    <label>Auteur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        Lieu proposé &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        Photo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        Video &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        Podcast &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        Icone
    </label>

    <br>
    <br>

    <div class="input-group mb-3" style="margin-left:200px;">

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;
        
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


    </div>

    <div class="input-group mb-3" style="margin-left:200px;">

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;
        
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


    </div>

    <div class="input-group mb-3" style="margin-left:200px;">

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;
        
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


    </div>

    <div class="input-group mb-3" style="margin-left:200px;">

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;
        
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


    </div>

    <div class="input-group mb-3" style="margin-left:200px;">

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;
        
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


    </div>

    <div class="input-group mb-3" style="margin-left:200px;">

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;
        
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


    </div>

    <div class="input-group mb-3" style="margin-left:200px;">

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

        <div class="input-group mb-3" style="margin-left:0px; width:100px">
            <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;
        
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;
        
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">


    </div>

    <!-- <label id="ava">Disponible depuis</label>
    <input type="date" id="birthday" name="birthday">

    <label>à</label>
    <input type="date" id="to" name="birthday" class="s2"> -->

    
    <br>
    <br>

    <button type ="button" class="d" style = "width:150px" onclick = "b()">Retour</button>
    <button type ="submit" class="d" style = "width:150px" id = "save">Enregistrer</button>
    <button type ="button" class="d" style = "width:150px" id="cancel" onclick="a()">Reprendre</button>

   

</form>
    
</body>

<script>

    function b() {
        window.location.href="home.php";
    }

</script>


</html>