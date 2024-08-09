<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $process = isset($_POST['PROCESS']) ? mysqli_real_escape_string($db, $_POST['PROCESS']) : null;
            $machine = isset($_POST['MACHINE']) ? mysqli_real_escape_string($db, $_POST['MACHINE']) : null;

            if ($process) {
                $query = "UPDATE data SET PROCESS='$process' WHERE id='$id'";
            } elseif ($machine) {
                $query = "UPDATE data SET MACHINE='$machine' WHERE id='$id'";
            } else {
                echo 'Required data is missing';
                exit;
            }

            if (mysqli_query($db, $query)) {
                header('Location: data.php');
                exit;
            } else {
                echo 'Error: ' . mysqli_error($db);
            }
        } else {
            echo 'Required data is missing';
        }
    } else {
        echo 'Invalid request method';
    }
?>