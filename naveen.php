<?php

#syntax
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="pro";#Changing lines give database name

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

#user define values
$name1=$_POST['name'];
#$roll=$_POST['rollno'];
$mail=$_POST['email'];
$pwd=$_POST['password'];
#$cpwd=$_POST['s_password2'];
#$phone=$_POST['mobileno'];
#$dob=$_POST['dob'];
#$cname=$_POST['s_vaccines'];


$sql2 = "INSERT INTO detail (name,email,password)
VALUES ('$name1', $mail','$pwd')";

#syntax
/*if (mysqli_query($conn, $sql2)) {
  #echo "Table is inserted successfully";
	include 'm-login.php';
	echo $error='<script> alert("Your datas are recorded successfully") </script>';

} else {
  echo "Error creating table: " . mysqli_error($conn);
}*/
?>