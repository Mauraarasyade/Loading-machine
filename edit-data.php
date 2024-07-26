<?php
    include_once("./koneksi.php");

    $id = intval($_GET["id"]);

    $query_get_data = mysqli_query($db, "SELECT * FROM data WHERE id=$id");
    $data = mysqli_fetch_assoc($query_get_data);

    if (isset($_POST["submit"])) {
        $PART_NAME = mysqli_real_escape_string($db, $_POST["PART_NAME"]);
        $MATERIAL = mysqli_real_escape_string($db, $_POST["MATERIAL"]);
        $POS = mysqli_real_escape_string($db, $_POST["POS"]);
        $QTY = mysqli_real_escape_string($db, $_POST["QTY"]);
        $NOP = mysqli_real_escape_string($db, $_POST["NOP"]);
        $EST_HOURS = intval($_POST["EST_HOURS"]);
        $EST_MINUTES = intval($_POST["EST_MINUTES"]);
        $EST = sprintf('%d jam, %d menit', $EST_HOURS, $EST_MINUTES);
        $REMARK = mysqli_real_escape_string($db, $_POST["REMARK"]);
        $PRIORITAS = mysqli_real_escape_string($db, $_POST["PRIORITAS"]);

        $query = mysqli_query($db, "UPDATE data SET PART_NAME='$PART_NAME', MATERIAL='$MATERIAL', POS='$POS', QTY='$QTY', NOP='$NOP', EST='$EST', 
                                    REMARK='$REMARK', PRIORITAS='$PRIORITAS' WHERE id=$id");

        if ($query) {
            echo "
            <script>
                alert('Data Berhasil Diupdate');
                window.location.href='data.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data Gagal Diupdate');
                window.location.href='data.php';
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
        .form-group {
            margin-bottom: 1rem;
        }
        .form-control {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }
        .form-inline .form-group {
            display: inline-block;
            margin-right: 10px;
        }
        .form-inline select {
            width: 367px;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <h1 class="my-4" align="center">FORM EDIT LOADING MACHINE</h1>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="PART_NAME" class="form-label">PART NAME</label>
                <input required value="<?php echo $data['PART_NAME']; ?>" type="text" name="PART_NAME" class="form-control" id="PART_NAME">
            </div>
            <div class="mb-3">
                <label for="MATERIAL" class="form-label">MATERIAL</label>
                <input required value="<?php echo $data['MATERIAL']; ?>" type="text" name="MATERIAL" class="form-control" id="MATERIAL">
            </div>
            <div class="mb-3">
                <label for="POS" class="form-label">POS</label>
                <input required value="<?php echo $data['POS']; ?>" type="text" name="POS" class="form-control" id="POS">
            </div>
            <div class="mb-3">
                <label for="QTY" class="form-label">QTY</label>
                <input required value="<?php echo $data['QTY']; ?>" type="text" name="QTY" class="form-control" id="QTY">
            </div>
            <div class="mb-3">
                <label for="NOP" class="form-label">NOP</label>
                <input required value="<?php echo $data['NOP']; ?>" type="text" name="NOP" class="form-control" id="NOP">
            </div>
            <div class="mb-3">
                <label for="EST" class="form-label">EST</label>
                <div class="form-inline">
                    <div class="form-group">
                        <select required name="EST_HOURS" class="form-control" id="EST_HOURS">
                            <?php for ($i = 0; $i <= 1000; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php if ($i == intval(explode(' ', $data['EST'])[0])) echo 'selected'; ?>><?php echo $i; ?> jam</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select required name="EST_MINUTES" class="form-control" id="EST_MINUTES">
                            <?php for ($i = 0; $i < 60; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php if ($i == intval(explode(' ', $data['EST'])[2])) echo 'selected'; ?>><?php echo $i; ?> menit</option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="REMARK" class="form-label">REMARK</label>
                <input required value="<?php echo $data['REMARK']; ?>" type="text" name="REMARK" class="form-control" id="REMARK">
            </div>
            <div class="mb-3">
                <label for="PRIORITAS" class="form-label">PRIORITAS</label>
                <input required value="<?php echo $data['PRIORITAS']; ?>" type="text" name="PRIORITAS" class="form-control" id="PRIORITAS">
            </div>

            <button type="submit" name="submit" class="btn btn-danger my-5">Submit</button>
            <a class="btn btn-primary" href="./data.php">Kembali ke halaman data</a>
        </form>
    </div>
</body>
</html>
