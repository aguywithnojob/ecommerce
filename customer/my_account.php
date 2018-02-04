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
			
				<a href="../index.php"><img id="logo" src="images/text.png"  alt="logo"/></a>
					
			</div>
			
			<!-- header ends here --->
			
			
			<!--navbar starts here -->
				<div class="menubar">
			
			
					<ul id="menu">
						<li><a href="../index.php">Home</a></li>
						<li><a href="../all_products.php">All Products</a></li>
						<li><a href="my_account.php">My Account</a></li>
						<li><a href="../customer_register.php">Sign up</a></li>
						<li><a href="../cart.php">Shopping cart</a></li>
						<li><a href="../contact_us.php">Contact us</a></li>
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
						<div id="sidebar_title">My Account:</div>
						<ul id="cats">
							<?php
								$user=$_SESSION['customer_email'];
								
								$get_img="select * from customers where customer_email='$user'";
								
								$run_img=mysqli_query($con,$get_img);
								
								$row_img = mysqli_fetch_array($run_img);
								
								$c_image = $row_img['customer_image'];
								
								$c_name= $row_img['customer_name'];
								echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150px' height='150px'/> </p>";
							?>
							<li><a href="my_account.php?my_orders">My Order</a></li>
							<li><a href="my_account.php?edit_account">Edit Account</a></li>
							<li><a href="my_account.php?change_pass">Change Password</a></li>
							<li><a href="my_account.php?delete_account">Delete Account</a></li>
							<li><a href="logout.php">Logout</a></li>
							
						</ul>
						
					
					</div>
				
				<!--- content area starts here -->
					<div id="content_area">
					
						<?php cart(); ?>
					
						<div id="shopping_cart">
							
							<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
							<?php
								if(isset($_SESSION['customer_email'])){
										echo"<b>Welcome:</b>".$_SESSION['customer_email'];
								}
								
							?>
							
							
							
							
							
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
							if(!isset($_GET['my_orders'])){
								if(!isset($_GET['edit_account'])){
									if(!isset($_GET['change_pass'])){
										if(!isset($_GET['delete_account'])){
											
											
											echo"
											<h2 style='padding:20px; text-align:center;'>Welcome:$c_name</h2><br>
											<b>You can see your order progress click this <a href='my_account.php?my_orders'>link</a></b>";
										}
									}
								}
							}
						?>
						<?php
							if(isset($_GET['edit_account'])){
								include("edit_account.php");
							}
							if(isset($_GET['change_pass'])){
								include("change_pass.php");
							}
							if(isset($_GET['delete_account'])){
								include("delete_account.php");
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