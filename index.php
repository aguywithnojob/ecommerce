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
							
							
							
							<b style="color:yellow"> Shoping Cart:</b> Total Items: <?php total_items(); ?> Total Price:<?php total_price(); ?> <a href="cart.php" style="color:yellow;">Go to Cart </a>
							
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
								getPro();
								
							?>
							<?php getcatPro(); ?>
							<?php getbrandPro(); ?>
						
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