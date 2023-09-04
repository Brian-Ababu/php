<!-- addEmployee -->
<?php
include('config.php');
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO employees (first_name, last_name, phone_no, email) VALUES (:first_name, :last_name, :phone_no, :email)";
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':phone_no', $phone_no);
    $stmt->bindParam(':email', $email);
    
    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        echo "Error creating employee.";
    }
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

    <title>Create Employee</title>
</head>
<body class="bg-black">
    <div class="container">
        <div class="card mx-auto mt-5">
        <div class="card-header">Create Employee</div>
            <div class="card-body">
            <form method="POST" action="">

                <div class="form-group">
                <label for="exampleInputEmail">Firstname:</label>
                <input class="form-control" type="text" name="first_name" required>
                </div>

                <div class="form-group">
                <label for="exampleInputEmail">Lastname:</label>
                <input class="form-control" type="text" name="last_name" required>
                </div>

                <div>
                <label for="exampleInputEmail">Phone Number:</label>
                <input class="form-control" type="text" name="phone_no" required>
                </div>

                <div>
                <label for="exampleInputEmail">Email:</label>
                <input class="form-control" type="email" name="email" required>
                </div>
                <br>
                <button class="btn btn-outline-success" type="submit">Create</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
