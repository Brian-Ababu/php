<?php
include('config.php');
 
$sql = "SELECT * FROM employees";
$result = $db->query($sql);
$employees = $result->fetchAll(PDO::FETCH_ASSOC);
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, intial scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!-- Optional: Add Bootstrap JavaScript and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Employees</title>

</head>
<body class="bg-dark">
    <div class="container">
     <div class="text-center mx-auto mt-5">
      <div>     
        <h2 class="text-white">Employee List</h2>
      </div>
    <table class="table table-success table-hover table-stripped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <?php foreach ($employees as $employee): ?>
            <tbody>
            <tr>
                <td><?= $employee['id'] ?></td>
                <td><?= $employee['first_name'] ?></td>
                <td><?= $employee['last_name'] ?></td>
                <td><?= $employee['phone_no'] ?></td>
                <td><?= $employee['email'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $employee['id'] ?>">
                        <button class="btn btn-success btn-block">Edit</button>
                    </a>
                    <a href="delete.php?id=<?= $employee['id'] ?>">
                    <button class="btn btn-danger btn-block" >Delete</button>                        
                    </a>
                </td>
            </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
     </div>
    <a href="create.php"> 
    <button type="submit" class="btn btn-outline-primary">Add Employee</button>
    </a>
    </div>
</body>
</html>
