<?php
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($con, $query);
$userRow = mysqli_fetch_assoc($result);
?>

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
    <?php 
      $name = $userRow['name'];
      echo "  $name";
       ?>
    <button class="dropbtn">
      <i class="fa fa-caret-down"></i>
      
    </button>
    <div class="dropdown-content">
    <a href="status.php">My adoption requests status</a>
    <a href="adoptionrequest.php">Adoption requests received</a>
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
