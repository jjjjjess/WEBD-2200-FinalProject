<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit;
    }
    require('db_connect.php'); 
    // $conn = new mysqli('localhost','root','','hospital_sys',3307);
    
    if($conn->connect_error){
        die("connection_error: ".$conn->connect_error);
    } else {
     

        #rendering information of specific bill to the form
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql_get_bill = " SELECT 
                p.name AS patient_name,
                b.amount,
                b.description,
                b.status,
                b.payment_date

                FROM billing b 
                JOIN patients p ON b.patient_id = p.id
                WHERE b.id = $id
         
            ";

            $get_bill = mysqli_query($conn,$sql_get_bill)->fetch_assoc();

            $p_name = $get_bill['patient_name'];
            $b_amount = $get_bill['amount'];
            $b_description = $get_bill['description'];
            $b_status = $get_bill['status'];
            $b_payment_date = $get_bill['payment_date'];

                

            
            #adding to a patient to the database 
            if($_SERVER["REQUEST_METHOD"] === "POST"){

        
                $amount = $_POST['amount'];
                $description = $_POST['description'];
                $status = $_POST['status'];
                $payment_date = $_POST['payment_date'];
    

                $sql_update_bill = "UPDATE 
                    billing 
                    SET 
                    amount=$amount,
                    description='$description',
                    status='$status',
                    payment_date='$payment_date'
                    WHERE id = $id
                        ";
                
                $result = mysqli_query($conn,$sql_update_bill);

                if($result){
                    $_SESSION['bill-updated'] = true;
                } else {
                    $_SESSION['bill-updated'] = false;

                    die(mysqli_error($conn));
                }
                
                header('location:billing.php');
                exit();
            };
        }
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
                    Welcome, <?php echo $_SESSION['username']; ?>
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
                    <button onclick="return confirm('Are you sure you want to log out?')">
                        <div class="icon">
                            <img src="images/logout2.svg" alt="logout icon">
                        </div>
                        <a style="text-decoration: none; color: #1D293D;" href="dashboardLogout.php">Logout</a>
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
                                        <!-- name of the patient connect to the bill  -->
                                
                                        <input type="text" name="patient_name" value=<?= $p_name?> readonly>                                                                    
                                        </input>

                                    </td>
                                </tr>
                                <tr>
                                  <!-- amounts field  -->
                                   <td>Amount:</td>
                                   <td><input type="number" min="0" name="amount" id="" placeholder="000000" value=<?= $b_amount ?>></td>
                                </tr>
                                <tr>
                                  <!-- Description's field  -->
                                   <td>Description:</td>
                                   <td><textarea cols="35" rows="2" name="description" id=""><?= $b_description ?></textarea></td>
                                </tr>
                                <tr>
                                  <!-- status field  -->
                                   <td>Status:</td>
                                   <td><input type="text" name="status" value=<?= $b_status ?> id="">
                                   </input></td>
                                </tr>
                                <tr>
                                  <!-- date field  -->
                                   <td>Payment Date:</td>
                                   <td><input type="date" name="payment_date" value=<?= $b_payment_date ?> id=""></td>
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