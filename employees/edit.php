    <!-- Update Employee -->
<?php
include('config.php');
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    
    $sql = "UPDATE employees SET first_name = :first_name, last_name = :last_name, phone_no = :phone_no, email = :email WHERE id = :id";
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':phone_no', $phone_no);
    $stmt->bindParam(':email', $email);
    
    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        echo "Error updating employee.";
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
}
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

    <title>Edit Employee</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Edit Employee</div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?= $employee['id'] ?>">
                    
                    <div class="form-group">
                    <label for="exampleInputEmail">Firstname:</label>
                    <input class="form-control" type="text" name="first_name" value="<?= $employee['first_name'] ?>" required>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail">Lastname:</label>
                    <input class="form-control" type="text" name="last_name" value="<?= $employee['last_name'] ?>" required>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail">Phone Number:</label>
                    <input class="form-control" type="text" name="phone_no" value="<?= $employee['phone_no'] ?>" required>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail">Email:</label>
                    <input class="form-control" type="email" name="email" value="<?= $employee['email'] ?>" required>
                    </div>
                    <br>

                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
