<?php
	require_once "../../functions/users.php";
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		deleteUser($id);
		header("location: index.php");
	}
