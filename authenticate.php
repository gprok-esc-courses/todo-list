<?php
session_start();
require_once("database.php");

$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM users WHERE username='$username' AND password=MD5('$password')";

$result = $conn->query($sql, PDO::FETCH_ASSOC);

if($result->rowCount() > 0) {
    // user found
    $row = $result->fetch();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['username'];
    header("Location: index.php");

}
else {
    // user not found
    header("Location: login.php");
}
