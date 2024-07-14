<?php
include('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>
<div class="header">
        <nav class="navbar">
            <a href="#" class="nav-name no-hover">ADOPTIFY</a>
            <a href="#" class="nav-logo no-hover"><i class="fa-solid fa-paw"></i></a>

</nav>
        </div>
<body>
<?php
    include('config.php');
      if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email ='$email' AND password = '$password' ";

        $res = mysqli_query($con, $sql);

          if ($res->num_rows>0) {
            
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('location:home.php');
        }else{
            echo "<script>
                        alert('INVALID CREDENTIALS!! TRY AGAIN');
                        header('location:login.php');
                    </script>";
        }
    }

        ?>

  <div class="container">
    <div class="box form-box">
        <header>Login</header>
        <form action="" method="post">
            <div class="field input">
                <label for="email-field">Email</label>
                    <input type="email" name="email" id="email-field" spellcheck="false" onkeyup="validateEmail()" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="login" value="Login" required>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
            </div>
      
        </form>

        <script src="scrip.js"></script>
    </div>
  </div>
</body>
</html>