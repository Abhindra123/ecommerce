<?php
session_start();
require_once("CreateDB.php");
require_once("Component.php");

//require_once("product2.php");
$db=new CreateDB("Productdb","Producttb");

if (isset($_POST['remove'])){
 //print_r($_GET['id']);
if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['art'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['art'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }

	
}


?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=0.1">
	<title>Product-F_smart</title>
	<link rel="stylesheet" type="text/css" href="PRO.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    	.cart-item1{
    		padding: 20px;
    	}

    </style>
</head>
<body>


<div class="container">
<div class="navbar">
	<div class="logo">
 <a href="PRO.html"><img src="f smart2.jpg"width="125px"></a>  
	</div>
	<nav>
		<ul id="Menuitems">
			<li><a href="PRO.html">Home</a></li>
			<li><a href="product2.php">Product</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="pro-in.html" >Account</a></li>
		</ul>
	</nav>
	<a href="cart.php"><img src="ct.png "width="30px" height="30px"></a>
	<?php
	if(isset($_SESSION['art'])){
		$count=count($_SESSION['art']);
		echo"$count ";
	}
	else{
		echo'0';
	}
	?>
		<img src="menu.png" class="menu" onclick="menutoggle()">
</div>
</div>


<div class ='first'>
	<div class="second">
		<div class="third">
			<div class="fourth">
				<h6>Mycart</h6>
				<hr>
				<?php
				$total=0;
				 if (isset($_SESSION['art'])){
                  $product_id = array_column($_SESSION['art'], 'product_id');
                 $result=$db->getdata();
                 while ($row=mysqli_fetch_assoc($result)) {

                 	foreach($product_id as $ID){
                 		if($row['id']==$ID){
                 			cartElement($row['id'],$row['product_img'],$row['product_name'], $row['product_price']);
                 			$total=$total+(int)$row['product_price'];
                 		}
                 	}
                 	// code...
                 }
             }
             else{
                  echo"Cart is empty";
              }
                 
				?>


				</div>
			</div>
	       
			<div class="amount" style="float:right ; background:yellow ; width: 20%; height: 200px;margin-top: 5px;position:absolute; display: inline-block; ">
				<div class="price">
					<h3 style="text-align: center;">PRICE DEATILS</h3>
					<hr>
					<div class="row-p" style="height: 100px;" >
						<div class="col1-price">
							<?php
                           if(isset($_SESSION['art'])){
                           	$count=count($_SESSION['art']);
                           	echo"<h5>Price($count items)</h5>";
                           }else{
                           	echo"<h5>Price(0 items)</h5>";
                           }

							?>
							<hr>
							<h5>Delivery Charge:FREE</h5>
							<hr>
							
							</div>
                          <div class="col2-price">
                          
                          	<h5>Amount Payable:  $<?php echo $total; ?></h5>

                          </div>

						
						
					</div>
				</div>
			</div>
	</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>