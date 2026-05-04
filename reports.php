<?php 

     // require_once('db_connect.php');
    $conn = mysqli_connect('localhost', "root", '', 'hospital_sys',3307);

    // 2. Check if the connection worked
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    #paid total
    $sql_paid = "SELECT SUM(amount) AS paid_total FROM billing WHERE status = 'Paid' ";
    $result = mysqli_query($conn, $sql_paid);
    $row_paid = $result->fetch_assoc();

    #pending total
    $sql_pending = "SELECT SUM(amount) AS pending_total FROM billing WHERE status = 'Pending' ";
    $result = mysqli_query($conn, $sql_pending);
    $row_pending = $result->fetch_assoc();

    #getting appointments

    $sql_appointment = "SELECT 
            p.name AS patient_name,
            dpt.name AS department_name,
            dc.name AS doctor_name,
            a.appointment_date,
            a.appointment_time,
            a.status

            FROM appointments a 
            JOIN departments dpt ON dpt.id = a.dept_id
            JOIN patients p ON p.id = a.patient_id
            JOIN doctors dc ON dc.id = a.doctor_id
            ORDER BY a.appointment_date ASC   
    
    ";

    $result_appointments = mysqli_query($conn, $sql_appointment);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reports.css">
    <link rel="stylesheet" href="dashboard.css">
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
                            <div class="title" style="opacity: .8;">
                               Revenue Collected
                            </div>
                            <div class="number" style="color: rgb(3, 163, 3);">
                                K<?= $row_paid['paid_total'] ?>
                            </div>
                        </div>
                    </div>
                  
                    <div class="card">
                        <div class="card-left">
                            <div class="title" style="opacity: .8;">
                               Revenue Pending
                            </div>
                            <div class="number" style="color: #bca510;">
                                K<?= $row_pending['pending_total'] ?>                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="appointments">
                    <div class="title">
                        Appointments per Doctor
                    </div>

                    <div class="table">
                        <table>
                            <tr class="t-header">
                                <td>Patient Name</td>
                                <td>Doctor's name</td>
                                <td>Doctor's department</td>
                                <td>Appointment_date</td>
                                <td>Appointment_time</td>
                                <td class="td">Status</td>
                            </tr>
                            <?php if($result_appointments->num_rows > 0):?>
                                <?php while($row = $result_appointments->fetch_assoc()):?>
                                    <tr>
                                        <td>
                                            <?= $row['patient_name'] ?>
                                        </td>
                                        <td>
                                            <?= $row['doctor_name'] ?>                                            
                                        </td>
                                        <td>
                                            <?= $row['department_name']?>                                           
                                        </td>
                                        <td>
                                            <?= substr($row['appointment_date'],0,10) ?>                                            
                                        </td>
                                        <td>
                                            <?= $row['appointment_time'] ?>                                            
                                        </td>
                                        <td>
                                            <?php if($row["status"] === "Completed"):?>
                                                <div class="status" style="color: rgb(6, 204, 45); background:rgb(205, 255, 215);">
                                                    <?= $row["status"]; ?> 
                                                </div>
                                            <?php elseif($row["status"] === "Scheduled"):?>
                                                <div class="status" style="color: rgb(101, 101, 233);">
                                                       <?= $row["status"]; ?> 
                                                </div>
                                            <?php elseif($row["status"] === "Cancelled"):?>
                                                <div class="status" style="color: rgb(193, 30, 8); background:rgb(255, 189, 189);">
                                                       <?= $row["status"]; ?> 
                                                </div>
                                            <?php endif; ?>
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