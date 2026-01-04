<?php
require_once "../../functions/articles.php" ;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteArticle($id);
    header('location: index.php');
}