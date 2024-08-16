<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['id']) && isset($_POST['nop'])) {
            $id = intval($_POST['id']);
            $nop = mysqli_real_escape_string($db, $_POST['nop']);

            if (!empty($nop)) {
                $query = "UPDATE data SET NOP='$nop' WHERE id='$id'";

                if (mysqli_query($db, $query)) {
                    header('Location: data.php');
                    exit;
                } else {
                    echo 'Error: ' . mysqli_error($db);
                }
                
            } else {
                echo 'NOP tidak boleh kosong.';
            }
        } else {
            echo 'Data yang diperlukan tidak ada.';
        }
    } else {
        echo 'Metode request tidak valid.';
    }
?>