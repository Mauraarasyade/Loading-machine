<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $end_time = mysqli_real_escape_string($db, $_POST['END_TIME']);

        $query = mysqli_query($db, "UPDATE data SET END_TIME='$end_time' WHERE id=$id");

        if ($query) {
            echo "Success";
        } else {
            echo "Failed: " . mysqli_error($db);
        }
    }
?>
