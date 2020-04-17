<?php
require_once ('database.php');

class Task {
    var $id;
    var $name;
    var $completed;
    var $user_id;

    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->completed = $args['completed'] ?? '';
        $this->user_id = $args['user_id'] ?? '';
    }

    public static function find_completed($uid)
    {
        global $conn;
        $tasks = [];

        $sql = "SELECT * FROM tasks WHERE completed=0 AND user_id=$uid";
        $result = $conn->query($sql, PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            $task = new Task(['id' => $row['id'],
                              'name' => $row['name'],
                              'completed' => $row['completed'],
                              'user_id' => $row['user_id'] ]);
            $tasks[] = $task;
        }

        return $tasks;
    }
}
