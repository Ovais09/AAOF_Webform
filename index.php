<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css" type="text/css">
    <title>Document</title>
</head>
<body>

<div id="headere">
    <h2>Gestion des routes du livre</h2>
</div>

<div id="rectangle">

</div>

<img src ="images/chrome_Qj4I3vwotA.png" height="300" width="400">

<div id="text">
    <p>Bienvenue! Vous êtes sur le point de vous connecter à votre compte.</p>

    <p>Pour vous connecter:</p>

    <ul>
    <li>Veuillez utiliser les plus récentes informations de connexion que vous possédez.</li>
    <li>Si vous avez oublié votre mot de passe, veuilliez utiliser l'outil de renouvellement de mot de passe ci-dessous</li>

    </ul>

</div>


<form>
<!-- 
    <div class="input-group mb-3" >
        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="50" placeholder="Prénom">    
    </div>

    <div class="input-group mb-3" >
        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="50" placeholder="Nom">
    </div>

    <div class="form-group">
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inscrire une adresse courriel">
        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</small>
    </div>
    
    <div class="form-group">
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
    </div> -->

    <br>

    <div class="input-group mb-3" style="width:500px;" id="fname">
    <label>Nom d'utilisateur</label>
        <input id="n" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="50">    
    </div>


    <div class="input-group mb-3" style="width:500px;" id="fname">
    <label>Mot de passe</label>
        <input id="wry" type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="50">    
    </div>
    

    <br>

    <button type="button" class="custombutton" onclick="login()">CONNEXION</button>

</form>

<br>

<a href="https://www.facebook.com/"><p id="forgot">Mot de passe oublié</p> </a>

<br>
<br>

<script>

    function login() {
        window.location.href="home.php";
    }



</script>
    
</body>
</html>