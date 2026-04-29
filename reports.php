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
                    <li>
                        <div class="icon">
                            <img src="images/dashboard.svg" alt="dashboard icon">
                        </div>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="" alt="departments icon">
                        </div>
                        <a href="departments.php">Departments</a>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="images/patients3.svg" alt="patients icon">
                        </div>
                        <a href="patients.html">Patients</a>
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
                            <div class="title" style="opacity: .8;">
                               Revenue Collected
                            </div>
                            <div class="number" style="color: rgb(3, 163, 3);">
                                K502,509.00
                            </div>
                        </div>
                    </div>
                  
                    <div class="card">
                        <div class="card-left">
                            <div class="title" style="opacity: .8;">
                               Revenue Pending
                            </div>
                            <div class="number" style="color: #bca510;">
                                K304,689.89
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
                                <td>Doctor</td>
                                <td>Appointments</td>
                            </tr>

                            <tr>
                                <td>
                                    Dr. Stuart Sindani
                                </td>
                                <td>
                                    4
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Dr. Precious Mawaya
                                </td>
                                <td>
                                    3
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>