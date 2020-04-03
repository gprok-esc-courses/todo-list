<?php

require_once ("database.php");

$id =$_GET['id'];

$sql = "DELETE FROM tasks WHERE id=$id";
$conn->exec($sql);

header("Location: index.php");
die();