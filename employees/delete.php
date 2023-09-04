<!-- remove employee -->
<?php
include('config.php');
 
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM employees WHERE id = :id";
    
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    
    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        echo "Error deleting employee.";
    }
}
?>
