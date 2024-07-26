<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $start_time = mysqli_real_escape_string($db, $_POST['START_TIME']);

        $query = mysqli_query($db, "UPDATE data SET START_TIME='$start_time' WHERE id=$id");

        if ($query) {
            echo "Success";
        } else {
            echo "Failed: " . mysqli_error($db);
        }
    }
?>