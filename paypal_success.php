<?php
session_start();
?>

<html>
	<head>
		<title>Payment Success</title>
	</head>
	<body>
	
		<h2>Welcome<?php echo $_SESSION['customer_email']; ?></h2>
		<h3>Your Payment was successful,please go to your account.</h3>
		<h3><a href="http://www.onlinetuting.com/myshop/customer/my_account.php">Go to your account</a></h3>
	</body>
</html>