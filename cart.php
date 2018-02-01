<!DOCTYPE html>
<?php

session_start();
include("functions/functions.php");
?>
<html>
	<head>
		<title>My Online Shop</title>
		<link rel="stylesheet" type="text/css" href="styles/style.css">
	</head>
	<body>
	
		<!-- Main container starts here -->
		<div class="main_wrapper">
			
			<!-- header start here -->
			
			<div class="header_wrapper">
			
				<a href="index.php"><img id="logo" src="images/text.png"  alt="logo"/></a>
					
			</div>
			
			<!-- header ends here --->
			
			
			<!--navbar starts here -->
				<div class="menubar">
			
			
					<ul id="menu">
						<li><a href="index.php">Home</a></li>
						<li><a href="all_products.php">All Products</a></li>
						<li><a href="customer/my_account.php">My Account</a></li>
						<li><a href="#">Sign up</a></li>
						<li><a href="cart.php">Shopping cart</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				
				<div id="form">
				
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="search a product"/>
						<input type="submit" name="search" value="search"/>
					</form>
				</div>
			
			
				</div>
			<!--navbar ends here -->
			
			
			<!--content wrapper starts here -->
			<div class="content_wrapper">
				
				<div id="sidebar">
						<div id="sidebar_title">Categories</div>
						<ul id="cats">
							
							
							<?php getcats(); ?>
						</ul>
						
						
					<div id="sidebar">
						<div id="sidebar_title">Brands</div>
						<ul id="cats">
							<?php getbrands(); ?>
						
						</ul>
						
					</div>
				</div>
				
				
				<!--- content area starts here -->
					<div id="content_area">
					
						<?php cart(); ?>
					
						<div id="shopping_cart">
							
							<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
							<?php
								if(isset($_SESSION['customer_email'])){
										echo"<b>Welcome:</b>".$_SESSION['customer_email']."<b style='color:yellows;'>Your</b>";
								}
								else{
									echo"<b>Welcome Guest:</b>";
								}
							?>
							<b style="color:yellow"> Shoping Cart:</b> Total Items: <?php total_items(); ?> Total Price:<?php total_price(); ?> <a href="index.php" style="color:yellow;">Back to Shop </a>
							<?php 
								if(!isset($_SESSION['customer_email'])){
									echo"<a href='checkout.php' style='color:orange;'>Login</a>";
								}
								else
								{
									echo"<a href='logout.php' style='color:orange;'>Logout</a>";
								}
							?>
							</span>
						</div>
					
					
					
						<div id="product_box">
							
							<form action="" method="post" enctype="multipart/form-data">
							
								<table align="center" width="700px" bgcolor="skyblue">
								
									
									
									<tr align="center">
										<th>Remove</th>
										<th>Products</th>
										<th>Quantity</th>
										<th>Total Price</th>
																				
									</tr>
									
									<?php 
									
								
		
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
													
													$product_title= $pp_price['product_title'];
													
													$product_image = $pp_price['product_image'];
													
													$single_price = $pp_price['product_price'];
													$values = array_sum($product_price);
													$total +=$values;
									?>
									
									
									<tr align="center">
										<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
										<td><?php echo $product_title; ?> <br> 
											<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60px" height="60px" />
										</td>
										<td><input type="number" size="4" name="qty<?php echo($pro_id); ?>" value="1" min="1" max="10"/></td>
											<?php 
											if(isset($_POST['update_cart'])){
												$total=0;
												$qty =(int)$_POST['qty'.$pro_id];
												$ip = getIp();
												$update_qty = "update cart set qty='$qty' where ip_add='$ip' AND p_id='$pro_id'";
												
												$run_qty = mysqli_query($con, $update_qty); 
												
												$qty_select="select * from cart,products where cart.p_id=products.product_id";
												$run_select=mysqli_query($con,$qty_select)or die("MySQL error: " . mysqli_error($con) . "<hr>\nQuery: $ip");
												while($x_select=mysqli_fetch_array($run_select)){
													
													$new_qty=(int)$x_select['qty'];
													$new_price=(int)$x_select['product_price'];
													$s_price=$new_qty*$new_price;
													$total = $total+$s_price;
												}
												
												
											}
											
											
											?>
										
										<td><?php echo "$".$single_price; ?></td>
									
									</tr>
									
											<?php } }?>		
												
									<tr align="right">
										<td colspan="4"><b>Sub Total:</b></td>
										<td><?php echo "$".$total; ?></td>
									
									</tr>
									
									
									<tr align="centers">
									<td><input type="submit" name="update_cart" value="update cart"/></td>
									<td><input type="submit" name="continue" value="continue shopping"/></td>
									<td><button><a href="checkout.php" style="text-decoration:none; color:black;">Checkout</a></button></td>
									
									</tr>
								</table>
							
							</form>
							
							
							<?php
								function updatecart(){
		
										global $con; 
										
										$ip = getIp();
										
										if(isset($_POST['update_cart'])){
										
											foreach($_POST['remove'] as $remove_id){
											
											$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
											
											$run_delete = mysqli_query($con, $delete_product); 
											
											if($run_delete){
											
											echo "<script>window.open('cart.php','_self')</script>";
											
											}
											
											}
										
										}
										if(isset($_POST['continue'])){
										
										echo "<script>window.open('index.php','_self')</script>";
										
										}
									
									}
									echo @$up_cart = updatecart();
								
							?>
						
						</div>
					
					</div>
				<!--- content area ends here -->
			
			
		</div>	
		
		
		<!--content wrapper end here -->
			
			<div id="footer">
			<h2 style="text-align:center; padding-top:30px">&copy; 2019 by SHOPE DE CLOTHES</h2>
			</div>
		
		
		
	
	
	
	
	
	</div>
	</body>
</html>