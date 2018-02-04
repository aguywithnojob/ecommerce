<?php
session_start();
	
	
	include("includes/db.php");

?>

<!DOCTYPE html>
<html>
<head>
<style>
body{
 background : #48BCE2;
}
.form
{
  background-color: #0c80a6;
  font-size : 30pt;
  color : red;
  margin : 0 20%; 
  padding : 40px;
  font-family : "Times New Roman",serif;
  font-style: italic;
  
}


.form input[type="text"]
{ 
 font-size: 20pt;
 width : 500pt;
 height: 30pt;
 color : red;
 margin-bottom: 20px; 
 } 
.form input[type="password"]
{ 
 font-size: 20pt;
 width : 500pt;
 height: 30pt;
 color : red;
 } 
 
 .form a{
 font-size: 20pt;
 color: white;
 
 }

h1{
	margin: 50px 20% 0px ;
	padding:40px 50px 50px;
	font-size: 40pt;
	cursor : default;
	color: white;
	background-color:#2094ba;
	font-family : 'Lily Script One', cursive;
}

.form input[type="submit"]
{
	cursor: pointer;
  height : 40pt;
  border : none;
  width  : 90pt;
  font-style : oblique;
  font-size: 25pt;
  font-family: serif;
  background: lightgreen;
  color : white;
}
 
 .form input[type="submit"]:hover{
	background-color:green;
 }
</style>
<title>
 admin login 
</title>
</head>
<body>
	<h2 style="color:white;text-align:center;"><?php echo @$_GET['not_admin'];?></h2>
	<h2 style="color:white;text-align:center;"><?php echo @$_GET['logged_out'];?></h2>
<h1>Admin Login</h1>
<form class="form" method="post" action="login.php">
<input type="text" name="email" placeholder="email" autofocus required="required"/><br>
<input type="password" name="password" placeholder="password" required="required"/><br></br>
<input type="submit" name="login" value="login"> 


</form>

</body>

</html>
<?php
	if(isset($_POST['login'])){
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$pass=mysqli_real_escape_string($con,$_POST['password']);
		
		$sel_user="select * from admins where user_email='$email' AND user_pass='$pass'";
		
		$run_user=mysqli_query($con,$sel_user);
		
		$check_user=mysqli_num_rows($run_user);
		
		if($check_user==0){
			echo"<script>alert('Password or Email is incorrect!!');</script>";
		}
		else{
			$_SESSION['user_email']=$email;
			echo"<script>window.open('index.php?logged_in=you are logged in','_self');</script>";
		}
		
	}

?>
