<?php

if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php?not_admin=you are not admin','_self');</script>";
	}
	else{
?>

<table width="795" align="center" bgcolor="pink">
	
		<tr align="center">
			<td colspan="6"><b>Veiw All Customers</b></td>
		</tr>
		<tr align="center" bgcolor="skyblue">
			<th>S.NO</th>
			<th>Name</th>
			<th>Email</th>
			<th>Image</th>
			<th>Delete</th>
		</tr>
		<tr>
		
		<?php
		
		include("includes/db.php");
		
		$get_c="select * from customers";
		$run_c=mysqli_query($con,$get_c);
		
		$i=0;
		while($row_c=mysqli_fetch_array($run_c)){
				$c_id=$row_c['customer_id'];
				$c_name=$row_c['customer_name'];
				$c_image=$row_c['customer_image'];
				
				$c_email=$row_c['customer_email'];
				$i++;
			
			
		
		?>`
			<td align="center"><b><?php echo $i; ?></b></td>
			<td align="center"><b><?php echo $c_name; ?></b></td>
			<td align="center"><b><?php echo $c_email; ?></b></td>
			<td align="center"><img src="../customer/customer_images/<?php echo $c_image; ?>" width="50" height="50"/></td>
			
		
			
			<td align="center"><b><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></b></td>
		
		</tr>
		<?php } ?>
	
</table>

	<?php } ?>