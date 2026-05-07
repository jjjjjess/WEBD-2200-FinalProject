<?php 
include 'db_connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


//$output = $conn->query("SELECT * FROM medical_records");

$medical_sql = "SELECT  
                    p.name AS patient_name,
                    d.name AS doctor_name,
                    m.diagnosis,
                    m.treatment,
                    m.recorded_at
                FROM medical_records m
                JOIN patients p ON m.patient_id = p.id
                JOIN doctors d ON m.doctor_id = d.id
                ORDER BY m.recorded_at DESC
                LIMIT 10";

$output = $conn ->query($medical_sql);
                                

?>






<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Departments Page">
        <title>Medical Records</title>
        <link rel="stylesheet" href="billing.css">
        <link rel="stylesheet" href="dashboard.css">
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

                    <div class="appointments">
                        <div class="title">
                            Medical Records
                        </div>

                        <div class="table">
                            <table>
                                <tr class="t-header">
                                    <td>Patient</td>
                                    <td>Doctor</td>
                                    <td>Diagnosis</td>
                                    <td>Treated</td>
                                    <td>Visit Date & Time</td>
                                    <!-- <td>Actions</td> -->
                                </tr>
                                    <?php while($row = $output->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $row['patient_name']; ?></td>
                                    <td><?php echo $row['doctor_name']; ?></td>
                                    <td><?php echo $row['diagnosis']; ?></td>
                                    <td><?php echo $row['treatment']; ?></td>
                                    <td><?php echo $row['recorded_at']; ?></td>
                                    <!-- <td class="edit-delete-icons">
                                        <img src="images/edit.svg" alt="edit image">
                                        <img src="images/bin.svg" alt="bin image">
                                    </td> -->
                                </tr>
                                <?php } ?>
                            
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </body>
</html>