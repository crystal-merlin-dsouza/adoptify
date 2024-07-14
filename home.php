<?php
$page='home';
include('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1000">
    <title>pet adoption</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./css/style.css">

</head>
<body >
<?php include('nav.php'); ?>
<div class="container1">
    <h1 class="anim">Find your<br>FurKid today</h1><br>
    <h5 class="anim"><a href="gallery.php" class="view-more">ADOPT A PET</a></h5>
    <img src=".\img\pets.jpg" class="imgi1">
</div>

<div class="container2">
    <h1 class="anim">Find your<br>FurKid a forever home</h1><br>
    <h5 class="anim"><a href="listpet.php" class="view-more">LIST A PET</a></h5>
    <img src=".\img\adopt.jpg" class="imgi2">
</div>

</body>
</html>

