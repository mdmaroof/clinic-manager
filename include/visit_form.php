<?php

$mysqli = mysqli_connect("localhost", "root", "root", "preleaf");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

  //initialize variable to store errors
  $err ="";
    $profile_id =  $mysqli->real_escape_string($_POST['profile_id']);
    $disease =  $mysqli->real_escape_string($_POST['disease']);
    $since = $mysqli->real_escape_string($_POST['since']);



  $sql = "INSERT INTO visit_form (profile_id, disease, since) 
  VALUES ('$profile_id', '$disease', '$since')";
      if($mysqli->query($sql) === true){
        header("Location: ../index.php?message=success");
      }
      else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
    }
    
  
  // Close connection
  mysqli_close($mysqli);
          
          ?>
