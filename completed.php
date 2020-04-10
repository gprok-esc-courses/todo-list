<?php
require_once ("check_user.php");
require_once ("page_head.php");
?>

<div class="jumbotron">
    <h1 class="display-4">Completed Tasks</h1>
    <hr class="my-4">
</div>
<?php
require_once("database.php");

$sql = "SELECT * FROM tasks WHERE completed=1 AND user_id=$user_id";
$result = $conn->query($sql, PDO::FETCH_ASSOC);

echo "<ol>";
foreach ($result as $row) {
    echo "<li>" . $row['name'] .
        " <a href='undo_task.php?id=" . $row['id'] . "'><i class='fas fa-undo-alt'></i></a> <a href='delete_task.php?id=" . $row['id'] . "'><i class='far fa-trash-alt'></i></a></li>";
}
echo "</ol>";
?>

<?php
require_once("page_footer.php");
?>