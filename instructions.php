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
        <h2> <b>Instructions</b></h2>
    </div>

    <br>

    <div id="border"></div>

    <img src="images/chrome_Qj4I3vwotA.png" width="250" height="200" id="a">

    <br>
    <br>
    <br>
    <br>
    
  

    <br>
    <br>

    <div>
        <button type="button" class="custombutton" onclick="logout()">Quitter</button>
        <button type="button" class="custombutton" onclick="nextpage()" style = "margin-left:200px;">Page suivante</button>
    </div>

   

    <br>
    <br>
    
</body>

<script>

    function logout () {
        window.location.href="index.php";
    }

    function nextpage () {
        window.location.href="home.php";
    }

</script>


</html>