<?php
require_once ("check_user.php");
require_once("database.php");

$task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);

$sql = "INSERT INTO tasks (name, user_id) VALUES ('$task', $user_id)";
$conn->exec($sql);

header("Location: index.php");
die();


// $task = new Task(['name] => $task, 'user_id' => $user_id]);
// $task->save();
