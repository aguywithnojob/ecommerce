<?php
if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php?not_admin=you are not admin','_self');</script>";
	}
	else{
 
?>

<table width="795" align="center" bgcolor="pink">
	
		<tr align="center">
			<td colspan="6"><b>Veiw All Brands</b></td>
		</tr>
		<tr align="center" bgcolor="skyblue">
			<th>Brand Id</th>
			<th>Brand Title</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		
		
		<?php
		
		include("includes/db.php");
		
		$get_brand="select * from brands";
		$run_brand=mysqli_query($con,$get_brand);
		
		$i=0;
		while($row_brand=mysqli_fetch_array($run_brand)){
				$brand_id=$row_brand['brand_id'];
				$brand_title=$row_brand['brand_title'];
				
				$i++;
			
			
		
		?>`
			<tr>
			<td align="center"><b><?php echo $i; ?></b></td>
			<td align="center"><b><?php echo $brand_title; ?></b></td>
			<td align="center"><b><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></b></td>
			<td align="center"><b><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></b></td>
		
		</tr>
		<?php } ?>
	
</table>

	<?php } ?>