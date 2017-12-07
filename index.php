<?php 
	use Shares\Bootstrap;
	require 'vendor/autoload.php';

	$bootstrap = new Bootstrap($_GET);
	$bootstrap->createController();