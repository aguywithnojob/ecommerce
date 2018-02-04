<?php

	include("includes/db.php");
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php?not_admin=you are not admin','_self');</script>";
	}
	else{
	if(isset($_GET['delete_c'])){
		$delete_id=$_GET['delete_c'];
		
		$delete_c = "delete from customers where customer_id='$delete_id'";
		
		$run_delete=mysqli_query($con,$delete_c);
		if($run_delete){
			
				echo"<script>alert('customer deleted ');</script>";
				echo"<script>window.open('index.php?veiw_customers','_self');</script>";
		}
		
	
	}
	}
?>