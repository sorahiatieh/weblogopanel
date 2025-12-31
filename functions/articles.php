<?php

require_once "DB.php";
require_once "helpers.php";

function createArticle($title,$body,$user_id,$category_id,$status,$image)
{
	$new_image=uploadImage($image);
    $sql = "INSERT INTO articles SET title=?, body=?, user_id=?, category_id=?, status=?, image=?, created_at=now()";
     global $conn;
    $stmt = $conn->prepare($sql);
	$stmt->execute([$title, $body, $user_id, $category_id, $status, $new_image]);
}
	
function getArticles($id){
	$sql = "SELECT * FROM articles WHERE id=?";
	global $conn;
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);
	return  $stmt->fetch();
	
}

function getAllArticles(){
	$sql="SELECT * FROM articles";
	global $conn;
	$stmt=$conn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
}

function updateArticle($id,$title,$body,$category_id,$status,$image){
	$article = getArticles($id);
	
	if(isset($image) && !empty($image['name'])){
		uploadImage($image);
		$image=$image['name'];
	}else{
		$image=$article->image;
	}
	
	$sql = "UPDATE articles SET title=?, body=?,category_id=?, status=?, image=?, created_at=now() WHERE id=?";
	global $conn;
	$stmt = $conn->prepare($sql);
	$stmt->execute([$title, $body, $category_id, $status, $image, $id]);
}

function deleteArticle($id){
	$sql = "DELETE FROM articles WHERE id=?";
	global $conn;
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);
}
