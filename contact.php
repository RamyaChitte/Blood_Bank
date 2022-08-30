<?php
//get data from form  
$name = $_POST['name'];
$email= $_POST['email'];
$sub= $_POST['sub'];
$message= $_POST['message'];
$to = "sanjanaiyengar10@gmail.com,chitte.ramya@gmail.com";
$subject="Mail From Blood Bank User";
$txt =" Name = ". $name . "\r\n Email = " . $email . "\r\n Subject = ". $sub . "\r\n Message = " . $message;
$headers = "From: bloodbank030201@gmail.com";
if(mail($to,$subject,$txt,$headers)){
    echo "Email successfully sent!";
}
else{
    echo "Email could not be sent.";
}

?>