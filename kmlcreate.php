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
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


//getting all the data from colunm Code_itneraire from table RouteForm and storing them in an array
$array = array();
while ($row = mysqli_fetch_array($result)) {
    $array[] = $row['Code_itineraire'];
}

if ($nomresult = mysqli_query($conn, $nom)) {
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
    } else {
        echo "Error: " . $select . "<br>" . mysqli_error($conn);
    }

    //getting the file from the server and storing it in a variable;


    $rows = mysqli_fetch_all($resultselect, MYSQLI_ASSOC);

    $photos = array();
    for ($i = 0; $i < count($rows); $i++) {
        $photos[] = $rows[$i]['image_name_photo'];
    }

    // $photo = file_get_contents('AuthorFormUploads/' . $photos[0]);
    // $photo  = base64_encode($photo);



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
    $routenames = $routename[1];
    $_SESSION['routename'] = $routenames;

    $routeid = $routename[0];


    $authordescription = array();
    for ($i = 0; $i < count($rows); $i++) {
        $authordescription[] = $rows[$i]['LieuDescription'];
    }

    $managestylecascade = array();
    $managestylecascade[0] = "__managed_style_173785644C1EEF0E1E9A";
    $managestylecascade[1] = "__managed_style_10F30830181EE575F6C1";
    $managestylecascade[2] = "__managed_style_20FC69FF5F1EEF222DC2";

    $managestylemap = array();
    $managestylemap[0] = "__managed_style_0EE5DE14A21EE575F6C1";
    $managestylemap[1] = "__managed_style_007D815D771EEF0E1E9A";
    $managestylemap[2] = "__managed_style_374DA35C841EEF20DE93";


    $kml = array('<?xml version="1.0" encoding="UTF-8"?>');
    $kml[] = '<kml xmlns="http://earth.google.com/kml/2.2" xmlns:gx="http://www.google.com/kml/ext/2.2" xmlns:kml="http://www.opengis.net/kml/2.2" xmlns:atom="http://www.w3.org/2005/Atom">';
    $kml[] = ' <Document>';
    $kml[] = ' <name>' . $routename . '</name>';

    $kml[] = ' <Style id="s_hhmi_scientist_splashgrid_n">';
    $kml[] = ' <IconStyle>';
    $kml[] = ' <Icon>';
    $kml[] = ' <href>https://www.gstatic.com/earthfeed/icons/pinlet_green_ON_64.png</href>';
    $kml[] = ' </Icon>';
    $kml[] = '<hotSpot x="0.5" y="0" xunits="fraction" yunits="fraction"/>';
    $kml[] = '<gx:scalingMode>fixedScaling</gx:scalingMode>';
    $kml[] = ' </IconStyle>';
    $kml[] = '<labelStyle>';
    $kml[] = "<scale>0</scale>";
    $kml[] = '</labelStyle>';
    $kml[] = '<BalloonStyle>';
    $kml[] = '<text><![CDATA[<!doctype html>
    <html lang="en-US">
      <head>
        <meta charset="UTF-8" />
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="version" content="23.1.0" />
        <style>
          body {overflow: hidden; visibility: hidden}
        </style>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500|Roboto+Slab|Material+Icons" type="text/css" />
        <link rel="stylesheet" href="https://www.gstatic.com/earth/earthfeed/mdl/1.1.3/material.blue_grey-blue.min.css" />
        <link rel="stylesheet" href="https://www.gstatic.com/earth/earthfeed/css/earthfeed.v23.x.min.css" type="text/css" />
        <script src="https://www.gstatic.com/earth/earthfeed/mdl/1.3.0/material.min.js"></script>
      </head>
      <body>
        <div data-component="EfIntro" class="ef-container ef-intro" style="background-image:  url($[imageUrl]);">
          <div class="ef-background-video" data-component="EfBackgroundVideo" data-hide-if-empty="$[videoUrl]">
            <video class="ef-background-video__video" data-poster="$[imageUrl]" muted preload="auto" autoplay loop>
              <source data-src="$[videoUrl]" type="video/mp4" />
            </video>
          </div>
          <main class="ef-intro__main">
            <div class="ef-intro__logo-container" data-hide-if-empty="$[logoImageUrl]">
              <a href="$[logoLink]" aria-label="$[intro_logoLink_ariaLabel]" role="link">
                <img data-src="$[logoImageUrl]" class="ef-intro__logo" />
              </a>
            </div>
            <div class="ef-intro__content">
              <h1 class="ef-intro__title">$[name]</h1>
              <p class="ef-intro__description">$[description]</p>
            </div>
            <ul class="ef-intro-tiles">
              <li class="ef-intro-tiles__tile" style="background-image: url($[chapter1_url]);">
                <a href="#efeed_hhmi_scientists_1;balloonFlyto" aria-label="$[introTile_imageLink_ariaLabel]" role="link">
                  <span>$[chapter1]</span>
                </a>
              </li>
              <li class="ef-intro-tiles__tile" style="background-image: url($[chapter2_url]);">
                <a href="#efeed_hhmi_scientists_4;balloonFlyto" aria-label="$[introTile_imageLink_ariaLabel]" role="link">
                  <span>$[chapter2]</span>
                </a>
              </li>
              <li class="ef-intro-tiles__tile" style="background-image: url($[chapter3_url]);">
                <a href="#efeed_hhmi_scientists_7;balloonFlyto" aria-label="$[introTile_imageLink_ariaLabel]" role="link">
                  <span>$[chapter3]</span>
                </a>
              </li>
              <li class="ef-intro-tiles__tile" style="background-image: url($[chapter4_url]);">
                <a href="#efeed_hhmi_scientists_9;balloonFlyto" aria-label="$[introTile_imageLink_ariaLabel]" role="link">
                  <span>$[chapter4]</span>
                </a>
              </li>
              <li class="ef-intro-tiles__tile" style="background-image: url($[chapter5_url]);">
                <a href="#efeed_hhmi_scientists_11;balloonFlyto" aria-label="$[introTile_imageLink_ariaLabel]" role="link">
                  <span>$[chapter5]</span>
                </a>
              </li>
              <li class="ef-intro-tiles__tile" style="background-image: url($[chapter6_url]);">
                <a href="#efeed_hhmi_scientists_13;balloonFlyto" aria-label="$[introTile_imageLink_ariaLabel]" role="link">
                  <span>$[chapter6]</span>
                </a>
              </li>
            </ul>
            <div data-hide-if-empty="$[captionText]" class="ef-intro__credit">
              <a href="$[captionLink]" target="_blank" aria-label="$[intro_captionLink_ariaLabel]" role="link">$[captionText]</a>
            </div>
          </main>
        </div>
        <script src="https://www.gstatic.com/earth/earthfeed/js/earthfeed.v23.x.min.js"></script>
        <script>componentHandler.upgradeAllRegistered()</script>
        <script type="x-component/x-template-string">
          <EfTemplate>
            <EfIntro>
              <EfIntroTile
                tileTitle = "$[chapter1]"
                tileText = "$[chapter1]"
                tileImageUrl = "$[chapter1_url]"
                tileImageLink = "#efeed_hhmi_scientists_1;balloonFlyto" />
              <EfIntroTile
                tileTitle = "$[chapter2]"
                tileText = "$[chapter2]"
                tileImageUrl = "$[chapter2_url]"
                tileImageLink = "#efeed_hhmi_scientists_4;balloonFlyto" />
              <EfIntroTile
                tileTitle = "$[chapter3]"
                tileText = "$[chapter3]"
                tileImageUrl = "$[chapter3_url]"
                tileImageLink = "#efeed_hhmi_scientists_7;balloonFlyto" />
              <EfIntroTile
                tileTitle = "$[chapter4]"
                tileText = "$[chapter4]"
                tileImageUrl = "$[chapter4_url]"
                tileImageLink = "#efeed_hhmi_scientists_9;balloonFlyto" />
              <EfIntroTile
                tileTitle = "$[chapter5]"
                tileText = "$[chapter5]"
                tileImageUrl = "$[chapter5_url]"
                tileImageLink = "#efeed_hhmi_scientists_11;balloonFlyto" />
              <EfIntroTile
                tileTitle = "$[chapter6]"
                tileText = "$[chapter6]"
                tileImageUrl = "$[chapter6_url]"
                tileImageLink = "#efeed_hhmi_scientists_13;balloonFlyto" />
            </EfIntro>
          </EfTemplate>
        </script>
      </body>
    </html><!-- From cache. -->]]></text>';
    $kml[] = '<bgcolor>ff383226</bgcolor>';
    $kml[] = '<gx:displayMode>fullscreen</gx:displayMode>';
    $kml[] = '</BalloonStyle>';
    $kml[] = '</Style>';

    $kml[] = '<StyleMap id="s_hhmi_scientist_splashgrid">';
    $kml[] = '<Pair>';
    $kml[] = '<key>normal</key>';
    $kml[] = '<styleUrl>#s_hhmi_scientist_splashgrid_n</styleUrl>';
    $kml[] = '</Pair>';
    $kml[] = '<Pair>';
    $kml[] = '<key>highlight</key>';
    $kml[] = '<styleUrl>#s_hhmi_scientist_splashgrid_h</styleUrl>';
    $kml[] = '</Pair>';
    $kml[] = '</StyleMap>';

    $kml[] = '<Placemark id="efeed_hhmi_scientists_0">';
    $kml[] = '<name>Les routes du livre</name>';
    $kml[] = '<snippet></snippet>';
    $kml[] = '<description>Les routes du livre permettent de faire découvrir les auteur.e.s francophones de l’Ontario. Ces routes sont une invitation à découvrir des oeuvres uniques dans un contexte original et unique.</description>';
    $kml[] = '<LookAt>';
    $kml[] = '<gx:ViewerOptions>';
    $kml[] = '<gx:option enabled="0" name = "streetview"></gx:option>';
    $kml[] = '</gx:ViewerOptions>';
    $kml[] = '<longitude>34.486389</longitude>';
    $kml[] = '<latitude>-18.883056</latitude>';
    $kml[] = '<altitude>0</altitude>';
    $kml[] = '<heading>0</heading>';
    $kml[] = '<tilt>45</tilt>';
    $kml[] = '<range>10000</range>';
    $kml[] = '</LookAt>';
    $kml[] = '<styleUrl>#s_hhmi_scientist_splashgrid</styleUrl>';
    $kml[] = '<ExtendedData>';
    $kml[] = '<Data name="chapter1">';
    $kml[] = '<value>Giorno Giovanna</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter2">';
    $kml[] = '<value>Coral Reefs in American Samoa</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter3">';
    $kml[] = '<value>Ebola Outbreak in West Africa</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter4">';
    $kml[] = '<value>Climate Change in Yellowstone</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter5">';
    $kml[] = '<value>Genetically Modified Mosquitoes in Brazil</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter6">';
    $kml[] = '<value>Fossils in Oregon</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter1_url">';
    $kml[] = '<value>https://static.wikia.nocookie.net/jjba/images/1/19/Giorno_Giovanna_Anime.png/revision/latest?cb=20200310175513</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter2_url">';
    $kml[] = '<value>https://i.natgeofe.com/n/d326d61d-8ef6-4f4c-a03f-ab8fbbb40e6d/coral-reefs-2728211.jpg?w=795</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter3_url">';
    $kml[] = '<value>https://lh3.googleusercontent.com/0wOTHxp53EWJjZYTVKZlhYCaVIssJAztv3kOd8ZbhRPSJuIt6kK79airYZduTK0=s1280-rj</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter4_url">';
    $kml[] = '<value>https://lh3.googleusercontent.com/aRXi1AcLpk88vDBUz5OmsN8fwZTcRCG9t_1gZnE459HdKU_ghUo099PWBaI8oYA=s1280-rj</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter5_url">';
    $kml[] = '<value>https://lh3.googleusercontent.com/Tf0bP-i27Vss7uxZ2MCVd3G9pRNmNeCcjNZVwDPgjnLlr1oOcvAoapwrUvgKSf_4Ug=s1280-rj</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="chapter6_url">';
    $kml[] = '<value>https://lh3.googleusercontent.com/KynlP8f7NJHvRtzwyE6E80ZY0g25DwFXYSmid27wYNK1m1NHt-AUp-f_PJmyfzzk=s1280-rj</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="imageUrl">';
    $kml[] = '<value>https://images.unsplash.com/photo-1533073526757-2c8ca1df9f1c</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="logoImageUrl">';
    $kml[] = '<value>https://aaof.tech/zoro/KMLFiles/aaoflogo.png</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="targetAction">';
    $kml[] = '<value>balloonFlyto</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="buttonText">';
    $kml[] = '<value>Start Exploring</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="intro_captionLink_ariaLabel">';
    $kml[] = '<value>Caption</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="intro_logoLink_ariaLabel">';
    $kml[] = '<value>Logo</value>';
    $kml[] = '</Data>';
    $kml[] = '<Data name="introTile_imageLink_ariaLabel">';
    $kml[] = '<value>$[tileText]</value>';
    $kml[] = '</Data>';
    $kml[] = '</ExtendedData>';
    $kml[] = '<Point>';
    $kml[] = '<coordinates>34.486389,-18.883056,0</coordinates>';
    $kml[] = '</Point>';
    $kml[] = '</Placemark>';
    







    for ($i = 0; $i < count($rows); $i++) {
        $kml[] = '<gx:CascadingStyle kml:id="' . $managestylecascade[$i] .     '">';
        $kml[] = '<Style>';
        $kml[] = '<IconStyle>';
        $kml[] = '<scale>1.2</scale>';
        $kml[] = '<Icon>';
        $kml[] = '<href>https://earth.google.com/earth/rpc/cc/icon?color=d32f2f&amp;id=2000&amp;scale=4</href>';
        $kml[] = '</Icon>';
        $kml[] = '<hotSpot x="64" y="128" xunits="pixels" yunits="insetPixels"/>';
        $kml[] = '</IconStyle>';
        $kml[] = '<LabelStyle>';
        $kml[] = '</LabelStyle>';
        $kml[] = "<LineStyle>";
        $kml[] = '<width>7.592</width>';
        $kml[] = '</LineStyle>';
        $kml[] = '<PolyStyle>';
        $kml[] = '</PolyStyle>';
        $kml[] = '<BalloonStyle>';
        $kml[] = '<text><![CDATA[<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Test</title>
    <style>html,body{margin:0;padding:0;width:100%;height:100%}html::-webkit-scrollbar{width:16px}html::-webkit-scrollbar-track{box-sizing:border-box;background-color:var(--gm2-grey-900);border:1px solid transparent;transition:all .15s var(--gm2-easing-standard)}::-webkit-scrollbar-track:hover{border:1px solid var(--gm2-grey-800)}::-webkit-scrollbar-track:active{border:1px solid var(--gm2-grey-800)}html::-webkit-scrollbar-thumb{background-color:rgba(255,255,255,.24);background-clip:padding-box;border:4px solid transparent;border-radius:16px;transition:all .15s var(--gm2-easing-standard)}::-webkit-scrollbar-thumb:vertical{min-height:32px}::-webkit-scrollbar-thumb:horizontal{min-width:32px}::-webkit-scrollbar-thumb:hover{background-color:rgba(255,255,255,.36)}::-webkit-scrollbar-thumb:active{background-color:rgba(255,255,255,.48)}::-webkit-scrollbar-corner{background:transparent}div[unresolved].hidden{display:none}div[unresolved]{padding:20px}div[unresolved] h1{font-family:"Google Sans","Roboto","Noto",sans-serif;-webkit-font-smoothing:antialiased;font-size:18px;font-weight:normal;letter-spacing:0;line-height:24px;margin:0;margin-bottom:4px}div[unresolved] h2{font-family:"Roboto","Noto",sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;font-weight:600;line-height:20px;letter-spacing:.25px;color:#5f6368;margin-bottom:20px}div[unresolved] div{font-family:"Roboto","Noto",sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;font-weight:normal;line-height:20px;letter-spacing:.2px}</style>

    <script src="https://earth.google.com/balloon_components/base/1.0.23.0/polyfills/webcomponents-loader.js"></script>

    </head>

    <body>
    <div>
    <img src  = "https://aaof.tech/zoro/AuthorFormUploads/' . $photos[$i] . '"'   . ' width = "464px" height = "400px">
    </div>
    <simple-template title="$[name|escapeHtml]" snippet="$[snippet|escapeHtml]" description="$[description|escapeHtml]" carousel="$[carousel|escapeHtml]">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,700">

    <script src="https://earth.google.com/balloon_components/base/1.0.23.0/failsafe_bin.js"></script>
    </simple-template>
    <script src="https://earth.google.com/balloon_components/base/1.0.23.0/simple_template.js"></script>

    </body>
    </html>]]></text>';
        $kml[] = '<gx:displayMode>panel</gx:displayMode>';
        $kml[] = '</BalloonStyle>';
        $kml[] = '</Style>';
        $kml[] = '</gx:CascadingStyle>';
    }

    $kml[] = '<gx:CascadingStyle kml:id="__managed_style_07B0E6B4F41EFB377AF1">';
    $kml[] = '<Style>';
    $kml[] = '<IconStyle>';
    $kml[] = '<Icon>';
    $kml[] = '<href>https://earth.google.com/earth/rpc/cc/icon?color=d32f2f&amp;id=2000&amp;scale=4</href>';
    $kml[] = '</Icon>';
    $kml[] = '<hotSpot x="64" y="128" xunits="pixels" yunits="insetPixels"/>';
    $kml[] = '</IconStyle>';
    $kml[] = '<LabelStyle>';
    $kml[] = '</LabelStyle>';
    $kml[] = "<LineStyle>";
    $kml[] = '<color>ff000000</color>';
    $kml[] = '<width>8</width>';
    $kml[] = '</LineStyle>';
    $kml[] = '<PolyStyle>';
    $kml[] = '<color>40ffffff</color>';
    $kml[] = '</PolyStyle>';
    $kml[] = '<BalloonStyle>';
    $kml[] = '<text><![CDATA[<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>Test</title>
    <style>html,body{margin:0;padding:0;width:100%;height:100%}html::-webkit-scrollbar{width:16px}html::-webkit-scrollbar-track{box-sizing:border-box;background-color:var(--gm2-grey-900);border:1px solid transparent;transition:all .15s var(--gm2-easing-standard)}::-webkit-scrollbar-track:hover{border:1px solid var(--gm2-grey-800)}::-webkit-scrollbar-track:active{border:1px solid var(--gm2-grey-800)}html::-webkit-scrollbar-thumb{background-color:rgba(255,255,255,.24);background-clip:padding-box;border:4px solid transparent;border-radius:16px;transition:all .15s var(--gm2-easing-standard)}::-webkit-scrollbar-thumb:vertical{min-height:32px}::-webkit-scrollbar-thumb:horizontal{min-width:32px}::-webkit-scrollbar-thumb:hover{background-color:rgba(255,255,255,.36)}::-webkit-scrollbar-thumb:active{background-color:rgba(255,255,255,.48)}::-webkit-scrollbar-corner{background:transparent}div[unresolved].hidden{display:none}div[unresolved]{padding:20px}div[unresolved] h1{font-family:"Google Sans","Roboto","Noto",sans-serif;-webkit-font-smoothing:antialiased;font-size:18px;font-weight:normal;letter-spacing:0;line-height:24px;margin:0;margin-bottom:4px}div[unresolved] h2{font-family:"Roboto","Noto",sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;font-weight:600;line-height:20px;letter-spacing:.25px;color:#5f6368;margin-bottom:20px}div[unresolved] div{font-family:"Roboto","Noto",sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;font-weight:normal;line-height:20px;letter-spacing:.2px}</style>

    <script src="https://earth.google.com/balloon_components/base/1.0.23.0/polyfills/webcomponents-loader.js"></script>

    </head>

    <body>
    <div>
    <img src  = "https://aaof.tech/zoro/RouteFormUploads/ITI-2_AAOF.jpg"  width = "464px" height = "400px">
    </div>
    <simple-template title="$[name|escapeHtml]" snippet="$[snippet|escapeHtml]" description="$[description|escapeHtml]" carousel="$[carousel|escapeHtml]">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,700">

    <script src="https://earth.google.com/balloon_components/base/1.0.23.0/failsafe_bin.js"></script>
    </simple-template>
    <script src="https://earth.google.com/balloon_components/base/1.0.23.0/simple_template.js"></script>

    </body>
    </html>]]></text>';

    $kml[] = '<displayMode>panel</displayMode>';
    $kml[] = '</BalloonStyle>';
    $kml[] = '</Style>';
    $kml[] = '</gx:CascadingStyle>';


    for ($i = 0; $i < count($rows); $i++) {
        $kml[] = '<StyleMap id="' . $managestylemap[$i]  . '"' . '>';
        $kml[] = '<Pair>';
        $kml[] = '<key>normal</key>';
        $kml[] = '<styleUrl>' . $managestylecascade[$i] . '</styleUrl>';
        $kml[] = '</Pair>';
        $kml[] = '<Pair>';
        $kml[] = '<key>highlight</key>';
        $kml[] = '<styleUrl>' . $managestylecascade[$i] . '</styleUrl>';
        $kml[] = '</Pair>';
        $kml[] = '</StyleMap>';
    }

    $kml[] = '<StyleMap id="__managed_style_07558493E31EFB377AF0">';
    $kml[] = '<Pair>';
    $kml[] = '<key>normal</key>';
    $kml[] = '<styleUrl>#__managed_style_07B0E6B4F41EFB377AF1</styleUrl>';
    $kml[] = '</Pair>';
    $kml[] = '<Pair>';
    $kml[] = '<key>highlight</key>';
    $kml[] = '<styleUrl>#__managed_style_185D1AD7B51EFB377AF1</styleUrl>';
    $kml[] = '</Pair>';
    $kml[] = '</StyleMap>';






    for ($i = 0; $i < count($rows); $i++) {
        $kml[] = ' <Placemark>';
        $kml[] = ' <name>' . $fname[$i] . ' ' . $lname[$i] . '</name>';
        $kml[] = ' <description>' . $authordescription[$i] . '</description>';
        $kml[] = ' <styleUrl>' . $managestylemap[$i] . '</styleUrl>';

        $kml[] = ' <Point>';
        $kml[] = ' <coordinates>' . $long[$i] . ',' . $lat[$i] . ',0</coordinates>';
        $kml[] = ' </Point>';
        $kml[] = ' </Placemark>';
    }

    $kml[] = ' <Placemark>';
    $kml[] = ' <name>' . $routename . '</name>';
    
    $routedescriptionselect = "SELECT Description_itineraire FROM RouteForm WHERE Code_itineraire = '$routeid'";
    if ($routedescriptionresult = mysqli_query($conn, $routedescriptionselect)) {
    } else {
        echo "Error: " . $routedescriptionselect . "<br>" . mysqli_error($conn);
    }

    $routedescriptionrows = mysqli_fetch_all($routedescriptionresult, MYSQLI_ASSOC);
    $routedescription = $routedescriptionrows[0]['Description_itineraire'];

    $kml[] = ' <description>' . $routedescription . '</description>';
    $kml[] = ' <styleUrl>#__managed_style_07558493E31EFB377AF0</styleUrl>';
    $kml[] = ' <LineString>';
    $kml[] = '<coordinates>';
    for ($i = 0; $i < count($rows); $i++) {
        $kml[] = $long[$i] . ',' . $lat[$i] . " "; 
    }
    $kml[] = '</coordinates>';
    $kml[] = '</LineString>';
    $kml[] = '</Placemark>';



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
    fclose($myfile);

    $uploads_dir = 'KMLFiles/';

    if (copy($routename . ".kml", $uploads_dir . $routename . ".kml")) {
    } else {
        echo "Possible file upload attack!\n";
    }

    // if (copy($routename . ".kml", "https://drive.google.com/drive/folders/1lz9shegHBYTzEZlZHzDt-9qaaNk4HgHU/" . $routename . ".kml")) {
    //     echo "File is valid, and was successfully uploaded.\n";
    // } else {
    //     echo "Possible file upload attack!\n";
    // }

    unlink($routename . ".kml");


    header("Location: download.php");





    // //sending the file to the user's download folder
    // header('Content-disposition: attachment; filename=' . $routename . '.kml');

    // // //delete the php content from the kml file




    // // // header('Content-type: application/vnd.google-earth.kml+xml');

    // // // header('Content-Length: ' . filesize($routename . ".kml"));

    // readfile("KMLFiles/" . $routename . ".kml");





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