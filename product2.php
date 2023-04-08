<?php
session_start();

require_once('Component.php');
require_once('CreateDB.php');

$database=new CreateDB("Productdb","Producttb");
 
  
if(isset($_POST['add'])){
  //print_r($_POST['product_id']);
	
	if(isset($_SESSION['art'])){
     // print_r($_SESSION['art']);
		  $item_array_id = array_column($_SESSION['art'], "product_id");

 if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'product2.php'</script>";

        }else{
        	   $count = count($_SESSION['art']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['art'][$count] = $item_array;
            // print_r($_SESSION['art']);
        }
	
	}
	else{

        $item_array = array( 'product_id' => $_POST['product_id']);
               
        

        // Create new session variable
        $_SESSION['art'][0] = $item_array;
        print_r($_SESSION['art']);
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
			<li><a href="admin.php">Seller</a></li>
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
<div class="small-container"> 
   <div class ="row row-2">
   	<h2> All Products</h2>
   	<select>
   		<option>Default sorting</option>
   		<option>Sort by price</option>
   		<option>sort by popularity</option>
   		<option>sort by rating</option>
   		<option>sort by sale</option>
   		
   	</select>
   </div>

	 <div class="row">
	 	<?php
    $result=$database->getdata();
    while($row=mysqli_fetch_assoc($result)){
    	component($row['id'], $row['product_name'], $row['product_price'], $row['product_img']);
    }

		?>
</div>
 </div>        

    	
</body>
</html>

<!--https://github.com/akashyap2013/Advance_Shopping_cart/blob/master/cart.php---
	component("shirt 3.jpeg","Product1",569);
    	component("shirt1.jpeg","Product2",478);
    	component("coat.jpeg","Product3",674);
    	component("shoe.jpg","Product4",755);

INSERT INTO producttb(procduct_name,product_price,Product_img)VALUES 
('product 1',577,'shirt 3.jpeg'),('product 2',637,'shoe.jpg'),('product 1',872,'shirt1.jpeg'),
('product 3',699,'coat.jpeg')



if(isset($_SESSION['cart'])){
print_r($_SESSION['cart']);
	
	}else{
		$item_array=array(
			'product_id'=>$_POST['product_id']
		);
		$_SESSION['cart'][0]=$item_array;
		print_r($_SESSION['cart']);
	}
    
-->