<?php
include_once("./koneksi.php");

$id = intval($_GET["id"]);

$query_get_wip = mysqli_query($db, "SELECT * FROM wip WHERE id=$id");
$wip = mysqli_fetch_assoc($query_get_wip);

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

    $query = mysqli_query($db, "UPDATE wip SET NO='$NO', DESCRIPTION='$DESCRIPTION', NOP='$NOP', QTY='$QTY', KET='$KET', PIC='$PIC', CUST='$CUST', START='$START', DEL_PLAN='$DEL_PLAN', SCHEDULE_PERCEPATAN='$SCHEDULE_PERCEPATAN', REMARKS='$REMARKS' WHERE id=$id");

    if ($query) {
        echo "
        <script>
            alert('Data wip Berhasil Diupdate');
            window.location.href='wip.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data wip Gagal Diupdate');
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
    <title>FORM EDIT LOADING MACHINE</title>
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
    <div class="container form-container">
        <h1 class="my-4 text-center">FORM EDIT WIP</h1>

        <form action="" method="POST">
                <div class="mb-3">
                    <label for="NO" class="form-label">NO</label>
                    <input required value="<?php echo htmlspecialchars($wip['NO'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="NO" class="form-control" id="NO">
                </div>
                <div class="mb-3">
                    <label for="DESCRIPTION" class="form-label">DESCRIPTION</label>
                    <input required value="<?php echo htmlspecialchars($wip['DESCRIPTION'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="DESCRIPTION" class="form-control" id="DESCRIPTION">
                </div>
                <div class="mb-3">
                    <label for="NOP" class="form-label">NOP</label>
                    <input required value="<?php echo htmlspecialchars($wip['NOP'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="NOP" class="form-control" id="NOP">
                </div>
                <div class="mb-3">
                    <label for="QTY" class="form-label">QTY</label>
                    <input required value="<?php echo htmlspecialchars($wip['QTY'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="QTY" class="form-control" id="QTY">
                </div>
                <div class="mb-3">
                    <label for="KET" class="form-label">KET</label>
                    <input required value="<?php echo htmlspecialchars($wip['KET'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="KET" class="form-control" id="KET">
                </div>
                <div class="mb-3">
                    <label for="PIC" class="form-label">PIC</label>
                    <input required value="<?php echo htmlspecialchars($wip['PIC'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="PIC" class="form-control" id="PIC">
                </div>
                <div class="mb-3">
                    <label for="CUST" class="form-label">CUST</label>
                    <input required value="<?php echo htmlspecialchars($wip['CUST'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="CUST" class="form-control" id="CUST">
                </div>
                <div class="mb-3">
                    <label for="START" class="form-label">START</label>
                    <input required value="<?php echo htmlspecialchars($wip['START'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="START" class="form-control" id="START">
                </div>
                <div class="mb-3">
                    <label for="DEL_PLAN" class="form-label">DEL PLAN</label>
                    <input required value="<?php echo htmlspecialchars($wip['DEL_PLAN'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="DEL_PLAN" class="form-control" id="DEL_PLAN">
                </div>
                <div class="mb-3">
                    <label for="SCHEDULE_PERCEPATAN" class="form-label">SCHEDULE PERCEPATAN</label>
                    <input required value="<?php echo htmlspecialchars($wip['SCHEDULE_PERCEPATAN'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="SCHEDULE_PERCEPATAN" class="form-control" id="SCHEDULE_PERCEPATAN">
                </div>
                <div class="mb-3">
                    <label for="REMARKS" class="form-label">REMARKS</label>
                    <input required value="<?php echo htmlspecialchars($wip['REMARKS'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="REMARKS" class="form-control" id="REMARKS">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-danger my-3">Submit</button>
                <a class="btn btn-primary" href="./wip.php">Kembali ke halaman wip</a>
            </div>
        </form>
    </div>
</body>
</html>
