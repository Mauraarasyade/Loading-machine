<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $status = trim($_POST['status']);

        if (!empty($status)) {
            $status = mysqli_real_escape_string($db, $status);

            $query = mysqli_query($db, "UPDATE data SET STATUS='$status' WHERE id=$id");

            if ($query) {
                echo "Success";
            } else {
                echo "Failed: " . mysqli_error($db);
            }
        } else {
            echo "Status cannot be empty.";
        }
    } else {
        echo "Invalid request method.";
    }
?>