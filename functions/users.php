<?php

require_once "../functions/DB.php";

function createUser($name,$email,$password)
{
    $hashed_password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sql = "INSERT INTO users SET name=?, email=?, password=?, created_at=now()";
     global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name,$email,$hashed_password]);
}

function checkUniqueUser($email){
    $sql = "SELECT * FROM users WHERE email=?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    return  $stmt->fetch();

}

function checkPassword($password){
    if(strlen($password) < 6){
        return false;
    }
    return true;
}
