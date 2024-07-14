<?php
$page='adopt';
    include('config.php');
session_start();
$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($con, $query);
$userRow = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pet Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/view.css">
</head>

<body><?php include('nav.php'); ?>

    <div class="tt">
        <div>
        <?php
        if(isset($_GET['id'])) {
            $pet_id = $_GET['id'];
            $sql = "SELECT * FROM pets WHERE petid = $pet_id";
            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $petname = $row['petname'];
                $petage = $row['petage'];
                $petgender = $row['petgender'];
                $petspecies = $row['petspecies'];
                $petbreed = $row['petbreed'];
                $petcolor = $row['petcolor'];
                $petmed = $row['petmed'];
                $petphoto = $row['petphoto']; 
                $oname = $row['oname'];
                $ophone = $row['ophone'];
                $location = $row['location'];

                echo"<center>";
                echo "<div class='pet-details'>";
                echo "<img src='./img/$petphoto' alt='$petname' height='50%' width='50%'>";
                echo "<h2>$petname</h2>";
                echo "<p>Age: $petage</p>";
                echo "<p>Gender: $petgender</p>";
                echo "<p>Species: $petspecies</p>";
                echo "<p>Breed: $petbreed</p>";
                echo "<p>Color: $petcolor</p>";
                echo "<p>Medical Information: $petmed</p>";
                echo "<h4>CONTACT INFORMATION</h4>";
                echo "<p>Owner Name: $oname</p>";
                echo "<p>Owner Phone: $ophone</p>";
                echo "<p>Location: $location</p>";
                echo "</div>";
                echo"</center>";
            } else {
                echo "<p>No pet found with the provided ID.</p>";
            }
        } else {
            echo "<p>Invalid request.</p>";
        }
        ?>
    </div>
    <div class="wrapper">
    <form method="POST" action="#">
            <h1>INTERESTED TO ADOPT?</h1>
            <h5>Please fill the below details</h5>
            <div class="input-box">
            <label for="reason">Reason for Adoption</label>
            <textarea name="reason" placeholder="Reason for adopting this pet" required maxlength="500" minlength="5"></textarea><br>
             </div>
             <div class="input-box">       
                    <label for="age">AGE</label>
                    <input type="number" placeholder="Age" name="age" required max="50" min="18"><br>
                </div><br>
                <div class="input-box">
                <label for="had_pet">Have you had a pet before?</label>
                <div class="radio-group">
                    <div>
                        <input type="radio" id="had_pet_yes" name="had_pet" value="yes" required>
                        <label for="had_pet_yes">Yes</label>
                    </div>
                    <div>
                        <input type="radio" id="had_pet_no" name="had_pet" value="no" required>
                        <label for="had_pet_no">No</label>
                    </div>
                </div>
            </div><br>
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
    </div>
        <?php
        if(isset($_POST['submit']))
        {
            $userid = $userRow['userid'];
            $name = $userRow['name'];
            $phone = $userRow['phone'];
            $email = $userRow['email'];
            $age=$_POST['age'];
            $reason = $_POST['reason'];
            $had_pet = $_POST['had_pet'];
            $location=$_POST['location'];
            $petid = $_GET['id'];
            $status='pending';

            $query = "INSERT INTO adoptionrequest (userid, name, age, phone, email, location, petid, reason, experience, had_pet, status) VALUES ($userid, '$name', $age, '$phone', '$email', '$location', '$petid', '$reason', '', '$had_pet', '$status')";
        
            mysqli_query($con,$query);
            echo "<script>
                alert('ADOPTION REQUEST SENT SUCCESSFULLY!!');
            </script>";
            echo "<script> location.href='home.php'; </script>";
        }
        ?>
        </div>
</body>

</html>
