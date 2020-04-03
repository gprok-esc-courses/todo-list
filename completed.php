<h1>Completed Tasks</h1>

<?php
require_once("database.php");

$sql = "SELECT * FROM tasks WHERE completed=1";
$result = $conn->query($sql, PDO::FETCH_ASSOC);

echo "<ol>";
foreach ($result as $row) {
    echo "<li>" . $row['name'] .
        " <a href='undo_task.php?id=" . $row['id'] . "'>Undo</a> <a href='delete_task.php?id=" . $row['id'] . "'>X</a></li>";
}
echo "</ol>";
