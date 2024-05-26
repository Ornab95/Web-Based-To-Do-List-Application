<!DOCTYPE html>
<html>
<head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
  }

  h2 {
    text-align: center;
  }

  table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
  }

  th, td {
    padding: 10px;
    text-align: center;
  }

  th {
    background-color: #007bff;
    color: #fff;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #ddd;
  }

  input[type="text"],
  input[type="submit"] {
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
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
<?php
$con = mysqli_connect("localhost", "root", "", "task_management");
echo "<h2>Display Task List</h2>";

$sql = "SELECT * FROM tasks";
if (!empty($searchTerm)) {
    $sql .= " WHERE task_name LIKE '%$searchTerm%'";
}

$res = mysqli_query($con, $sql);
?>
<table border="1">
  <tr>
    <th>Date</th>
    <th>Task</th>
    <th>Time</th>
    <th colspan="2">Action</th>
  </tr>
  <?php
  while ($row = mysqli_fetch_assoc($res)) {
      ?>
    <tr>
      <td><?php echo $row["date"]; ?></td>
      <td><?php echo $row["task_name"]; ?></td>
      <td><?php echo $row["time"]; ?></td>
      <td> <a href="update.php">Update</a> </td>
      <td><a href="delete.php"> Delete </a></td>
    </tr>
    <?php
  }
  ?>
</table>
</body>
</html>

