<?php

    include_once("./koneksi.php");

    $id = $_GET["id"];

    $query = mysqli_query($db, "DELETE FROM wip WHERE id=$id");

    header("Location: wip.php");