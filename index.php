<?php
require_once ("check_user.php");
require_once ("page_head.php");
require_once("database.php");
require_once ("task.php");

$tasks = Task::find_completed($user_id);
?>

<div class="jumbotron">
    <h1 class="display-4">Tasks of <?php echo $user_name; ?></h1>
    <hr class="my-4">
    <form class="lead" method="post" action="add_task.php">
        New Task: <input type="text" name="task"> <input type="submit">
    </form>
</div>

<ol>
<?php foreach ($tasks as $task) { ?>
    <li> <?=$task->name;?>
    <a href='complete_task.php?id=<?=$task-id;?>'><i class='fas fa-check'></i></a>
    <a href='delete_task.php?id=<?=$task-id;?>'><i class='far fa-trash-alt'></i></a>
    </li>
<?php } ?>
</ol>

<?php
require_once("page_footer.php");
?>
