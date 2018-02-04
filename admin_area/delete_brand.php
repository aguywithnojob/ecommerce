<?php

	include("includes/db.php");
	if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php?not_admin=you are not admin','_self');</script>";
	}
	else{
	if(isset($_GET['delete_brand'])){
		$delete_id=$_GET['delete_brand'];
		
		$delete_brand = "delete from brands where brand_id='$delete_id'";
		
		$run_delete=mysqli_query($con,$delete_brand);
		if($run_delete){
			
				echo"<script>alert('brand deleted ');</script>";
				echo"<script>window.open('index.php?veiw_brands','_self');</script>";
		}
		
	
	}
	}

?>