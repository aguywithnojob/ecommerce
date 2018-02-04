<?php 
if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php?not_admin=you are not admin','_self');</script>";
	}
	else{
?>

<table width="795" align="center" bgcolor="pink">
	
		<tr align="center">
			<td colspan="6"><b>Veiw All Categories</b></td>
		</tr>
		<tr align="center" bgcolor="skyblue">
			<th>Category Id</th>
			<th>Category Title</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		
		
		<?php
		
		include("includes/db.php");
		
		$get_cat="select * from categories";
		$run_cat=mysqli_query($con,$get_cat);
		
		$i=0;
		while($row_cat=mysqli_fetch_array($run_cat)){
				$cat_id=$row_cat['cat_id'];
				$cat_title=$row_cat['cat_title'];
				
				$i++;
			
			
		
		?>`
			<tr>
			<td align="center"><b><?php echo $i; ?></b></td>
			<td align="center"><b><?php echo $cat_title; ?></b></td>
			<td align="center"><b><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></b></td>
			<td align="center"><b><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></b></td>
		
		</tr>
		<?php } ?>
	
</table>

	<?php } ?>