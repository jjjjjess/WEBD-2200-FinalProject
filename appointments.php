<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="appointments.css">
        <title>Appointments</title>
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
                    Appointment Scheduling
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
                    <button onclick="return confirm('Are you sure you want to log out?')">
                        <div class="icon">
                            <img src="images/logout2.svg" alt="logout icon">
                        </div>
                        <a style="text-decoration: none; color: #1D293D;" href="dashboardLogout.php">Logout</a>
                    </button>
                </div>     
            </div>
        <div class="appointments">
                    <div class="title">
                        Book Appointment
                    </div>

                    <div class="table">
                        <form method="POST" action="process_appointment.php">
                        <table>
                            <tr class="t-header">
                                <td>Patient ID </td>
                                <td>Full Name</td>
                                <td>Date of Birth</td>
                                <td>Department</td>
                                <td>Date</td>
                                <td>Time</td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="text" id="id" required>
                                </td>
                                <td>
                                    <input type="text" required id="fname">
                                </td>
                                <td>
                                    <input type="date" id="DOB" required>
                                </td>
                                <td>
                                    <select id="department" required>
                                        <option placeholder>Select a department</option>
                                        <option>Cardiology</option>
                                        <option>Pediatrics</option>
                                        <option>Emergency</option>
                                        <option>General Ward</option>
                                        <option>Maternity</option>
                                        <option>Neurology</option>
                                        <option>Orthopedics</option>
                                        <option>General Medicine</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="date" id="date" required>
                                </td>
                                <td>
                                    <select id="time" required>
                                        <option placeholder>Select a time</option>
                                        <option>08:00 - 09:00</option>
                                        <option>09:00 - 10:00</option>
                                        <option>10:00 - 11:00</option>
                                        <option>11:00 - 12:00</option>
                                        <option>13:00 - 14:00</option>
                                        <option>14:00 - 15:00</option>
                                        <option>15:00 - 16:00</option>
                                        <option>16:00 - 17:00</option>
                                    </select>
                                </td>
                                </tr>
                        </table>
                    
                        <button type="submit" value="Confirm Booking">
                            Confirm Booking
                        </button>
                        <button type="reset" value="Clear">
                            Clear
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>