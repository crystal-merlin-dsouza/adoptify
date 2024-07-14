<?php
$page='adopt';
?>

<?php
    include('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADOPTION</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="header">
        <nav class="navbar">
            <a href="#" class="nav-name no-hover">ADOPTIFY</a>
            <a href="#" class="nav-logo no-hover"><i class="fa-solid fa-paw"></i></a>
            <ul class="nav-menu">
                <li class="nav-item">
                <a href="home.php" class="nav-link <?php if($page=='home') {echo 'active';} ?>" >HOME</a>
                </li>
                <li class="nav-item">
                    <a href="gallery.php" class="nav-link <?php if($page=='adopt') {echo 'active';} ?>" >ADOPT A PET</a>
                </li>
                <li class="nav-item">
                    <a href="listpet.php" class="nav-link <?php if($page=='list') {echo 'active';} ?>">LIST A PET</a>
                </li>
            </ul>
            <ul class="nav-pro">
    <li class="nav-profile">
    <div class="dropdown">
    <i class="fa-solid fa-circle-user"></i>
    <button class="dropbtn">
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a href="profile.php?userid=<?php echo $userRow['userid']; ?>">My Profile</a>
                <a href="logout.php">Logout</a>
    </div>
        </div>
    </li>
</ul>
        
   <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            </nav>
        </div>
    <div class="wrapper">
        <form method="POST" action="#">
            <h1>INTERESTED TO ADOPT?</h1>
            <h5>Please fill the below details</h5>
                <div class="input-box">
                    <label for="name">NAME</label>
                    <input type="text" placeholder="Name" name="name" required maxlength="50" minlength="2"><br>
                </div>
                <div class="input-box">       
                    <label for="age">AGE</label>
                    <input type="number" placeholder="Age" name="age" required max="50" min="0"><br>
                </div><br>
                <div class="input-box">
                    <label for="phone">PHONE NUMBER</label>
                    <input type="tel" placeholder="Phone number" name="phone" autocomplete="off" required pattern="[0-9]{10}" minlength="10" maxlength="10" required>
                </div>
                <div class="input-box">
                    <label for="email">EMAIL</label>
                    <input type="email" placeholder="email" name="email" id="email-field" spellcheck="false" onkeyup="validateEmail()" autocomplete="off" required>
                </div>
                    <div class="input-box">
                        <label for="location">LOCATION</label>
                        <input type="text" placeholder="Location" name="location" required maxlength="50" minlength="2"><br>
                    </div><br>
                    <div class="input-box">
                    <input type="hidden" id="petid" name="petid" value="<?php echo $petid; ?>">
                    </div><br>
                    <div class="input-box">
                        <div class="input-button">
                            <input type="submit" style="width:100%;" name="submit" value="SUBMIT">
                        </div>
                    </div>
        </form>
    </div>
        <?php
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $age=$_POST['age'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $location=$_POST['location'];
            $petid=$_POST['petid'];


            $query = "INSERT INTO adoption (name, age, phone, email, location,petid) VALUES ('".$name."', '.$age.', '.$phone.','".$email."','".$location."','".$petid."')";
        
            mysqli_query($con,$query);
            echo "<script>
                alert('ADOPTION REQUEST SUCCESSFULLY!!');
            </script>";
            echo "<script> location.href='home.php'; </script>";
        }
        ?>
</body>
</html>