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

                            <tr>
                                <td>
                                    Stuart Sindani
                                </td>
                                <td>
                                    K12,350
                                </td>
                                <td>
                                    X-ray and Urine analysis
                                </td>
                                <td>
                                    <div class="status" style="color: rgb(101, 101, 233);">
                                        pending
                                    </div>
                                </td>
                                <td>
                                    2026-05-08
                                </td>
                                <td class="edit-delete-icons">
                                    <img src="images/edit.svg" alt="edit image">
                                    <img src="images/bin.svg" alt="bin image">
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    John Doe
                                </td>
                                <td>
                                    K7,350
                                </td>
                                <td>
                                    Consultation
                                </td>
                                <td>
                                    <div class="status" style="background: rgb(223, 255, 223);color:rgb(3, 163, 3);">
                                        Paid
                                    </div>
                                </td>
                                <td>
                                    2026-05-05
                                </td>
                                <td class="edit-delete-icons">
                                    <img src="images/edit.svg" alt="edit image">
                                    <img src="images/bin.svg" alt="bin image">
                                </td>
                            </tr>
                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>