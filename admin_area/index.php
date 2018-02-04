<?php
	session_start();
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php?not_admin=you are not admin','_self');</script>";
	}
	else{
			
	
?>


<!DOCTYPE>
<html>
<head>
	<title>This Admin Panel</title>
	<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>

	<div class="main_wrapper">
	
		<div id="header"></div>
		
		
		<div id="right">
		
			<h2 style="text-align:center;">Manage Content</h2>
			<a href="index.php?insert_product">Insert New product</a>
			<a href="index.php?veiw_product">Veiw All product</a>
			<a href="index.php?insert_cats">Insert New Category</a>
			<a href="index.php?veiw_cats">Veiw All Category</a>
			<a href="index.php?insert_brands">insert New Brand</a>
			<a href="index.php?veiw_brands">Veiw New Brand</a>
			<a href="index.php?veiw_customers">Veiw Customers</a>
			<a href="index.php?veiw_orders">Veiw orders</a>
			<a href="index.php?veiw_payments">Veiw Payments</a>
			<a href="logout.php">Admin Logout</a>
		</div>
		
		
		
		<div id="left">
		<br><br>
		<h2 style="color:red;text-align:center;"><?php echo @$_GET['logged_in']?></h2>
		
		<?php
			if(isset($_GET['insert_product'])){
				
				include("insert_product.php");
			}
			if(isset($_GET['veiw_product'])){
				
				include("veiw_products.php");
			}
			if(isset($_GET['edit_pro'])){
				
				include("edit_pro.php");
			}
			if(isset($_GET['insert_cats'])){
				
				include("insert_cat.php");
			}
			if(isset($_GET['veiw_cats'])){
				
				include("veiw_cats.php");
			}
			if(isset($_GET['edit_cat'])){
				
				include("edit_cat.php");
			}
			if(isset($_GET['insert_brands'])){
				
				include("insert_brand.php");
			}
			if(isset($_GET['veiw_brands'])){
				
				include("veiw_brands.php");
			}
			if(isset($_GET['edit_brand'])){
				
				include("edit_brand.php");
			}
			if(isset($_GET['veiw_customers'])){
				
				include("veiw_customers.php");
			}
		?>
		
		</div>
	
	</div>

</body>
</html>

	<?php } ?>