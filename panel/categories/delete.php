<?php
	require_once "../../functions/categories.php";
	
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		deleteCategory($id);
		header("location: index.php");
	}
