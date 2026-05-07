<?php
require 'db_connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


if (isset($_POST['submit'])){
    $fullname=$_POST["fname"];
    $dob=$_POST["dob"];
    $gender=$_POST["gender"];
    $phone=$_POST['phone'];
     $address=$_POST["address"];
   

    $sql="INSERT INTO patients (name,dob,gender,phone,address)
    VALUES('$fullname','$dob','$gender','$phone','$address')";

 $stmt=$conn->prepare($sql);
   $stmt->bind_param("sssss",$fullname,$dob,$gender,$phone,$address);
  $stmt->execute();
}


$role = $_SESSION['role'];
$username = $_SESSION['username'];


$patients = $conn->query("
      SELECT * FROM  patients 
                                                                             ORDER BY patients.id DESC
      LIMIT 5                    
");


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients page</title>
                 
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="billing.css">
       <link rel="stylesheet" href="form.css">

</head>
<body>
     <div class="container">
        <div class="top-section">
            <div class="left">
                <div class="logo">
                    <img src="images/logo1.svg" alt="logo">
                </div>
                MediCare
            </div>
            <div class="right">
                <div class="user">
                    Welcome, <?php echo $username ?>
                </div>

                <div class="role">
                    <?php echo $role?>
                </div>
            </div>
        </div>

        <div class="bottom-section">
            <div class="left">
                <ul>
                    <?php include('menu.php');?>
                </ul>  

                <div class="logout">
                    <button>
                        <div class="icon">
                            <img src="images/logout2.svg" alt="logout icon">
                        </div>
    
                        Logout
                    </button>
                </div>      
            </div>

            

            <div class="right">
    
                <div class="stats">
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                                Patients
                            </div>
                        </div>
                                                                                                <div style="display: flex; gap:10px;" >
                        <button class="add-bill" type="button" onclick="openForm()">
                            <span>+</span>
                            <span>Add</span>
                        </button>

                        <select placeholder="Filter" style="border-radius: 10px;  border: solid 2px #4F39F6; outline: none;" id="js-filter">
                            <option disabled hidden selected value="">Filter</option>
                            <option value="Admitted">Admitted</option>
                            <option value="Outgoing">Outgoing</option>
                            <option value="Deceased">Deceased</option>
                        </select>
                        <button class="add-bill" style="width: fit-content;" id="js-showBtn">
                            Show all
                        </button>
                        </div>
                    </div>
                </div>

                <div class="appointments">
               

                    <div class="table" id="js-table">
                        
                    </div>
                </div>
            </div>
        </div>

                <div id=overlay></div>
                 <div class="form" id="popupForm"  >
            <form method="POST">
        
                    <label>Fullname</label>
                    <input type="text" name="fname" id="fname" placeholder="Fullname" required>
            
                     <label for="dob" >Date of Birth</label>
                    <input type="date" name="dob" id="dob"  required>

                    <label for="gender" >Gender</label>
                    <select name="gender"  required>
                        <option value=""disabled selected>--select gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label for="phone">Phone</label>
                    <input type="number" name="phone">
                   
                    <label for="address" >Address</label>
                    <textarea name="address"  cols="9" rows="5"required></textarea>
                    <div class="actionss">
                    <input type="submit" name="submit" value="Save">
                    <input type="reset" name="clear" value="clear">
                    </div>
                    <button type="button" onclick="closeForm()">Close</button>
        
        </form>
        </div>
            </div>
        </div>
               <script>
        function openForm(){
            document.getElementById("popupForm").style.display="block";
            document.getElementById("overlay").style.display="block";
;        }
function closeForm(){
    document.getElementById("popupForm").style.display="none";
    document.getElementById("overlay").style.display="none";
}
       </script> 
        

       <script src="patients.js"></script>
    </body>
</html>