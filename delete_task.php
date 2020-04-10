<?php
require_once ("check_user.php");
require_once ("database.php");

$id =$_GET['id'];

$sql = "DELETE FROM tasks WHERE id=$id AND user_id=$user_id";
$conn->exec($sql);

header("Location: index.php");
die();