<?php
$name=$_POST['username'];
$mail=$_POST['email'];
$pass=$_POST['password'];

if(!empty($username)  || !empty($email) || !empty($password))
	{

		$host='localhost';
		$dbusername='root';
		$dbpassword='';
		$dbname='ecommerce';
		$conn= new mysqli($host, $dbusername, $dbpassword, $dbname);
		if(mysqli_connect_error()){
			die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
		}
		else{
              $SELECT="SELECT email From user_details Where email=? Limit=1";
              $INSERT="INSERT Into user_details(username,email,password)values('$name','$mail','$pass')";
              $stmt=$conn->prepare($SELECT);
              $stmt->bind_param("s",$email);
              $stmt->execute();
              $stmt->bind_result($email);
              $stmt->store_result();
              $rnum=$stmt->num_rows;
              if($rnum==0)
              	{
              		$stmt->close();
              		$stmt=$conn->prepare($INSERT);
              		$stmt->bind_param("sss",$username,$email,$password);
              		$stmt->execute();
              	}

              else{
              	echo"Someone already registered using this email";
              }
              $stmt->close();
              $conn->close();
		}
	}
	
else{
	echo"All fields are required";
	die();
}



?>
