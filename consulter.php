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




//store the data from the colunm Code_itneraire in an array
// $array = array();
// foreach ($rows as $row) {
//     array_push($array, $row);
// }

// echo $array[0];
// echo $array[1];

if (isset($_POST['subform'])) {

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

    $arrayfix = array();
    $j = 0;


    for ($i = 0; $i < count($rows); $i++) {
        $arrayfix[$j] = $rows[$i]['FirstName'] . " " . $rows[$i]['LastName'];
        $j++;
        $arrayfix[$j] = $rows[$i]['LieuDescription'];
        $j++;
        $arrayfix[$j] = $rows[$i]['image_name_photo'];
        $j++;
        $arrayfix[$j] = $rows[$i]['image_name_video'];
        $j++;
        $arrayfix[$j] = $rows[$i]['image_name_podcast'];
        $j++;
        $arrayfix[$j] = $rows[$i]['image_name_icon'];
        $j++;
    }

    print_r($arrayfix);


    //splitting the variable %idroute from the comma
    $idroute = explode(",", $idroute);
    $idroute = $idroute[0];



    $sqlsss = "SELECT * FROM RouteForm WHERE Code_itineraire = '$idroute'";
    if ($resultsss = mysqli_query($conn, $sqlsss)) {
        echo "dioe";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    $rows = mysqli_fetch_all($resultsss, MYSQLI_ASSOC);

    $arrayfix2 = array();

    $arrayfix2[0] = $rows[0]['Nom_itineraire'];
    $arrayfix2[1] = $rows[0]['Description_itineraire'];
    $arrayfix2[2] = $rows[0]['checkbox_default'];

    $imagename = explode("_", $rows[0]['image_name']);
    $arrayfix2[3] = $imagename[1];
}






// $row = mysqli_fetch_assoc($resultselect);
// echo $row;
// echo $row[0];
// echo $row[1];
// echo $row[2];
// //echoing the data from that record
// $authorname = $row['FirstName'] . " " . $row['LastName'];
// echo $authorname;
// $authordescription  = $row['LieuDescription'];
// $photo = $row['image_name_photo'];
// $video = $row['image_name_video'];
// $podcast = $row['image_name_podcast'];
// $icon = $row['image_name_icon'];










?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/consulter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>

    <h2><b>GESTION DES ROUTES</b></h2>

    <br>

    <h2>Consulter/Modifier Route</h2>

    <br>



    <label id="titlelabels">Nom de la route associ??e</label>
    <div>
        <select class="form-control" style="width:750px" id="dropdownmenu" name="routeassociation" onchange="findelement()">
            <option disabled selected>(Identifiant num??rique, Nom de la route) </option>
        </select>
    </div>

    <br>

    <form action="consulter.php" method="post" enctype="multipart/form-data" id="chercherform">
        <div>
            <input type="text" style="display:none" name="idroute" id="idroute">
            <input type="text" style="display:none" name="justidroute" id="justidroute">
            <button type="submit" style="width:150px" class="d" name="subform" id="chercher">Chercher</button>
        </div>
    </form>

    <h2 class="divider2"></h2>

    <br>
    <br>


    <form action="home.php" method="post" id="myForm" enctype="multipart/form-data">

        <label>Code itin??raire</label>
        <div class="input-group mb-3" style="width:750px">
            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" id="change" readonly name="id" value="<?php echo $justidroute; ?>">
        </div>

        <label>Nom itin??raire</label>
        <div class="input-group mb-3" style="width:750px">
            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" maxlength="90" name="nameofroute" id="nameofroute">
        </div>

        <label for="exampleFormControlTextarea1" id="placemark_description">Description itin??raire <br> (route)</label>
        <div class="form-group" style="width:750px">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="routedescription"></textarea>
        </div>

        <br>

        <label id="upload" style="display:none">Photo itin??raire</label>
        <div class="custom-file" style="width:750px; display:none" id = "divupload">
            <input type="file" name="newfile" class="form-control" id="inputGroupFile04" accept=".jpg, .jpeg, .png, .tiff" onchange="ab()">
        </div>

        <br>
        <br>


        <label>Statut Disponibilit??</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="check">
            Checkbox
        </div>

        <br>
        <h2 class="divider2"></h2>

        <br>
        <br>



        <label style="margin-left:500px;">Auteur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Lieu propos?? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Photo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Video &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Podcast &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Icone
        </label>

        <br>
        <br>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control author" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control lieu" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input id="three" class="form-check-input photo" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input id="four" class="form-check-input video" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input id="five" class="form-check-input podcast" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input id="six" class="form-check-input icon" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control author" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control lieu" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input photo" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input video" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input podcast" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input icon" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control author" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control lieu" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input photo" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input video" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input podcast" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input icon" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control author" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control lieu" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input photo" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input video"" type=" checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input podcast" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input icon" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control author" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control lieu" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input photo" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input video" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input podcast" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input icon" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control author" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control lieu" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input photo" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input video" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input podcast" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input icon" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">


        </div>

        <div class="input-group mb-3" style="margin-left:500px;">

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control author" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp

            <div class="input-group mb-3" style="margin-left:0px; width:100px">
                <input type="text" class="form-control lieu" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
            </div>

            &nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;


            <input class="form-check-input photo" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;

            <input class="form-check-input video" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input class="form-check-input podcast" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;&nbsp&nbsp&nbsp;

            <input class="form-check-input icon" type="checkbox" value="" id="flexCheckDefault" disabled="disabled">


        </div>

        <input type="text" style="display:none" id="routeupload" name="routeupload">

        <input type="text" style="display:none" name="datejavascript" id="datejavascript">

        <button type="button" style="width:150px; margin-left:500px" onclick="homepage()" class="d">Retour</button>
        <button type="reset" style="width:150px; margin-left:150px" onclick="resete()" class="d">Reprendre</button>
        <button type="submit" style="width:150px; margin-left:125px" class="d" name="enregistrer">Enregistrer</button>

    </form>

    <br>
    <br>

    <!-- <label id="ava">Disponible depuis</label>
    <input type="date" id="birthday" name="birthday">

    <label>??</label>
    <input type="date" id="to" name="birthday" class="s2"> -->

</body>

<script>
    var date = new Date();
    console.log(date);

    document.getElementById("datejavascript").value = date;

    function homepage() {
        window.location.href = "home.php";
    }

    function resete() {

        var inputlength = document.getElementsByTagName("input").length;
        console.log(inputlength);

        for (var i = 0; i < inputlength; i++) {
            document.getElementsByTagName("input")[i].value = "";
        }

        //uncheck all checkboxes
        var checkboxes = document.getElementsByTagName('input');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
        }

        // clearing the textarea
        document.getElementsByTagName("textarea")[0].value = "";


        // window.location.reload();

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

    var databasearray = <?php echo json_encode($arrayfix); ?>;

    var authorname = [];
    for (var i = 0; i < databasearray.length / 6; i++) {
        authorname[i] = databasearray[i * 6];
    }

    var authordescription = [];
    for (var i = 0; i < databasearray.length / 6; i++) {
        authordescription[i] = databasearray[i * 6 + 1];
    }

    var photo = [];
    for (var i = 0; i < databasearray.length / 6; i++) {
        photo[i] = databasearray[i * 6 + 2];
    }

    var video = [];
    for (var i = 0; i < databasearray.length / 6; i++) {
        video[i] = databasearray[i * 6 + 3];
    }

    var podcast = [];
    for (var i = 0; i < databasearray.length / 6; i++) {
        podcast[i] = databasearray[i * 6 + 4];
    }

    var icon = [];
    for (var i = 0; i < databasearray.length / 6; i++) {
        icon[i] = databasearray[i * 6 + 5];
    }

    for (var i = 0; i < authorname.length; i++) {

        document.getElementsByClassName("author")[i].value = authorname[i];
    }

    for (var i = 0; i < authordescription.length; i++) {

        document.getElementsByClassName("lieu")[i].value = authordescription[i];
    }

    for (var i = 0; i < photo.length; i++) {

        if (photo[i].length > 12) {
            document.getElementsByClassName("photo")[i].checked = true;
        }
    }

    for (var i = 0; i < video.length; i++) {

        if (video[i].length > 12) {
            document.getElementsByClassName("video")[i].checked = true;
        }
    }

    for (var i = 0; i < podcast.length; i++) {

        if (podcast[i].length > 14) {
            document.getElementsByClassName("podcast")[i].checked = true;
        }
    }


    for (var i = 0; i < icon.length; i++) {

        if (icon[i].length > 12) {
            document.getElementsByClassName("icon")[i].checked = true;
        }
    }

    var databasetwo = <?php echo json_encode($arrayfix2); ?>;
    document.getElementById("nameofroute").value = databasetwo[0];

    document.getElementById("exampleFormControlTextarea1").value = databasetwo[1];

    var checkboxdefault = databasetwo[2];
    if (checkboxdefault.trim() == "checked") {
        console.log("wryyyyyyyyy");
        document.getElementById("flexCheckDefault").checked = true;

        var label = document.createElement("label");
        label.innerHTML = "Photo itin??raire";
        label.style.marginLeft = "-1030px";
        label.style.marginTop = "-685px";
        document.getElementById("myForm").appendChild(label);



        //add an input element of type = file
        var input = document.createElement("input");
        input.type = "file";
        input.name = "newfile";
        input.id = "inputGroupFile04";
        input.className = "form-control";
        input.style.width = "750px";
        input.style.position = "absolute";
        input.style.marginLeft = "500px";
        input.style.marginTop = "-720px";
        input.onchange = function() {
            var x  = this.value;
            var y = x.split("\\").pop();
            console.log(y);

            document.getElementById("routeupload").value = y;
        };
        document.getElementById("myForm").appendChild(input);

    }

    console.log(databasetwo[3]);
    document.getElementById("inputGroupFile04").name = databasetwo[3];
    document.getElementById("inputGroupFile04").value = databasetwo[3];

    function ab() {
        var x = document.getElementById("file").value;
        var y = x.split("\\").pop();
        console.log(x);
        console.log(y);
        document.getElementById("routeupload").value = y;
    }
</script>

</html>