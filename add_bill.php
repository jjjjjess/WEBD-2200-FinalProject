<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
    require_once('db_connect.php'); 
    // $conn = new mysqli('localhost','root','','hospital_sys',3307);
    
    if($conn->connect_error){
        die("connection_error: ".$conn->connect_error);
    } else {
     

        #selecting only outgoing patients to render them out
        $sql_patients = "SELECT 
            name,
            p.id AS patient_id

            FROM patients p
            JOIN admissions adm ON p.id = adm.patient_id 

            WHERE adm.status = 'Outgoing'
            
            ";
        
        

        $patients = mysqli_query($conn, $sql_patients);

    
        #adding to a patient to the database 
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            
            $patient_id = $_POST['patient_name'];
            $amount = $_POST['amount'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $payment_date = $_POST['payment_date'];
 

            $sql_add_patients = "INSERT INTO billing (patient_id,amount,description,status,payment_date) 
                    VALUES ($patient_id,$amount,'$description','$status','$payment_date')
                    ";
            
            $result = mysqli_query($conn,$sql_add_patients);

            if($result){
                $_SESSION['user-added'] = true;
            } else {
                $_SESSION['user-added'] = false;

                die(mysqli_error($conn));
            }

            header('location:billing.php');
            exit();
        };
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="billing.css">
    <link rel="stylesheet" href="dashboard.css">
    <style>
        .appointments .table td {
            font-size: 1.5rem;
            font-weight: 600;
            color: rgba(26, 24, 24, 0.8);
        }
        .appointments .table td > select,
        .appointments .table td > input,
        .appointments .table td > textarea{
            width: 70%;
            height: 2rem;
            border-radius: 10px;
            border: 1px solid rgba(26, 24, 24, 0.52);
            font-size: 1rem;
            padding: 6px;
        }
        .appointments .table td > textarea:focus-within,
        .appointments .table td > select:focus-within,
        .appointments .table td > input:focus-within{
            outline: none;
        }
        .appointments .table td > button{
            width: 30%;
            height: 2.2rem;
            border-radius: 10px;
            border: none;
            box-shadow: 0 0 2px 0 rgba(26, 24, 24, 0.52);
            font-size: 1rem;
            font-weight: 600;
            color: white;
            cursor: pointer;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <div class="top-section">
            <div class="left">
                <div class="logo">
                    <img src="images/logo1.svg" alt="logo">
                </div>
                NdataCare
            </div>
            <div class="right">
                <div class="user">
                    Welcome,<?php echo $_SESSION['role']; ?>
                </div>

                <div class="role">
                    <?php echo $_SESSION['role']; ?>
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
                <!-- bills form-->
                <div class="appointments">
                    <div class="table">
                        <form action="" method="POST">
                            <table>
                                <tr>
                                    <!-- patient_name field -->
                                    <td>Patients Name: </td>
                                    <td>
                                        <!-- selecting outgoing patients from the database to add bills for  -->
                                        <?php if($patients->num_rows > 0):?>
                                                <select name="patient_name" id="">
                                                    <option value=""></option>
                                                <?php while($row = $patients->fetch_assoc()):?>
                                                    <option value=<?= $row['patient_id'] ?>><?= $row['name'] ?></option>
                                                <?php endwhile;?>
                                                </select>
                                        <?php endif;?>
                                    </td>
                                </tr>
                                <tr>
                                  <!-- amounts field  -->
                                   <td>Amount:</td>
                                   <td><input type="number" min="0" name="amount" id="" placeholder="000000.00"></td>
                                </tr>
                                <tr>
                                  <!-- Description's field  -->
                                   <td>Description:</td>
                                   <td><textarea cols="35" rows="2" name="description" id=""></textarea></td>
                                </tr>
                                <tr>
                                  <!-- status field  -->
                                   <td>Status:</td>
                                   <td><select name="status" id="">
                                        <option value="Pending">Pending</option>
                                        <option value="Paid">Paid</option>
                                   </select></td>
                                </tr>
                                <tr>
                                  <!-- date field  -->
                                   <td>Payment Date:</td>
                                   <td><input type="date" name="payment_date" id=""></td>
                                </tr>
                                <tr>
                                  <!-- submit and clear button field  -->
                                   <td><button type="reset" style="background: rgba(220, 16, 16, 0.78);">Clear</button></td>
                                   <td><button type="submit" style="background: rgba(60, 43, 249, 0.87);">Add Bill</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>