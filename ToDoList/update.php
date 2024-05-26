<!DOCTYPE html>
<html>
<head>
    <title>Update Task</title>
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
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "task_management");

// Initialize variables for task details
$task_name = "";
$date = "";
$time = "";

// Check if the task name is provided in the query string
if (isset($_GET['name'])) {
    $task_name = $_GET['name'];
    
    // Retrieve the task details from the database
    $sql = "SELECT * FROM tasks WHERE task_name = '$task_name'";
    $result = mysqli_query($con, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $date = $row["date"];
        $time = $row["time"];
    } else {
        echo "Task not found.";
        exit;
    }
}

// Handle form submission for updating the task
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_date = $_POST["new_date"];
    $new_time = $_POST["new_time"];
    
    // Update the task in the database
    $update_sql = "UPDATE tasks SET date = '$new_date', time = '$new_time' WHERE task_name = '$task_name'";
    
    if (mysqli_query($con, $update_sql)) {
        echo "Task updated successfully!";
        $date = $new_date;
        $time = $new_time;
    } else {
        echo "Error updating task: " . mysqli_error($con);
    }
}
?>
  <h1 align="center"> Update Task </h1>
<form method="post">
    <label for="task_name">Task Name:</label>
    <input type="text" name="task_name" value="<?php echo $task_name; ?>" readonly><br>
    
    <label for="new_date">New Date:</label>
    <input type="text" name="new_date" value="<?php echo $date; ?>"><br>
    
    <label for="new_time">New Time:</label>
    <input type="text" name="new_time" value="<?php echo $time; ?>"><br>
    
    <input type="submit" value="Update Task">
</form>
</body>
</html>
