<div>

<?php
include("includes/db.php");
$total=0;
		
		global $con;
		$ip = getIp();
		$sel_price = "select * from cart where ip_add='$ip'"or die("MySQL error: " . mysqli_error($con) . "<hr>\nQuery: $ip");
		$run_price = mysqli_query($con,$sel_price);
		
		while($p_price = mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id'];
			
			$pro_price = "select * from products where product_id='$pro_id'";
			
			$run_pro_price=mysqli_query($con,$pro_price);
			while($pp_price = mysqli_fetch_array($run_pro_price)){
				
				$product_price = array($pp_price['product_price']);
				$product_name = $pp_price['product_title'];
				$values = array_sum($product_price);
				
				$total +=$values;
				
			}
			
		}
?>



	<h2 align="center">Pay now with Paypal:</h2>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="business3test@shop.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?php echo $product_title; ?>">
  <input type="hidden" name="amount" value="<?php echo $total;?>" />
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="return" value="http://onlinetuting.com/myshop/paypal_success.php">
  <input type="hidden" name="cancel_return" value="http://onlinetuting.com/myshop/paypal_cancel.php">

  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/webstatic/mktg/merchant/pages/express-checkout/express-checkout-hero-sg.png?w=240" width="200" height="100"
  style="margin-left:300px;"alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
	


</div>