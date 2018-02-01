<br>
<h2 style="text-align:center; color:blue;">Do You really want to delete account?</h2>
<form action="" method="post" style="text-align:center">
	<br>
	<input type="submit" name="yes" value="Yes"/>
	<input type="submit" name="no" value="No"/>
	
</form>

<?php
	include("includes/db.php");
	
	$user=$_SESSION['customer_email'];
	
	if(isset($_POST['yes'])){
		
		$delete_customer="delete from customers where customer_email='$user'";
		$run_customer=mysqli_query($con,$delete_customer);
		
		echo"<script>alert('Your Has been deleted');</script>";
		echo"<script>window.open('../index.php','_self');</script>";
		session_destroy();
		
	}
	if(isset($_POST['no'])){
		
		
		echo"<script>window.open('my_account.php','_self');</script>";
	}

?>