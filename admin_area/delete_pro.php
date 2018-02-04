<?php

	include("includes/db.php");
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php?not_admin=you are not admin','_self');</script>";
	}
	else{
	if(isset($_GET['delete_pro'])){
		$delete_id=$_GET['delete_pro'];
		
		$delete_pro = "delete from products where product_id='$delete_id'";
		
		$run_delete=mysqli_query($con,$delete_pro);
		if($run_delete){
			
				echo"<script>alert('Product deleted ');</script>";
				echo"<script>window.open('index.php?veiw_product','_self');</script>";
		}
		
	
	}
	}

?>