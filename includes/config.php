<?php 
	//----------------------------------------------------------------------------------//	
	//                               COMPULSORY SETTINGS
	//----------------------------------------------------------------------------------//
	
	/*  Set the URL to your Sendy installation (without the trailing slash) */
	define('APP_PATH', 'http://php-lb-151833250.us-west-2.elb.amazonaws.com');
	
	/*  MySQL database connection credentials (please place values between the apostrophes) */
	$dbHost = 'mydbinstance.clisimvndspr.us-west-2.rds.amazonaws.com:3306'; //MySQL Hostname
	$dbUser = 'awsuser'; //MySQL Username
	$dbPass = 'mypassword'; //MySQL Password
	$dbName = 'sendy'; //MySQL Database Name
	
	
	//----------------------------------------------------------------------------------//	
	//								  OPTIONAL SETTINGS
	//----------------------------------------------------------------------------------//	
	
	/* 
		Change the database character set to something that supports the language you'll
		be using. Example, set this to utf16 if you use Chinese or Vietnamese characters
	*/
	$charset = 'utf8';
	
	/*  Set this if you use a non standard MySQL port.  */
	$dbPort = 3306;	
	
	/*  Domain of cookie (99.99% chance you don't need to edit this at all)  */
	define('COOKIE_DOMAIN', '');
	
	//----------------------------------------------------------------------------------//
?>
