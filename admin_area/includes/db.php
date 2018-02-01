<?php
	$con = mysqli_connect("localhost","root","","ecommerce");
	if(mysqli_connect_errno())
	{
		echo "FAILED TO CONNECT TO MYSQL:".mysqli_connect_errno();
	}

?>