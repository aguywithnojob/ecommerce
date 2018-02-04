<?php 
if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php?not_admin=you are not admin','_self');</script>";
	}
	else{
?>

<table width="795" align="center" bgcolor="pink">
	
		<tr align="center">
			<td colspan="6">Veiw All Products</td>
		</tr>
		<tr align="center" bgcolor="skyblue">
			<th>S.NO</th>
			<th>Title</th>
			<th>Image</th>
			<th>Price</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<tr>
		
		<?php
		
		include("includes/db.php");
		
		$get_pro="select * from products";
		$run_pro=mysqli_query($con,$get_pro);
		
		$i=0;
		while($row_pro=mysqli_fetch_array($run_pro)){
				$pro_id=$row_pro['product_id'];
				$pro_title=$row_pro['product_title'];
				$pro_image=$row_pro['product_image'];
				$pro_price=$row_pro['product_price'];
				$i++;
			
			
		
		?>`
			<td align="center"><b><?php echo $i; ?></b></td>
			<td align="center"><b><?php echo $pro_title; ?></b></td>
			<td align="center"><img src="product_images/<?php echo $pro_image; ?>" width="50" height="50"/></td>
			<td align="center"><b>$<?php echo $pro_price; ?></b></td>
			<td align="center"><b><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></b></td>
			<td align="center"><b><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></b></td>
		
		</tr>
		<?php } ?>
	
</table>

	<?php } ?>