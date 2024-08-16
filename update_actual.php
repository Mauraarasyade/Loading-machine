<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['ID']);
        $actual_pos = trim($_POST['ACTUAL_POS']);

        $result = mysqli_query($db, "SELECT ACTUAL_POS FROM data WHERE id=$id");
        $row = mysqli_fetch_assoc($result);
        $current_pos = $row['ACTUAL_POS'];
        $current_pos_array = explode(',', $current_pos);

        if (!in_array($actual_pos, $current_pos_array)) {
            if (!empty($current_pos)) {
                $updated_pos = $current_pos . ',' . $actual_pos;
            } else {
                $updated_pos = $actual_pos;
            }

            $query = mysqli_query($db, "UPDATE data SET ACTUAL_POS='$updated_pos' WHERE id=$id");

            if ($query) {
                header('Location: data.php');
                exit;
            } else {
                echo "Failed: " . mysqli_error($db);
            }
        } else {
            header('Location: data.php');
            exit;
        }
    } else {
        echo "Invalid request method.";
    }
?>