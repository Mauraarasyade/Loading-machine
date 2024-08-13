<?php
    include_once("./koneksi.php");

    if (isset($_POST["submit"])) {
        $NO = mysqli_real_escape_string($db, $_POST["NO"]);
        $DESCRIPTION = mysqli_real_escape_string($db, $_POST["DESCRIPTION"]);
        $NOP = mysqli_real_escape_string($db, $_POST["NOP"]);
        $QTY = mysqli_real_escape_string($db, $_POST["QTY"]);
        $KET = mysqli_real_escape_string($db, $_POST["KET"]);
        $PIC = mysqli_real_escape_string($db, $_POST["PIC"]);
        $CUST = mysqli_real_escape_string($db, $_POST["CUST"]);
        $START = mysqli_real_escape_string($db, $_POST["START"]);
        $DEL_PLAN = mysqli_real_escape_string($db, $_POST["DEL_PLAN"]);
        $SCHEDULE_PERCEPATAN = mysqli_real_escape_string($db, $_POST["SCHEDULE_PERCEPATAN"]);
        $REMARKS = mysqli_real_escape_string($db, $_POST["REMARKS"]);
        
        $query = mysqli_query($db, "INSERT INTO wip (NO, DESCRIPTION, NOP, QTY, KET, PIC, CUST, START, DEL_PLAN, SCHEDULE_PERCEPATAN, REMARKS)
                                VALUES ('$NO', '$DESCRIPTION', '$NOP', '$QTY', '$KET', '$PIC', '$CUST', '$START', '$DEL_PLAN', '$SCHEDULE_PERCEPATAN', '$REMARKS')");

        if ($query) {
            echo "
            <script>
                alert('Data wip Berhasil Disimpan');
                window.location.href='wip.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data wip Gagal Disimpan: " . mysqli_error($db) . "');
                window.location.href='wip.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM TAMBAH WIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-container {
            margin: 0 auto;
            padding: 20px;
            max-width: 800px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h1 class="my-4 text-center">FORM TAMBAH WIP</h1>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="NO" class="form-label">NO</label>
                    <input required type="text" name="NO" class="form-control" id="NO">
                </div>
                <div class="mb-3">
                    <label for="DESCRIPTION" class="form-label">DESCRIPTION</label>
                    <input required type="text" name="DESCRIPTION" class="form-control" id="DESCRIPTION">
                </div>
                <div class="mb-3">
                    <label for="NOP" class="form-label">NOP</label>
                    <input required type="text" name="NOP" class="form-control" id="NOP">
                </div>
                <div class="mb-3">
                    <label for="QTY" class="form-label">QTY</label>
                    <input required type="text" name="QTY" class="form-control" id="QTY">
                </div>
                <div class="mb-3">
                    <label for="KET" class="form-label">KET</label>
                    <input required type="text" name="KET" class="form-control" id="KET">
                </div>
                <div class="mb-3">
                    <label for="PIC" class="form-label">PIC</label>
                    <input required type="text" name="PIC" class="form-control" id="PIC">
                </div>
                <div class="mb-3">
                    <label for="CUST" class="form-label">CUST</label>
                    <input required type="text" name="CUST" class="form-control" id="CUST">
                </div>
                <div class="mb-3">
                    <label for="START" class="form-label">START</label>
                    <input required type="text" name="START" class="form-control" id="START">
                </div>
                <div class="mb-3">
                    <label for="DEL_PLAN" class="form-label">DEL PLAN</label>
                    <input required type="text" name="DEL_PLAN" class="form-control" id="DEL_PLAN">
                </div>
                <div class="mb-3">
                    <label for="SCHEDULE_PERCEPATAN" class="form-label">SCHEDULE PERCEPATAN</label>
                    <input required type="text" name="SCHEDULE_PERCEPATAN" class="form-control" id="SCHEDULE_PERCEPATAN">
                </div>
                <div class="mb-3">
                    <label for="REMARKS" class="form-label">REMARKS</label>
                    <input required type="text" name="REMARKS" class="form-control" id="REMARKS">
                </div>
                <button type="submit" name="submit" class="btn btn-danger my-5">Submit</button>
                <a class="btn btn-primary" href="./wip.php">Kembali ke halaman wip</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
