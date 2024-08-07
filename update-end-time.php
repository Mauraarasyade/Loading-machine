<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $end_time = trim($_POST['END_TIME']);

        if (!empty($end_time)) {
            $end_time = mysqli_real_escape_string($db, $end_time);

            $query = mysqli_query($db, "UPDATE data SET END_TIME='$end_time' WHERE id=$id");

            if ($query) {
                echo "Success";
            } else {
                echo "Failed: " . mysqli_error($db);
            }
        } else {
            echo "End time cannot be empty.";
        }
    } else {
        echo "Invalid request method.";
    }
?>