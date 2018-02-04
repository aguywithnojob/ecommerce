<!DOCTYPE html>
<?php
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
			
				<img id="logo" src="images/text.png"  alt="logo"/>
					
			</div>
			
			<!-- header ends here --->
			
			
			<!--navbar starts here -->
				<div class="menubar">
			
			
					<ul id="menu">
						<li><a href="index.php">Home</a></li>
						<li><a href="all_products.php">All Products</a></li>
						<li><a href="customer/my_account.php">My Account</a></li>
						<li><a href="customer_register.php">Sign up</a></li>
						<li><a href="cart.php">Shopping cart</a></li>
						<li><a href="contact_us.php">Contact us</a></li>
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
							<b style="color:yellow"> Shoping Cart:</b> Total Items: Total Price: <a href="cart.php" style="color:yellow;">Go to Cart </a>
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
							
						<?php	
									if(isset($_GET['pro_id'])){
										
											$product_id = $_GET['pro_id'];
											$get_pro = "SELECT * FROM products WHERE product_id='$product_id'";
											$run_pro = mysqli_query($con,$get_pro);
											while($row_pro = mysqli_fetch_array($run_pro)){
											
												$pro_id = $row_pro['product_id'];
												$pro_title = $row_pro['product_title'];
												$pro_price = $row_pro['product_price'];
												
												$pro_image = $row_pro['product_image'];
												$pro_desc = $row_pro['product_desc'];
												
												echo"
													<div id='single_product'>
														
														<h3 style='text-align:center;'>$pro_title</h3>
														<img src='admin_area/product_images/$pro_image' width='400' height='300'/>
														<p style='text-align:center;'><b>$:$pro_price </b></p>
														
														<p>$pro_desc</p>
														
														<a href='index.php' style='float:left;'>Go Back</a>
														<a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add To Cart</button></a>
														
														
													</div>
												";
												}
									}
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