<?php

$conn  = mysqli_connect('localhost','ovais','test', 'onepiece');



$fname =  $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];

$lat = floatval($_REQUEST['lat']);
$lng = floatval($_REQUEST['lng']);


$data = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$name = $_FILES["image"]["name"];




$create_table = "CREATE TABLE testss (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    address VARCHAR(80) NOT NULL,
    email VARCHAR(50),
    lat FLOAT(10,6) NOT NULL,
    lng FLOAT(10,6) NOT NULL,
    image_name VARCHAR(100),
    image LONGBLOB
     )";


mysqli_query($conn, $create_table);
   

$sql = "INSERT INTO testss (firstname,lastname,address,email,lat,lng,image_name,image)
VALUES ('$fname', 
'$lname', '$address', '$email', '$lat', '$lng', '$name', '$data' )";


mysqli_query($conn,$sql );

// if(mysqli_query($conn, $sql)){
//     echo "<h3>data stored in a database successfully." 
//         . " Please browse your localhost php my admin" 
//         . " to view the updated data</h3>"; 

// }
//  else{
//     echo "ERROR: Hush! Sorr" 
//         . mysqli_error($conn);
// }

$query = 'SELECT * FROM testss';
$result = mysqli_query($conn, $query);

$kml = array('<?xml version="1.0" encoding="UTF-8"?>');
$kml[] = '<kml xmlns="http://earth.google.com/kml/2.1">';
$kml[] = ' <Document>';
$kml[] = ' <Style id="restaurantStyle">';
$kml[] = ' <IconStyle id="restuarantIcon">';
$kml[] = ' <Icon>';
$kml[] = ' <href>http://maps.google.com/mapfiles/kml/pal2/icon63.png</href>';
$kml[] = ' </Icon>';
$kml[] = ' </IconStyle>';
$kml[] = ' </Style>';
$kml[] = ' <Style id="barStyle">';
$kml[] = ' <IconStyle id="barIcon">';
$kml[] = ' <Icon>';
$kml[] = ' <href>http://maps.google.com/mapfiles/kml/pal2/icon27.png</href>';
$kml[] = ' </Icon>';
$kml[] = ' </IconStyle>';
$kml[] = ' </Style>';


while ($row = @mysqli_fetch_assoc($result)) 
{
  $kml[] = ' <Placemark id="placemark' . $row['id'] . '">';
  $kml[] = ' <name>' . htmlentities($row['firstname']) . '</name>';
  $kml[] = ' <description>' . htmlentities($row['address']) . '</description>';
  $kml[] = ' <styleUrl>#' . ($row['email']) .'Style</styleUrl>';
  $kml[] = ' <Point>';
  $kml[] = ' <coordinates>' . $row['lng'] . ','  . $row['lat'] . '</coordinates>';
  $kml[] = ' </Point>';
  $kml[] = ' </Placemark>';
 
} 


$kml[] = ' </Document>';
$kml[] = '</kml>';
$kmlOutput = join("\n", $kml);
header('Content-type: application/vnd.google-earth.kml+xml');
echo $kmlOutput;




?>



