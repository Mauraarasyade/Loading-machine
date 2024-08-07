<?php
include_once("./koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $prioritas = $db->real_escape_string($_POST['prioritas']);

    if ($id && isset($prioritas)) {
        $query = "UPDATE data SET PRIORITAS='$prioritas' WHERE id=$id";
        $result = $db->query($query);

        if ($result) {
            echo "Success";
        } else {
            echo "Failed: " . $db->error;
        }
    } else {
        echo "Invalid data";
    }
}
?>