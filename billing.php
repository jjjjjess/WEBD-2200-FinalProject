<?php
    session_start();
    // require_once('db_connect.php');
    $conn = mysqli_connect('localhost', "root", '', 'hospital_sys',3307);

    // 2. Check if the connection worked
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    #doctors name

    $sql = " SELECT 
        b.id,
        p.name,
        b.amount, 
        b.description, 
        b.status,
        b.payment_date
        FROM 
        billing b JOIN patients p ON b.id = p.id 
        ORDER BY b.id DESC
        LIMIT 5
        ";   

    $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="billing.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <?php 
    if(isset($_SESSION['op_success'])){
        if($_SESSION['op_success'] === true){
            include('alert-messages/operation_success.php');
        } elseif ($_SESSION['op_success'] === false){
            include('alert-messages/operation_failure.php');
        };

        unset($_SESSION['op_success']);
    };   
    ?>    
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
                    Welcome, Dr. Mike Makina
                </div>

                <div class="role">
                    Admin
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
                                Billing
                            </div>
                        </div>

                        <button class="add-bill">
                            <span>+</span>
                            <span>Add</span>
                        </button>
                    </div>
                </div>

                <div class="appointments">
                    <div class="title">
                        Recent Bills
                    </div>

                    <div class="table">
                        <table>
                            <tr class="t-header">
                                <td>Patient</td>
                                <td>Amount</td>
                                <td>Description</td>
                                <td>Status</td>
                                <td>Payment Date</td>
                                <td>Actions</td>
                            </tr>
                            <?php if($result->num_rows > 0):?>
                                <?php while($row = $result->fetch_assoc()):?>
                                    <tr>
                                        <td>
                                            <?= $row['name'] ?>
                                        </td>
                                        <td>
                                            K<?= $row['amount'] ?>                                            
                                        </td>
                                        <td>
                                            <?= $row['description']?>
                                        </td>
                                        <td>
                                           <?php if($row["status"] === "Paid"):?>
                                                <div class="status" style="color: rgb(6, 204, 45); background:rgb(205, 255, 215);">
                                                    <?= $row["status"]; ?> 
                                                </div>
                                            <?php elseif($row["status"] === "Pending"):?>
                                                <div class="status" style="color: rgb(101, 101, 233);">
                                                       <?= $row["status"]; ?> 
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?= $row['payment_date']?>                                            
                                        </td>
                                        <td class="edit-delete-icons">
                                            <a href="update.php?id<?= $row['id']?>?>"><img src="images/edit.svg" alt="edit image"></a>
                                            <a href="delete.php?id=<?= $row['id'];?>&table=billing" onclick="return confirm('Delete this record?')">
                                            <img src="images/bin.svg" alt="bin image"></a>
                                        </td>
                                    </tr>
                                <?php endwhile;?>
                            <?php endif;?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>