<?php

    include_once("./koneksi.php");

    $id = $_GET["id"];

    $query = mysqli_query($db, "DELETE FROM data WHERE id=$id");

    header("Location: data.php");