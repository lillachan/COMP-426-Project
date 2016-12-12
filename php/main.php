<?php
	$method =$_SERVER['REQUEST_METHOD'];
	$path_components = explode('/', $_SERVER['PATH_INFO']);

	if ($method == "GET"){
	
	}
	else if ($method == "POST"){

	}
	header("HTTP/1.0 400 Bad Request");
	print("Did not understand URL");
?>