<?php 
include 'db_connect.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$username_login_sql = "SELECT 
                        
";

//$username_login = $_SESSION[''];


$department_sql = " SELECT 
                        d.name AS dep_name,
                        d.description AS dep_description
                    FROM departments d

";

$output_dep = $conn->query($department_sql);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Departments Page">
        <title>DEPARTMENTS</title>
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
                    <!--<div class="stats">
                        <div class="card">
                            <div class="card-left">
                                <div class="title">
                                    Departments
                                </div>
                            </div>
                            <button class="add-bill">
                                <span>+</span><span>Add</span>
                            </button>
                        </div>
                    </div>-->

                    <div class="appointments">
                        <div class="title">
                            Departments
                        </div>

                        <div class="table">
                            <table>
                                <tr class="t-header">
                                    <td>Name</td>
                                    <td>Description</td>
                                    <!--<td>Head Doctor</td>
                                    <td>Total Doctors</td>
                                    <td>Total Nurses</td>
                                    <td>Actions</td>-->
                                </tr>
                                <?php while($row = $output_dep->fetch_assoc()){ ?>
                                <tr>
                                    <td><?php echo $row['dep_name']; ?></td>
                                    <td><?php echo $row['dep_description']; ?></td>
                                
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