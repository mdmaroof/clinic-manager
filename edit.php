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

<div class="container mt-3">
  <div class="row">
    <div class="col-6">
        <div class="card bg-light mb-3">
            <div class="card-header">Profile</div>
                <div class="card-body">

                    <?php
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
                        $address = $mysqli->real_escape_string($_POST['address']);
                        $city =  $mysqli->real_escape_string($_POST['city']);
                        $phone = $mysqli->real_escape_string($_POST['phone']);
                    
                        
                                $sql = "UPDATE `profile` SET `address`='$address',`city`='$city',`phone`='$phone' WHERE id='$id'";
                                        if($mysqli->query($sql) === true){
                                        echo"<div class='alert alert-danger' role='alert'>Saved Succesfuuly </div> <br>";
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
                </div>
            </div>
            </div>

            <div class="col-6">
<div class="card bg-light mb-3">
  <div class="card-header">Profile</div>
  <div class="card-body">
<?php

if(isset($_POST['update1']))
{    
    $profile_id =  $mysqli->real_escape_string($_POST['profile_id']);
    $disease =  $mysqli->real_escape_string($_POST['disease']);
    $since =  $mysqli->real_escape_string($_POST['since']);

$sql = "UPDATE `visit_form` SET `disease`='$disease',`since`='$since' WHERE profile_id='$profile_id'";
        if($mysqli->query($sql) === true){
         echo"<div class='alert alert-danger' role='alert'>Saved Succesfuuly </div> <br>";
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

</div>
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