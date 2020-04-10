<?php
require_once ("check_user.php");
require_once ("page_head.php");
?>

<div class="jumbotron">
    <h1 class="display-4">Tasks of <?php echo $user_name; ?></h1>
    <hr class="my-4">
    <form class="lead" method="post" action="add_task.php">
        New Task: <input type="text" name="task"> <input type="submit">
    </form>
</div>

<?php
require_once("database.php");

$sql = "SELECT * FROM tasks WHERE completed=0 AND user_id=$user_id";
$result = $conn->query($sql, PDO::FETCH_ASSOC);

echo "<ol>";
foreach ($result as $row) {
    echo "<li>" . $row['name'] .
        " <a href='complete_task.php?id=" . $row['id'] . "'><i class=\"fas fa-check\"></i></a> <a href='delete_task.php?id=" . $row['id'] . "'><i class='far fa-trash-alt'></i></a></li>";
}
echo "</ol>";
?>

<?php
require_once("page_footer.php");
?>
