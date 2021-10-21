<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/author.css" type="text/css">
</head>
<body>


<form id="myForm">
<h1>Author Placemark Management</h1>

<div class="input-group mb-3" style = "width:750px" >
  <label>Id</label>
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>


  <label id="titlelabels">Title</label>
  <select class="form-control" style = "width:750px" >
    <option  disabled selected>Please a select a title</option>
    <option value="Mr">Mr</option>
    <option value="Ms">Ms</option>
    <option value="Mrs">Mrs</option>
    <option value="Miss">Miss</option>
  </select>

  <br>

<div class="input-group mb-3" style = "width:750px" >
  <label>Author Last Name</label>
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<div class="input-group mb-3" style = "width:750px" >
  <label>Author First Name</label>
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<div class="input-group mb-3" style = "width:750px" >
  <label>Placemark Title</label>
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<div class="form-group" style = "width:750px">
    <label for="exampleFormControlTextarea1" id = "placemark_description">Placemark Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

<br>

<div class="custom-file" style = "width:750px">
    <input type="file" class="form-control" id="inputGroupFile04">
    <label id = "upload">Placemark Image</label>
</div>

<br>

<div class="custom-file" style = "width:750px">
    <input type="file" class="form-control" id="inputGroupFile04"> </input>
    <label id = "upload">Placemark Video</label>
</div>

<br>

<div class="custom-file" style = "width:750px">
    <input type="file" class="form-control" id="inputGroupFile04"> </input>
    <label id = "upload">Placemark Icon</label>
</div>

<br>

<div class="input-group mb-3" style = "width:250px" >
  <label id="latitude-text">Latitude</label>
  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<div class="input-group mb-3" style = "width:256px" id = "long" >
  <label id = "longitude-text">Longitude</label>
  <input type="text" class="form-control"  aria-label="Recipient's username" aria-describedby="basic-addon2">
</div>

<label id="titlelabels">Route</label>
  <select class="form-control" style = "width:750px" >
    <option  disabled selected>(ID, Route Title)</option>
    <option value="Mr">Mr</option>
    <option value="Ms">Ms</option>
    <option value="Mrs">Mrs</option>
    <option value="Miss">Miss</option>
  </select>

  <br>
  <br>

  <button class="btn btn-secondary" style = "width:150px" id="cancel" onclick="a()">Cancel</button>
  <button type="button" class="btn btn-secondary" style = "width:150px">Save</button>


  <br>
  <br>

  </form>


</body>


<script>

  function a () {
    document.getElementById("myForm").reset();
  }
 
</script>
</html>