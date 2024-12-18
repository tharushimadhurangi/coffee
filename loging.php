<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #f4f4f9;
    }

    .login-form {
      width: 300px;
      padding: 20px;
      background: #dab409;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      text-align: center;
    }

    .login-form h2 {
      margin-bottom: 20px;
      font-size: 24px;
      color: #333;
    }

    .login-form input[type="email"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 20px;
      outline: none;
    }

    .login-form label {
      display: flex;
      align-items: center;
      font-size: 14px;
      color: #120d04;
      margin-bottom: 10px;
      cursor: pointer;
    }

    .login-form input[type="checkbox"] {
      margin-right: 5px;
    }

    .login-form a {
      color: #635214;
      font-size: 14px;
      text-decoration: none;
    }

    .login-form a:hover {
      text-decoration: underline;
    }

    .login-form button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      background: #403904;
      color: #fff;
      border: none;
      border-radius: 20px;
      cursor: pointer;
      font-size: 16px;
    }

    .login-form button:hover {
      background: #ae7505;
    }

    .signup-link {
      font-size: 14px;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="login-form">
    <h2>Login Form</h2>
    <form action="login.php" method="post">
      <input type="email" placeholder="Email Address" required name="Email"> 
      <input type="password" placeholder="Password" required name="Password">
      <label>
        <input type="checkbox" name="remember"> 
        Remember me
      </label>
      <a href="#">Forgot password?</a>
      <button type="submit">Login<a href="cheakout.php"></a></button>
      <p class="signup-link">Not a member? <a href="Registration.php">Signup Now</a></p>
    </form>
  </div>
</body>
</html>
