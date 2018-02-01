
	<h2 style="text-align:center;">Change Password:</h2>
<form action="" method="post" >
	<table align="center" width="600">
	<tr>
	<td align="right"><b>Current Password:</b><input type="password" name="current_pass" required /></td>
	</tr>
	<tr>
	<td align="right"><b>New Password:</b><input type="password" name="new_pass" required/></td>
	</tr>
	<tr>
	<td align="right"><b>Conform Password:</b><input type="password" name="new_pass_again" required /></td>
	</tr>
	<tr align="right">
	<td colspan="12"><input type="submit" name="change_pass" value="Change Password"/></td>
	</tr>
	</table>
</form>


<?php

	
	include("includes/db.php");
	if(isset($_POST['change_pass'])){
		
		$user=$_SESSION['customer_email'];
		$current_pass=$_POST['current_pass'];
		$new_pass=$_POST['new_pass'];
		$new_pass_again=$_POST['new_pass_again'];
		
		
		$sel_pass="select * from customers where customer_pass='$current_pass' AND customer_email='$user'";
		$run_pass=mysqli_query($con,$sel_pass);
		$check_pass=mysqli_fetch_array($run_pass);
		
		if($check_pass==0){
			echo"<script>alert('Your Current Password is Worng..');</script>";
			exit();
		}
		if($new_pass!=$new_pass_again){
			echo"<script>alert('New Password do not match');</script>";
			exit();
		}
		else{
			$update_pass="update customers set customer_pass='$new_pass'";
			$run_update=mysqli_query($con,$update_pass);
			
			echo"<script>alert('Password Updated..');</script>";
			echo"<script>window.open('my_account.php','_self');</script>";
		}
	}
?>