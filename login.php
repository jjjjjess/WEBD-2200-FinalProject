<?php
require("db_connect.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $userid = $_POST['userid'] ?? '';
        $passcode =$_POST['passcode'] ?? '';
        $error=" ";

        $sql = "SELECT * FROM users WHERE email ='$userid'";
        $result = mysqli_query($conn, $sql);
        //if any user matches it should then check from the row if the passwords match aswell.
        // second if statement checks if the user has entered a valid password.git 
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] == $passcode) 
            {
                $_SESSION['user_id'] = $row['email'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                // if ($row['role'] == "Admin") 
                // {
                //     header("Location: admin_test.php");
                //     exit;
                // } 
                // elseif ($row['role'] == "Doctor") 
                // {
                //     header("Location: doctor_test.php");
                //     exit;
                // } 
                // elseif ($row['role'] == "Nurse") {
                //     header("Location: nurse_test.php");
                //     exit;
                // }
                // elseif($row['role']== "Receptionist")
                // {
                //     header("Location:");
                // }
                header("Location:dashboard.php");
            }
            else
            {
                //user entered incorrect password
                $error="😞 invalid email or password";
            }
        }
        else 
        {       // user entered an email that does not exist in our db 
                $error="😞 invalid email or password";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="log_in.css">
</head>
<body>
    <div id="page">
        <div id="head_container">
            <img alt="Hopspital animation" src="images\logo.svg">
            <h1>MEDICARE</h1>
            <h3>Treating our patients with love and care</h3>
        </div>
<!-- displaying the error messages for email or password,mixed style-->
            <?php 
            if(!empty($error)){?>
            <div class="error">
                <?php echo $error; ?>
            </div>
            <?php }?>

        
        <div id="form_container">
            <form method="POST" action="login.php">
                
                   
                    <label for="userid">Email</label><br>
                    <input id="userid" type="text" name="userid" title="Please ensure your email contains the company domain '@nthanzi.mw'" placeholder="example@nthanzi.mw" required><br> <!--validation not yet set to regex.pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" might not use it-->
                    <label for="passcode">password</label><br>
                    <input type="password" id="passcode" name="passcode" required><br><br>
                    <button type="submit" id="submit" name="submit">sign in</button>
                
            </form>
        </div>
    </div>
</body>
</html>
