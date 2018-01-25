<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
        <!-- Bootstrap CSS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="include/style.css">


</head>
<body>

<div class="container">
<div class="row mt-3 mb-3">
<div class="col-12">
<ul>
<li>
<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal">
Add Profile
</button>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <div class="form_add">
      <div class="form-group">
    <form method="post" id="signup_form" action="">
    <div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" type="name" name="name" id="name">
    </div>
    <div class="form-group">
    <label for="age">Age</label>
    <input class="form-control" type="number" name="age" id="age">
    </div>
    <div class="form-group">
<label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email">
</div>
<div class="form-group">
<label for="address">Address</label>
    <input class="form-control" type="text" name="address" id="address">
    </div>
    <div class="form-group">
    <label for="city">City</label>
    <input class="form-control" type="name" name="city" id="city">
    </div>
    <div class="form-group">
<label for="phone">Phone Number</label>
    <input class="form-control" type="number" name="phone" id="phone">
    </div>
   
    <button type="submit" class="btn btn-success btn-block">Submit</button>
    </form>
    </div>




      </div>

    </div>
  </div>
</div>
<!-- Modal close -->
</li>

</ul>
</div>
</div>
</div>







<div class="container">


<?php

$msg=$_GET['message'];
if (!empty( $msg )){
echo "<div class='alert alert-danger' role='alert'>";
echo $msg;
echo"</div>";
}

?>


  <?php
$mysqli = mysqli_connect("localhost", "root", "root", "preleaf");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM `profile`";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    
    ?>
<table class="table table-bordered table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">Profile No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">View</th>
      <th scope="col">edit</th>
    </tr>
  </thead>
  <tbody>

     <?php 
     while($row = mysqli_fetch_assoc($result)) {
echo"<tr>";
echo"<td>$row[id]</td>";
echo"<td>$row[name]</td>";
echo"<td>$row[email]</td>";
echo"<td><a href='detail.php?id=$row[id]'>More Info +</a></td>";
echo"<td><a href='edit.php?id=$row[id]'>Edit Detail</a></td>";
echo"</tr>";

    }
}
else{
    echo "No File Updated Yet !!!";
}
?> 

  </tbody>
</table>
</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="include/ajax.js"></script>

</script>
</body>
</html>


