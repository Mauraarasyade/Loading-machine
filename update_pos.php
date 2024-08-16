<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['ID']);
        $pos = trim($_POST['POS']);

        if (!empty($pos) && $id > 0) {
            $pos = mysqli_real_escape_string($db, $pos);
            $query = "UPDATE data SET POS='$pos' WHERE id=$id";
            $result = mysqli_query($db, $query);

            if ($result) {
                header('Location: data.php');
                exit;
            } else {
                echo "Update failed: " . mysqli_error($db);
            }
        } else {
            if (empty($pos)) {
                echo "POS cannot be empty.";
            }
            if ($id <= 0) {
                echo "Invalid ID.";
            }
        }
    } else {
        echo "Invalid request method.";
    }
?>