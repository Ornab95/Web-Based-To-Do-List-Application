<!DOCTYPE html>
<html>
<head>
    <title>Delete Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        form {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #ff4c4c;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #d82c2c;
        }
    </style>
</head>
<body>
<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "task_management");

// Initialize variables
$task_name = "";

// Handle form submission for deleting the task
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST["task_name"];
    
    // Delete the task from the database by task name
    $delete_sql = "DELETE FROM tasks WHERE task_name = '$task_name'";
    
    if (mysqli_query($con, $delete_sql)) {
        echo "Task deleted successfully!";
    } else {
        echo "Error deleting task: " . mysqli_error($con);
    }
}
?>
<form method="post">
    <label for="task_name">Task Name:</label>
    <input type="text" name="task_name" placeholder="Enter Task Name"><br>
    
    <input type="submit" value="Delete Task">
</form>
</body>
</html>
