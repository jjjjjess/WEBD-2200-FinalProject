<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        
                    <li>
                        <div class="icon">
                            <img src="images/dashboard.svg" alt="dashboard icon">
                        </div>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="images/patients3.svg" alt="patients icon">
                        </div>
                        <a href="patients.php">Patients</a>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="" alt="medical_records icon">
                        </div>
                        <a href="medical_records.php">Medical Records</a>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="images/billing2.svg" alt="patients icon">
                        </div>
                        <a href="billing.php">Billing</a>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="images/reports.svg" alt="patients icon">
                        </div>
                        <a href="reports.php">Reports</a>
                    </li>
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
                               Total Patients
                            </div>
                            <div class="number">
                                50
                            </div>
                        </div>

                        <div class="icon-patients">
                            <img src="images/patients.svg" alt="patients icon">
                        </div>
                    </div>
                  
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                               Total Doctors
                            </div>
                            <div class="number">
                                10
                            </div>
                        </div>

                        <div class="icon-stethoscope">
                            <img src="images/stethoscope.svg" alt="stethoscope icon">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                               Total Appointments
                            </div>
                            <div class="number">
                                100
                            </div>
                        </div>

                        <div class="icon-calendar">
                            <img src="images/calendar.svg" alt="calendar icon">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-left">
                            <div class="title">
                               Pending Bills
                            </div>
                            <div class="number">
                                4
                            </div>
                        </div>

                        <div class="icon-money">
                            <img src="images/money.svg" alt="patients icon">
                        </div>
                    </div>
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

                            <tr>
                                <td>
                                    Stuart Sindani
                                </td>
                                <td>
                                    Dr. Mike Makina
                                </td>
                                <td>
                                    2023-01-01
                                </td>
                                <td>
                                    10:00
                                </td>
                                <td>
                                    <div class="status">
                                        completed
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Precious Mawaya
                                </td>
                                <td>
                                    Dr. Mike Makina
                                </td>
                                <td>
                                    2023-01-01
                                </td>
                                <td>
                                    10:00
                                </td>
                                <td>
                                    <div class="status">
                                        scheduled
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>