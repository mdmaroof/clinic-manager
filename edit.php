<?php

$id = $_GET['id'];


$mysqli = mysqli_connect("localhost", "root", "root", "preleaf");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if(isset($_POST['update']))
{    
    $id =  $mysqli->real_escape_string($_POST['id']);
    $name =  $mysqli->real_escape_string($_POST['name']);
    $age =  $mysqli->real_escape_string($_POST['age']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $city =  $mysqli->real_escape_string($_POST['city']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
 
    
$sql = "UPDATE `profile` SET `name`='$name',`age`='$age',`email`='$email',`address`='$address',`city`='$city',`phone`='$phone' WHERE id='$id'";
        if($mysqli->query($sql) === true){
            echo"saved";
        }
        else{
            echo "error" .mysqli_error($mysqli);
        }
    } 

$sql = "SELECT * FROM `profile` where id=$id";
$result = $mysqli->query($sql);
    while($row = mysqli_fetch_assoc($result)) {
?>

   <form method="post" id="update_signup_form">
   <input type="hidden" name="id" id="id"  value="<?php echo "$row[id]";?>">
   <div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" type="name" name="name" id="name" value="<?php echo "$row[name]";?>">
    </div>
    <div class="form-group">
    <label for="age">Age</label>
    <input class="form-control" type="number" name="age" id="age" value="<?php echo "$row[age]";?>">
    </div>
    <div class="form-group">
<label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" value="<?php echo "$row[email]";?>">
</div>
<div class="form-group">
<label for="address">Address</label>
    <input class="form-control" type="text" name="address" id="address" value="<?php echo "$row[address]";?>">
    </div>
    <div class="form-group">
    <label for="city">City</label>
    <input class="form-control" type="name" name="city" id="city" value="<?php echo "$row[city]";?>">
    </div>
    <div class="form-group">
<label for="phone">Phone Number</label>
    <input class="form-control" type="number" name="phone" id="phone" value="<?php echo "$row[phone]";?>">
    </div>
   
    <button type="submit" name="update" class="btn btn-success btn-block">Submit</button>
    </form>   
<?php
}
?>


<?php

if(isset($_POST['update1']))
{    
    $profile_id =  $mysqli->real_escape_string($_POST['profile_id']);
    $disease =  $mysqli->real_escape_string($_POST['disease']);
    $since =  $mysqli->real_escape_string($_POST['since']);

$sql = "UPDATE `visit_form` SET `disease`='$disease',`since`='$since' WHERE profile_id='$profile_id'";
        if($mysqli->query($sql) === true){
         echo"saved";
        }
        else{
            echo "error" .mysqli_error($mysqli);
        }
    } 

$sql = "SELECT * FROM `visit_form` where profile_id=$id";
$result = $mysqli->query($sql);
    while($row = mysqli_fetch_assoc($result)) {
?>

   <form method="post" id="update_visit_form">

   <input type="hidden" name="profile_id" id="id"  value="<?php echo "$row[profile_id]";?>">

   <div class="form-group">
    <label for="disease">Disease Suffering From</label>
    <select class="form-control" name="disease" id="disease">
        <?php
          $disease = array("Fever","Diabetes","Malaria","Jaundis");
          foreach ($disease as $value){
            if($value == $row['disease']) {
                echo '<option value="'.$value.'" selected>'.$value.'</option>'; 
            } else {
                echo '<option value="'.$value.'">'.$value.'</option>';
            }
          } 
        ?>
    </select>
  </div>


<div class="form-group">
<label for="since">Since When</label>
    <select class="form-control" name="since" id="since">
    <?php
          $since = array("1 Week","2 Week","Last Month","1 Year");
          foreach ($since as $value){
            if($value == $row['since']) {
                echo '<option value="'.$value.'" selected>'.$value.'</option>'; 
            } else {
                echo '<option value="'.$value.'">'.$value.'</option>';
            }
          } 
        ?>
    </select>
  </div>

    <button type="submit" name="update1" class="btn btn-success btn-block">Submit</button>
    </form>   

<?php
    }
?>