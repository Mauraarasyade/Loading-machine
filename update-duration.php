<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $duration = trim($_POST['DURATION']);

        if (!empty($duration)) {
            $duration = mysqli_real_escape_string($db, $duration);
            $query = mysqli_query($db, "UPDATE data SET DURATION='$duration' WHERE id=$id");

            if ($query) {
                echo "Success";
            } else {
                echo "Failed: " . mysqli_error($db);
            }
        } else {
            echo "Duration cannot be empty.";
        }
    } else {
        echo "Invalid request method.";
    }
?>