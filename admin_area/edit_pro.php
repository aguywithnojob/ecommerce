<!DOCTYPE>
<?php
include("includes/db.php");
if(!isset($_SESSION['user_email'])){
		echo"<script>window.open('login.php?not_admin=you are not admin','_self');</script>";
	}
	else{
if(isset($_GET['edit_pro'])){
	$get_id=$_GET['edit_pro'];
	$get_pro="select * from products where product_id='$get_id'";
		$run_pro=mysqli_query($con,$get_pro);
		
		$row_pro=mysqli_fetch_array($run_pro);
		
				$pro_id=$row_pro['product_id'];
				$pro_title=$row_pro['product_title'];
				$pro_image=$row_pro['product_image'];
				$pro_price=$row_pro['product_price'];
				$pro_desc=$row_pro['product_desc'];
				$pro_keywords=$row_pro['product_keyword'];
				$pro_cat=$row_pro['product_cat'];
				$pro_brand=$row_pro['product_brand'];
				
				$get_cat="select * from categories where cat_id='$pro_cat'";
				$run_cat=mysqli_query($con,$get_cat);
				$row_cat=mysqli_fetch_array($run_cat);
				$category_title = $row_cat['cat_title'];
				
}				$get_brand="select * from brands where brand_id='$pro_brand'";
				$run_brand=mysqli_query($con,$get_brand);
				$row_brand=mysqli_fetch_array($run_brand);
				$brand_title = $row_brand['brand_title'];
?>


<html>
	<head>
		<title>Update Products</title>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>
	</head>
	<body bgcolor="skyblue">
	
		<form  method="post" enctype="multipart/form-data">
			<table align="center" width="795" border="2" bgcolor="#187eae">
			`	<tr align="center">
					<td colspan="8"><h2>Edit & Update Product</h2></td>
				</tr>
				
				<tr>
					<td align="right"><b>product title:</b></td>
					<td><input type="text" name="product_title" size="60"  value="<?php echo $pro_title;?>" required/></td>
				</tr>
				
				<tr>
					<td align="right"><b>product category:</b></td>
					<td>
					<select name="product_cat" required>
						<option><?php echo $category_title;?></option>
						<?php 
							$get_cats = "SELECT * FROM categories ";
							$run_cats = mysqli_query($con,$get_cats);
							while($row_cats = mysqli_fetch_array($run_cats))
							{
								$cat_id = $row_cats['cat_id'];
								$cat_title = $row_cats['cat_title'];
								echo"<option value='$cat_id'>$cat_title</option>";
							}
						?>
					</select>
					
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>product brand:</b></td>
					<td>
					<select name="product_brand" required>
						<option><?php echo $brand_title;?></option>
					<?php
								$get_brands = "SELECT * FROM brands where ";
								$run_brands = mysqli_query($con,$get_brands);
								while($row_brands = mysqli_fetch_array($run_brands))
								{
									$brands_id = $row_brands['brand_id'];
									$brands_title = $row_brands['brand_title'];
									echo"<option value='$brands_id'>$brands_title</option>";
								}
					?>
					</select>
					</td>
				</tr>
				
				
				<tr>
					<td align="right"><b>product image:</b></td>
					<td><input type="file" name="product_image"  required/><img src="product_images/<?php echo $pro_image;?>" width="100" height="100"/></td>
				</tr>
				
				<tr>
					<td align="right"><b>product price:</b></td>
					<td><input type="text" name="product_price" value="<?php echo $pro_price;?>" required/></td>
				</tr>
				
				
				<tr>
					<td align="right"><b>product description:</b></td>
					<td><textarea name="product_desc" col="20" rows="10"><?php echo $pro_desc;?></textarea></td>
				</tr>
				
				<tr>
					<td align="right"><b>product keywords:</b></td>
					<td><input type="text" name="product_keywords" size="60" value="<?php echo $pro_keywords;?>" required/></td>
				</tr>
				
		
				
				
				<tr align="center">
					
					<td colspan="7"><input type="submit" name="update_post" value="Update now"/></td>
				</tr>
			</table>
		</form>
	
	</body>
</html>

<?php
	if(isset($_POST['update_post'])){
		
		$get_id=$pro_id;
		//getting text data from feild
		$product_title = $_POST['product_title'];
		echo $product_cat = $_POST['product_cat'];
		echo $product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		
		//getting image from feild
		$product_image= $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		$update_product= "update products set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keyword='$product_keywords' where product_id='$get_id'";
		$update_pro = mysqli_query($con,$update_product);
		if($update_pro){
			echo "<script>alert('product has been updated')</script>";
			echo "<script>window.open('index.php?veiw_product','_self')</script>";
		}
		
	}


?>


	<?php } ?>