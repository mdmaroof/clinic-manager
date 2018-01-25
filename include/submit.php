
<?php
$mysqli = mysqli_connect("localhost", "root", "root", "preleaf");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

  //initialize variable to store errors
  $err ="";
    $name =  $mysqli->real_escape_string($_POST['name']);
    $age =  $mysqli->real_escape_string($_POST['age']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $city =  $mysqli->real_escape_string($_POST['city']);
    $phone = $mysqli->real_escape_string($_POST['phone']);


  $sql = "INSERT INTO profile (name, age, email,address,city,phone) 
  VALUES ('$name', '$age', '$email','$address','$city','$phone')";
      if($mysqli->query($sql) === true){
          ?>
          
          <div class="alert alert-danger" role="alert">
        Record Added <b><?php echo "$name";?></b>
        </div>

<form method="POST" id="visit_form" action="include/visit_form.php">
<?php
$sql = "SELECT * FROM profile where email='$email'";
$result = $mysqli->query($sql);
    while($row = mysqli_fetch_assoc($result)) {

        echo "<input type='hidden' name='profile_id' id='profile_id' value='$row[id]'>";
    }
?>
<div class="form-group">
    <label for="disease">Disease Suffering From</label>
    <select class="form-control" name="disease" id="disease">
    <option value="Fever">Fever</option>
    <option value="Diabetes">Diabetes</option>
    <option value="Malaria">Malaria</option>
    <option value="Jaundis">Jaundis</option>
    </select>
  </div>


<div class="form-group">
<label for="since">Since When</label>
    <select class="form-control" name="since" id="since">
    <option value="1 Week">1 Week</option>
    <option value="2 Week">2 Week</option>
    <option value="Last Month">Last Month</option>
    <option value="1 Year">1 Year</option>
    </select>
  </div>
  <button type="submit" class="btn btn-success btn-block">Submit</button>
    </form>

  <?php 
  } else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
  }
  

// Close connection
mysqli_close($mysqli);

?>