<?php
function component($productid,$productname,$productprice,$productimg){
	
$element="

<div class='co-4'>
<form action='product2.php' method='post'>
    		<img src='$productimg'>
    		<h4>$productname</h4>
    		<div class='rat'>
    		<i class='fa fa-star'></i>	
   			<i class='fa fa-star'></i>
    		<i class='fa fa-star'></i>
    		<i class='fa fa-star'></i>
    		<i class='fa fa-star-o'></i>
    		</div>
    		<p>$$productprice</p>	
    	 <button type='submit' name='add'  class='bt' >Add to cart</button>
		
    	 <input type='hidden' name='product_id' value='$productid'>
		<button class='bt' formaction='payment.php'>Buy</button>
    	</form>	
    </div>
";

echo $element;
}

function cartElement($productid,$productimg,$productname,$productprice){
	$element="
		<form action='cart.php?action=remove&id=$productid' method='post' name='pid'>
			<div class='cart-item1' style='width:; float:left;'>
				<div class='cart-item2'>
					<div class='cart-item3'>
						<img src='$productimg' width='200px' class='img-fluid' style='display:inline-block;'>
					</div>
					<div class='cart-item4'>
						<h5>$productname</h5>
						<small>Seller:FashMart</small>
						<h5>$$productprice</h5>
						<button type='submit' class='bt'>Save Later</button>
						<button type='submit' class='bt' name='remove'>Remove</button>
						<div>
						</div>
					</div>
				</div>
			</div>
		</form>";

	echo $element;
}
?>