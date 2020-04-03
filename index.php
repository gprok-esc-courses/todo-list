<h1>My Tasks</h1>

<form method="post" action="add_task.php">
    New Task: <input type="text" name="task"> <input type="submit">
</form>

<?php
require_once("database.php");

$sql = "SELECT * FROM tasks WHERE completed=0";
$result = $conn->query($sql, PDO::FETCH_ASSOC);

echo "<ol>";
foreach ($result as $row) {
    echo "<li>" . $row['name'] .
        " <a href='complete_task.php?id=" . $row['id'] . "'>OK</a> <a href='delete_task.php?id=" . $row['id'] . "'>X</a></li>";
}
echo "</ol>";

