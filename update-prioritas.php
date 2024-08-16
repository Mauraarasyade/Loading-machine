<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $prioritas = trim($_POST['prioritas']);

        if (!empty($prioritas)) {
            $prioritas = mysqli_real_escape_string($db, $prioritas);
            $query = mysqli_query($db, "UPDATE data SET PRIORITAS='$prioritas' WHERE id=$id");

            if ($query) {
                echo "Success";
            } else {
                echo "Failed: " . mysqli_error($db);
            }
        } else {
            echo "Prioritas cannot be empty.";
        }
    } else {
        echo "Invalid request method.";
    }
?>