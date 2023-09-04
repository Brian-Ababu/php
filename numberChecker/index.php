<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Checker</title>
</head>
<body>
    <h2>Enter any number here...</h2>
    <form method="post">
        <input type="number" name="number" id="number" required min="0">
        <input type="submit" value="check" name="check">
    </form>

    <?php 
        if(isset($_POST['check'])){
            $number = $_POST['number'];
                    
            // Check if the number is even or odd
            if ($number % 2 == 0) {
                echo "$number is even.";
                if($number == 2){
                    echo "$number is also prime.";
                }
            } else {
                echo "$number is odd.";

                // Check if the number is prime
                $isPrime = true;
                for ($i = 2; $i <= sqrt($number); $i++) {
                    if ($number % $i == 0) {
                        $isPrime = false;
                        break;
                    }
                }

                if ($isPrime) {
                    echo " It is also prime.";
                } else {
                    echo " It is not prime.";
                }
            }
        }  
    ?>
</body>
</html>