<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calc</title>
</head>
<body>
    <h2>Calculator</h2>
    <form method="post"> 
        <label for="num1">Number 1:<label>
        <input type="number" name="num1" id="num1" required>
        <label for="num2">Number 2:<label>
        <input type="number" name="num2" id="num1" required>

        <input type="submit" value="calculate" name="calculate">

    </form> 

    <?php 
        if(isset($_POST['calculate'])){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];

            $result = $num1 + $num2;
        }
    ?>

    <h2>Result<h2>
    <input type='number' value="<?php echo $result; ?>" readonly>    
</body>
</html>


<?php
// $num1 = 10.57;
// $num2 = 11.75;

// $result = $num1 + $num2;

// //print ( $result); 

// echo "The sum is $result";
// ?>