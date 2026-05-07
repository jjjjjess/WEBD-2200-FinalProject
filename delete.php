<?php
    session_start();
    require_once('db_connect.php');

    // $conn = mysqli_connect('localhost', "root", '', 'hospital_sys',3307);

    // 2. Check if the connection worked
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        if(isset($_GET['id']) && isset($_GET['table'])){
            $id = $_GET['id'];
            $type = $_GET['table'];

            $sql = " DELETE FROM $type WHERE id = $id";

            $result = mysqli_query($conn, $sql);

            $_SESSION['op_success'] = $result ? true : false;
            header('location:billing.php');
            exit();

        }
    }

    