<?php
$page='list';

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
    <title>LIST A PET</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<?php include('nav.php'); ?>
    <div class="wrapper">
        <form method="POST" action="#">
            <h1>PET DETAILS</h1>
                <div class="input-box">
                    <label for="petname">NAME</label>
                    <input type="text" placeholder="Pet name" name="pname" required maxlength="50" minlength="2"><br>
                </div>
                <div class="input-box">       
                    <label for="petage">AGE</label>
                    <input type="number" placeholder="Pet age" name="page" required max="50" min="0"><br>
                </div><br>
                <div class="input-box">   
                    <label for="petgender">GENDER</label>
                    <select name="pgender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div><br>
                <div class="input-box">
                    <label for="petspecies">SPECIES</label>
                    <input type="text" placeholder="Pet species" name="pspecies" required maxlength="50" minlength="2"><br>
                </div>
                <div class="input-box">
                    <label for="petbreed">BREED</label>
                    <input type="text" placeholder="Pet breed" name="pbreed" required maxlength="50" minlength="2"><br>
                </div>
                <div class="input-box">
                    <label for="petcolor">COLOR</label>
                    <input type="text" placeholder="Pet color" name="pcolor" required maxlength="50" minlength="2"><br>
                </div>
                <div class="input-box">
                    <label for="petmed">MEDICAL DETAILS</label>
                    <input type="text" placeholder="Pet meddetails" name="pmed" required maxlength="100" minlength="2"><br>
                </div>
                   <div class="input-box">
                        <label for="name">LOCATION</label>
                        <input type="text" placeholder="Location" name="location" required maxlength="50" minlength="2"><br>
                    </div><br>
                <div class="input-box">
                    <label for="petphoto">UPLOAD PHOTO</label>
                    <input type="file" name="pphoto" accept="image/*" required><br>
                </div>
                 
                    <div class="input-box">
                        <div class="input-button">
                            <input type="submit" style="width:100%;" name="list" value="LIST THE PET">
                        </div>
                    </div>
        </form>
    </div>
        <?php
        if(isset($_POST['list']))
        {
            $petname=$_POST['pname'];
            $petage=$_POST['page'];
            $petgender=$_POST['pgender'];
            $petspecies=$_POST['pspecies'];
            $petbreed=$_POST['pbreed'];
            $petcolor=$_POST['pcolor'];
            $petmed=$_POST['pmed'];
            $petphoto=$_POST['pphoto'];
            $location=$_POST['location'];

            $oname = $userRow['name'];
            $oemail = $userRow['email'];
            $ophone = $userRow['phone'];

            $query = "INSERT INTO pets (petname, petage, petgender, petspecies, petbreed, petcolor, petmed, petphoto, oname,oemail,ophone, location) VALUES ('".$petname."', '.$petage.', '".$petgender."', '".$petspecies."', '".$petbreed."', '".$petcolor."', '".$petmed."', '".$petphoto."', '".$oname."','".$oemail."', '.$ophone.', '".$location."')";
        
            mysqli_query($con,$query);
            echo "<script>
                alert('PET LISTED SUCCESSFULLY!!');
            </script>";
            echo "<script> location.href='gallery.php'; </script>";
        }
        ?>
</body>
</html>