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
    <h3 align="center">Adoption Requests Received</h3>
    <?php
$owneremail = $_SESSION['email'];
     $sql = "SELECT a.requestid, a.name, a.age, a.phone, a.email, a.location, a.status, p.petname
            FROM adoptionrequest a
            JOIN pets p ON a.petid = p.petid
            WHERE p.oemail = '$owneremail'"; 

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='dashboard-table'>";
        echo "<tr><th>Pet Name</th><th>Adopter Name</th><th>Age</th><th>Phone</th><th>Email</th><th>Location</th><th>Status</th><th>Actions</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['petname']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['age']}</td>";
            echo "<td>{$row['phone']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['location']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>";
            if ($row['status'] == 'Pending') {
                echo "<form method='POST' style='display:inline;'>
                        <input type='hidden' name='requestid' value='{$row['requestid']}'>
                        <input type='hidden' name='action' value='accept'>
                        <button type='submit' class='accept'>Accept</button>
                      </form>";
                echo "<form method='POST' style='display:inline;'>
                        <input type='hidden' name='requestid' value='{$row['requestid']}'>
                        <input type='hidden' name='action' value='reject'>
                        <button type='submit' class='reject'>Reject</button>
                      </form>";
            }
            else {
                echo "Adoption Completed";
            }
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p align='center'>No adoption requests received.</p>";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $requestid = $_POST['requestid'];
        $action = $_POST['action'];
        $status = ($action == 'accept') ? 'Accepted' : 'Rejected';

        $updateQuery = "UPDATE adoptionrequest SET status='$status' WHERE requestid=$requestid";
        if (mysqli_query($con, $updateQuery)) {
            echo "<script>alert('Request status updated successfully'); window.location.href='adoptionrequest.php';</script>";
        } else {
            echo "<script>alert('Error updating request status');</script>";
        }
    }
    ?>
    </div>
    </body>
    </html>
        