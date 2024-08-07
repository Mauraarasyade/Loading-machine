<?php
    include_once("./koneksi.php");

    if (isset($_POST["submit"])) {
        $PART_NAME = $_POST["PART_NAME"];
        $MATERIAL = $_POST["MATERIAL"];
        $POS = $_POST["POS"];
        $QTY = $_POST["QTY"];
        $NOP = $_POST["NOP"];
        $EST_HOURS = str_pad(intval($_POST["EST_HOURS"]), 2, '0', STR_PAD_LEFT);
        $EST_MINUTES = str_pad(intval($_POST["EST_MINUTES"]), 2, '0', STR_PAD_LEFT);
        $EST_SECONDS = str_pad(intval($_POST["EST_SECONDS"]), 2, '0', STR_PAD_LEFT);
        $EST = sprintf('%s:%s:%s', $EST_HOURS, $EST_MINUTES, $EST_SECONDS);
        $REMARK = $_POST["REMARK"];
        $PRIORITAS = $_POST["PRIORITAS"];

        $query = mysqli_query($db, "INSERT INTO data (PART_NAME, MATERIAL, POS, QTY, NOP, EST, REMARK, PRIORITAS)
        VALUES ('$PART_NAME', '$MATERIAL', '$POS', '$QTY', '$NOP', '$EST', '$REMARK', '$PRIORITAS')");
        
        if ($query) {
            echo "
            <script>
                alert('Data Berhasil Di simpan');
                window.location.href='data.php';
            </script>";
        } else {
            echo "<script>
            alert('Data Gagal Di simpan');
            window.location.href='data.php';
            </script>" . mysqli_error($db);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM TAMBAH LOADING MACHINE</title>
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
            width: 240px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="text-center">FORM TAMBAH LOADING MACHINE</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="PART_NAME" class="form-label">PART NAME</label>
                    <input required type="text" name="PART_NAME" class="form-control" id="PART_NAME">
                </div>
                <div class="mb-3">
                    <label for="MATERIAL" class="form-label">MATERIAL</label>
                    <input required type="text" name="MATERIAL" class="form-control" id="MATERIAL">
                </div>
                <div class="mb-3">
                    <label for="POS" class="form-label">POS</label>
                    <input required type="text" name="POS" class="form-control" id="POS">
                </div>
                <div class="mb-3">
                    <label for="QTY" class="form-label">QTY</label>
                    <input required type="text" name="QTY" class="form-control" id="QTY">
                </div>
                <div class="mb-3">
                    <label for="NOP" class="form-label">NOP</label>
                    <input required type="text" name="NOP" class="form-control" id="NOP">
                </div>
                <div class="mb-3">
                    <label for="EST" class="form-label">EST</label>
                    <div class="form-inline">
                        <div class="form-group">
                            <select required name="EST_HOURS" class="form-control" id="EST_HOURS">
                                <?php for ($i = 0; $i < 24; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo sprintf('%2d', $i); ?> jam</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select required name="EST_MINUTES" class="form-control" id="EST_MINUTES">
                                <?php for ($i = 0; $i < 60; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo sprintf('%2d', $i); ?> menit</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select required name="EST_SECONDS" class="form-control" id="EST_SECONDS">
                                <?php for ($i = 0; $i < 60; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo sprintf('%2d', $i); ?> detik</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="REMARK" class="form-label">REMARK</label>
                    <input required type="text" name="REMARK" class="form-control" id="REMARK">
                </div>
                <div class="mb-3">
                    <label for="PRIORITAS" class="form-label">PRIORITAS</label>
                    <input required type="text" name="PRIORITAS" class="form-control" id="PRIORITAS">
                </div>
                <button type="submit" name="submit" class="btn btn-danger my-5">Submit</button>
                <a class="btn btn-primary" href="./data.php">Kembali ke halaman data</a>
            </form>
        </div>
    </div>
</body>
</html>