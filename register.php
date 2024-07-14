<?php
	include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Register</title>
    <link rel="icon" type="image/gif/png" href="logo.png">
</head>
<div class="header">
        <nav class="navbar">
            <a href="#" class="nav-name no-hover">ADOPTIFY</a>
            <a href="#" class="nav-logo no-hover"><i class="fa-solid fa-paw"></i></a>

</nav>
        </div>

<body>
    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <form action="" method="post" onsubmit="return validate()">
                <div class="field input">
                    <label for="username">Name</label>
                    <input type="text" name="name" id="name" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="number">Phone Number</label>
                    <input type="tel" name="phone" id="phone-number" autocomplete="off" required pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email-field" spellcheck="false" onkeyup="validateEmail()" autocomplete="off" required>
                </div>
                <div class="gender-box">
                    <h3>Gender</h3>
                    <div class="gender-option">
                        <div class="gender">
                        <input type="radio" name="gender" value="male" id="check-male" />
                            <label for="check-male">Male</label> 
                        </div>
                        <div class="gender">
                        <input type="radio" name="gender" value="female" id="check-female" />
                            <label for="check-female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" maxlength="100" minlength="8" required>
                </div>
                <div class="field input">
                    <label for="cnfrm-Password"> Confirm Password</label>
                    <input type="password" name="conpassword" id="cnfrm-Password" autocomplete="off" maxlength="100" minlength="8" required>
                </div>
                <p id="message"></p>
                <div class="field">
                    <input type="submit" class="btn" name="submit" onclick="checkPassword()" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
            <?php
                if(isset($_POST['submit']))
                {
                    $name=$_POST['name'];
                    $phone=$_POST['phone'];
                    $email=$_POST['email'];
                    $gender=$_POST['gender'];
                    $password=$_POST['password'];
                    $conpassword=$_POST['conpassword'];
                    
                    $query= "INSERT INTO users(name,phone,email,gender,password) VALUES ('".$name."','.$phone.','".$email."','".$gender."','".$password."')";
                    
                    mysqli_query($con,$query);
                    echo "<script>
                        alert('REGISTERED SUCCESSFULLY!!');
                    </script>";
                    echo "<script> location.href='login.php'; </script>";
                }
            ?>
            <script src="scrip.js"></script>
        </div>
    </div>

    
    
</body>
</html>