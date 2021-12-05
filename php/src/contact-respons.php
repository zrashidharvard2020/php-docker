<?php

$error = '';
$name = '';
$email = '';
$phone = '';
$message = '';

// Connecting, selecting database
  $mysqli = new mysqli('localhost','root','','contactbd');
  if ($mysqli->connect_errno) {
      echo "Failed to connect to mysql: ".$mysqli->connect_errno." ".$mysqli->connect_error;
  }

if(isset($_POST["submit"]))
{
    $name = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $message = $mysqli->real_escape_string($_POST['message']);
    
    // Performing SQL query
 $query = "INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`) VALUES ('0', '".$name."', '".$email."', '".$phone."', '".$message."')";

    $result = $mysqli->query($query);
    
    if($result){
        header("Location: contact.php?successmessage=yes");
    }else{
        header("Location: contact.php?successmessage=no");
    }
}
else{
    echo "sss";
}



?>
