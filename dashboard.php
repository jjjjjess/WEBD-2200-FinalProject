<?php 
include 'dashboard/dbConnection.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$role = $_SESSION['role'];

$patients = $conn->query("SELECT * FROM patients");
$doctors = $conn->query("SELECT * FROM doctors");
$nurses = $conn->query("SELECT * FROM nurses");
$appointmentCount = $conn->query("SELECT * FROM appointments");

$pendingBills = $conn->query("SELECT * FROM billing WHERE status = 'Pending'");

$appointments = $conn->query("
    SELECT 
        patients.name AS patient_name,
        doctors.name AS doctor_name,
        appointments.appointment_date,
        appointments.appointment_time,
        appointments.status
    FROM appointments
    JOIN patients ON appointments.patient_id = patients.id
    JOIN doctors ON appointments.doctor_id = doctors.id
    ORDER BY appointments.appointment_date DESC
    LIMIT 5
");

$totalPatients = $patients ? $patients->num_rows : 0;
$totalDoctors = $doctors ? $doctors->num_rows : 0;
$totalNurses = $nurses ? $nurses->num_rows : 0;
$totalAppointments = $appointmentCount ? $appointmentCount->num_rows : 0;
$totalPendingBills = $pendingBills ? $pendingBills->num_rows : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
                    Welcome, 
                    <?php echo $_SESSION['username']; ?>
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
                <div class="stats">
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                               Total Patients
                            </div>
                            <div class="number">
                                <?php echo $totalPatients;?>
                            </div>
                        </div>

                        <div class="icon-patients">
                            <img src="images/patients.svg" alt="patients icon">
                        </div>
                    </div>
                  
                
                    <?php if ($role === 'Doctor'): ?>
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                               Total Nurses
                            </div>
                            <div class="number">
                                <?php echo $totalNurses;?>
                            </div>
                        </div>

                        <div class="icon-stethoscope" style="    background-color:#98007f;
                        ">
                        <i class="fa-solid fa-user-nurse" style="color: white; font-size: 20px;"></i>
                        </div>
                    </div>
                    <?php endif; ?>

                
                    <?php if ($role === 'Doctor'): ?>
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                               Total Doctors
                            </div>
                            <div class="number">
                                <?php echo $totalDoctors;?>
                            </div>
                        </div>

                        <div class="icon-stethoscope">
                            <img src="images/stethoscope.svg" alt="stethoscope icon">
                        </div>
                    </div>
                    <?php endif; ?>
                
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                               Total Appointments
                            </div>
                            <div class="number">
                                <?php echo $totalAppointments; ?>
                            </div>
                        </div>

                        <div class="icon-calendar">
                            <img src="images/calendar.svg" alt="calendar icon">
                        </div>
                    </div>

              
                    <?php if ($role === 'Doctor' || $role === 'Receptionist'): ?>
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                               Pending Bills
                            </div>
                            <div class="number">
                            <?php echo $totalPendingBills; ?>
                            </div>
                        </div>

                        <div class="icon-money">
                            <img src="images/money.svg" alt="patients icon">
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="appointments">
                    <div class="title">
                        Recent Appointments
                    </div>

                    <div class="table">
                        <table>
                            <tr class="t-header">
                                <td>Doctor</td>
                                <td>Patient</td>
                                <td>Date</td>
                                <td>Time</td>
                                <td>Status</td>
                            </tr>
                            <?php if($appointments && $appointments->num_rows > 0): ?>

                                <?php while ($row = $appointments->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['doctor_name']; ?></td>
                                    <td><?php echo $row['patient_name']; ?></td>
                                    <td><?php echo date("d M Y", strtotime($row['appointment_date'])); ?></td>
                                    <td><?php echo $row['appointment_time']; ?></td>
                                    <td>
                                        <div class="status" style="color: #bca40c; background: #fff4ab;">
                                            <?php echo $row['status']; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>

                                <?php else: ?>

                                <tr>
                                    <td colspan="5" style="text-align:center; padding:20px; color: #ff3143;">
                                        No appointments have been scheduled yet
                                    </td>
                                </tr>

                                <?php endif; ?>                      
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>