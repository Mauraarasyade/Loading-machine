<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $date = trim($_POST['DATE']);

        if (!empty($date)) {
            $date = mysqli_real_escape_string($db, $date);
            $query = mysqli_query($db, "UPDATE data SET DATE='$date' WHERE id=$id");

            if ($query) {
                echo "Success";
            } else {
                echo "Failed: " . mysqli_error($db);
            }
        } else {
            echo "Date cannot be empty.";
        }
    }
?>