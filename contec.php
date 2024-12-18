<?php
$servername = "localhost";
$username = "root"; 
$password = "PASS"; 
$dbname = "contec us"; 


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    $stmt = $conn->prepare("INSERT INTO contacus (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);

   
    if ($stmt->execute()) {
        echo "<p>Thank you, $name! We have received your message and will get back to you at $email shortly.</p>";
    } else {
        echo "<p>Something went wrong. Please try again later.</p>";
    }

   
    $stmt->close();
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
         * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

header {
    background-color: #020100e0;
    padding: 10px 20px;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    width: 50px;
    height: auto;
}

nav ul {
    list-style-type: none;
    display: flex;
    gap: 20px;
}

nav ul li a {
    color: rgb(163, 69, 21);
    text-decoration:none;
    font-size: 20px;
    padding: 26px;
  
    
}

nav ul li a:hover {
    color: #f08214;
}


      
        .container {
            display: flex;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .profile-section {
            position: relative;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
        }

        .profile-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

   
        .contact-section {
            width: 600px;
            height: 600px;
        }

        .contact-section h2 {
            color: #d68408;
            margin-bottom: 15px;
        }

        .contact-info {
            background-color: #dac314;
            padding: 10px;
            border-radius: 5px;
            color: white;
            margin-bottom: 50px;
        }

        .contact-info p {
            margin: 8px 0;
        }

        .contact-info p span {
            font-weight: bold;
        }

        form input,
        form button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            background-color: #d4b800;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }

        form button:hover {
            background-color: #a79f00;
        }
        .footer {
        background-image: url('WhatsApp Image 2024-10-14 at 09.52.16_b96d5b9e.jpg'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #fff;
        padding: 20px;
        display: flex;
        width: 100%;
        height: 350px;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    
    .footer-content {
        background-color: rgba(198, 109, 7, 0.6);
        padding: 15px;
        border-radius: 8px;
        width: 100%;
        height: 150px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .footer div {
        flex: 1;
        text-align: center;
        margin: 5px 0;
    }

    .footer a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
    }

    .footer-links{
    width: 85%;
    margin: auto;
    display:flex;
    flex-wrap:wrap;
    align-items: flex-start;
    justify-content: center;
    gap:20px
   }
   .footer-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 80%; 
    flex-wrap: wrap;
    width: 80%; 
    max-width: 1200px; 
}

.footer-col {
    flex: 1; 
    margin: 20px;
}

.footer-col h1, .footer-col h3 {
    color: #fff;
    font-size: 18px;
    margin-bottom: 30px;
}

.footer-col p {
    font-size: 14px;
    margin-bottom: 10px;
}

.footer-col a {
    color: #fff;
    text-decoration: none;
    display: block;
    margin-bottom: 0px;
    font-size: 16px;
}

.footer-col a:hover {
    color:#f08214;
}
.social-icons a {
    color: #fff;
    margin: 0 10px;
    font-size: 24px;
    text-decoration: none;
}

.social-icons a:hover {
    color: #f08214; 
}

    .footer a:hover {
        text-decoration: underline;
    }

</style>
</head>
<body>
  
<header>
    <nav>
        <img src="Untitled.png" alt="Coffee Logo" class="logo">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="story.html">Our Story</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="contec.php">Contact</a></li>
        </ul>
    </nav>
</header>
<div class="container">
  
    <div class="profile-section">
        <img src="Screenshot 2024-11-07 102253.png" alt="Profile Picture">
        <div class="circle2"></div>
    </div>

 
    <div class="contact-section">
        <div class="contact-info">
        <h3>Contact With Us</h3>
                    <p>High Level, Colombo 06</p>
                    <p>+94112367464</p>
        </div>
        <h2>Contact Us</h2>
        <form action="#" method="POST">
            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter a valid email address" required>
            <button type="submit">SUBMIT</button>
        </form>
    </div>
</div>
<div class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <div class="footer-row">
                    <div class="footer-col">
                        <h2>Brew And Beans</h2>
                        <img src="Untitled.png" alt="Coffee Logo" class="logo">
                        </div>
                        <div class="footer-col">
                           <ul>
                                <h2>Explore</h2>
                        <a href="index.html">Home</a>
                        <a href="story.html">Our Story</a>
                        <a href="shop.html">Shop</a>
                        <a href="menu.html">Menu</a>
                        <a href="contec.php">Contact</a>
                        </ul>
                    </div>
        
                    <div class="footer-col">
                        <h3>Contact With Us</h3>
                        <p>High Level, Colombo 06</p>
                        <p>+94112367464</p>
                    </div>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                       
                    </div>
                </div>
    </div>


</body>
</html>