<?php
$page='adopt';
    include('config.php');
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PET GALLERY</title>
</head>

<body>
<?php include('nav.php'); ?>
<div class="gallery">
    <?php
$sql = "SELECT * FROM pets WHERE petid NOT IN (SELECT petid FROM adoptionrequest WHERE status = 'accepted')";  
  $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['petid'];
            $name = $row['petname'];
            $age = $row['petage'];
            $gender = $row['petgender'];
            $breed = $row['petbreed'];
            $photo = $row['petphoto']; 

           
            echo "<div class='gallery-item'>";
            echo "<img src='./img/$photo' alt='$name'>";
            echo "<div class='details'>";
            echo"<center>";
            echo "<h3>$name</h3>";
            echo "<p>Age: $age</p>";
            echo "<p>Gender: $gender</p>";
            echo "<p>Breed: $breed</p>";
            echo "<a href='viewpet.php?id=$id' class='view-more'>View More</a>";
            echo"<center>";
            echo "</div>"; 
            echo "</div>"; 
            
        }
    } else {
        echo "<p>No pets available for adoption.</p>";
    }
    ?>
</div>

</body>

</html>
