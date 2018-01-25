<?php
$id = $_GET['id'];
?>
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
<div class="container mt-3">
<div class="row">
<div class="col-12">
<ul>
<li><a class="btn btn-primary" href="index.php">Home Page</a></li>
</ul>
</div>
</div>
</div>


<div class="container">
<div class="row">
<div class="col-12">

<div class="card bg-light mb-3">
  <div class="card-header">Profile</div>
  <div class="card-body">
    <p class="card-text">
    <?php
$mysqli = mysqli_connect("localhost", "root", "root", "preleaf");

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM profile WHERE id=$id";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "User Id : $row[id] <br>";
        echo "Name : $row[name] <br>";
        echo "Age: $row[age] <br>";
        echo "Email: $row[email] <br>";
        echo "Address: $row[address] <br>";
        echo "City : $row[city] <br>";
        echo "Phone : $row[phone] <br>";
    }
} else {
    echo "No File Updated";
}

// Close connection
mysqli_close($mysqli);
?>
    </p>
  </div>
</div>
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-12">

<div class="card bg-light mb-3">
  <div class="card-header">Details</div>
  <div class="card-body">
    <p class="card-text">
    <?php
$mysqli = mysqli_connect("localhost", "root", "root", "preleaf");

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM `visit_form` WHERE profile_id=$id";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Disease Suffering from: $row[disease] <br>";
        echo "Since When: $row[since] <br>";
        echo "Last Updated: $row[last_visit]";
    }
} else {
    echo "No File Updated";
}

// Close connection
mysqli_close($mysqli);
?>
    </p>
  </div>
</div>
</div>
</div>
</div>



<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</script>
</body>
</html>
