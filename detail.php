<?php

$id = $_GET['id'];
echo "<br>";


$mysqli = mysqli_connect("localhost", "root", "root", "preleaf");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql="SELECT * FROM profile WHERE id=$id";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo"User Id : $row[id] <br>";
    echo"Name : $row[name] <br>";
    echo"Age: $row[age] <br>";
    echo"Email: $row[email] <br>";
    echo"Address: $row[address] <br>";
    echo"City : $row[city] <br>";
    echo"Phone : $row[phone] <br>";
    }
}
else{
    echo "No File Updated";
}

// Close connection
mysqli_close($mysqli);
?>

