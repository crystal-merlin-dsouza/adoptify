<?php
session_start(); 
$page='adoptionrequest';
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
<?php include('nav.php'); ?>
        <div class="container">
        <h3 align="center">My Adoption Requests</h3>
    <?php
$email = $_SESSION['email'];
     $sql = "SELECT a.requestid, a.name, a.age, a.phone, a.email, a.location, a.status, p.petname
            FROM adoptionrequest a
            JOIN pets p ON a.petid = p.petid
            WHERE a.email = '$email'"; 

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='dashboard-table'>";
        echo "<tr><th>Pet Name</th><th>Adopter Name</th><th>Age</th><th>Phone</th><th>Email</th><th>Location</th><th>Status</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['petname']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['age']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['location']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p align='center'>No adoption requests found.</p>";
    }
    
    ?>
    </div>
    </body>
    </html>
        