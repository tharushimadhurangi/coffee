<?php
// Database connection
$servername = "localhost";
$username = "root"; 
$password = "PASS"; 
$dbname = "cheakout";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$paymentSuccess = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardNumber = $_POST['card_number'];
    $expirationDate = $_POST['expiration_date'];
    $cvv = $_POST['cvv'];
    $Totalprice = $_POST['Total_price'];


    $sql = "INSERT INTO pay (card_number, expiration_date, cvv, Total_price) 
            VALUES ('$cardNumber', '$expirationDate', '$cvv', '$Totalprice')";

    if ($conn->query($sql) === TRUE) {
        $paymentSuccess = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
    
        

        .banner img {
            width: 1850px;
            height: 450px;
            margin: 0 10px;
        }
        .container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background:#f08214;
            border-radius: 7px;
            box-shadow: 0 0 10px #ccc;
        }

        h2 {
            text-align: center;
        }

        input[type="text"],
        button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .item-btn {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 10px;
            background-color:chocolate;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 3px;
        }

        .item-btn:hover {
            background-color: #0056b3;
        }

        button {
            background-color:#f08214;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color:#ff5722;
        }

        #success-msg {
            display: none;
            text-align: center;
            color:#0056b3;
        }
    </style>
</head>
<body>
<div class="banner">
        <img src="clay-banks-c2a0TydMlAs-unsplash.jpg" alt="Coffee Drink 1"> <!-- Replace with actual image paths -->
        
    </div>
    <div class="container">
        <h2>Payment Details</h2>
        <form action="" method="POST">
            <div class="payment-section" id="payment-section">
                <input type="text" name="card_number" placeholder="Card Number" required>
                <input type="text" name="expiration_date" placeholder="Expiration Date" required>
                <input type="text" name="cvv" placeholder="CVV" required>
                <input type="text" name="Total_price" placeholder="Total price">
                <button class="pay-btn" type="submit">Pay Now</button>
            </div>
        </form>

        <div id="success-msg">
            <h2>Payment Successful!</h2>
        </div>
    </div>

    <script>
  
        var paymentSuccess = <?php echo json_encode($paymentSuccess); ?>;
        if (paymentSuccess) {
            document.getElementById('success-msg').style.display = 'block';
        }
    </script>
</body>
</html>
