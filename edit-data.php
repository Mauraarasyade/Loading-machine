<?php
    include_once("./koneksi.php");

    $id = intval($_GET["id"]);

    $query_get_data = mysqli_query($db, "SELECT * FROM data WHERE id=$id");
    $data = mysqli_fetch_assoc($query_get_data);

    if (isset($_POST["submit"])) {
        $PART_NAME = mysqli_real_escape_string($db, $_POST["PART_NAME"]);
        $MATERIAL = mysqli_real_escape_string($db, $_POST["MATERIAL"]);
        $QTY = mysqli_real_escape_string($db, $_POST["QTY"]);
        $NOP = mysqli_real_escape_string($db, $_POST["NOP"]);
        $EST_HOURS = str_pad(intval($_POST["EST_HOURS"]), 2, '0', STR_PAD_LEFT);
        $EST_MINUTES = str_pad(intval($_POST["EST_MINUTES"]), 2, '0', STR_PAD_LEFT);
        $EST_SECONDS = str_pad(intval($_POST["EST_SECONDS"]), 2, '0', STR_PAD_LEFT);
        $EST = sprintf('%s:%s:%s', $EST_HOURS, $EST_MINUTES, $EST_SECONDS);
        $START_TIME_HOURS = str_pad(intval($_POST["START_TIME_HOURS"]), 2, '0', STR_PAD_LEFT);
        $START_TIME_MINUTES = str_pad(intval($_POST["START_TIME_MINUTES"]), 2, '0', STR_PAD_LEFT);
        $START_TIME_SECONDS = str_pad(intval($_POST["START_TIME_SECONDS"]), 2, '0', STR_PAD_LEFT);
        $START_TIME = sprintf('%s:%s:%s', $START_TIME_HOURS, $START_TIME_MINUTES, $START_TIME_SECONDS);
        $REMARK = mysqli_real_escape_string($db, $_POST["REMARK"]);
        $PRIORITAS = mysqli_real_escape_string($db, $_POST["PRIORITAS"]);

        $query = mysqli_query($db, "UPDATE data SET PART_NAME='$PART_NAME', MATERIAL='$MATERIAL', QTY='$QTY', NOP='$NOP', EST='$EST', START_TIME='$START_TIME',
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
            width: 240px;
        }
    </style>
</head>
<body>
    <div class="container form-container">
        <h1 class="my-4" align="center">FORM EDIT LOADING MACHINE</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="PART_NAME" class="form-label">PART NAME</label>
                <input required value="<?php echo htmlspecialchars($data['PART_NAME'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="PART_NAME" class="form-control" id="PART_NAME">
            </div>
            <div class="mb-3">
                <label for="MATERIAL" class="form-label">MATERIAL</label>
                <input required value="<?php echo htmlspecialchars($data['MATERIAL'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="MATERIAL" class="form-control" id="MATERIAL">
            </div>
            <div class="mb-3">
                <label for="QTY" class="form-label">QTY</label>
                <input required value="<?php echo htmlspecialchars($data['QTY'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="QTY" class="form-control" id="QTY">
            </div>
            <div class="mb-3">
                <label for="NOP" class="form-label">NOP</label>
                <input required value="<?php echo htmlspecialchars($data['NOP'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="NOP" class="form-control" id="NOP">
            </div>
            <div class="mb-3">
                <label for="EST" class="form-label">EST</label>
                <div class="form-inline">
                    <?php
                        $est = isset($data['EST']) ? explode(':', $data['EST']) : ['00', '00', '00'];
                        $est_hours = isset($est[0]) ? str_pad(intval($est[0]), 2, '0', STR_PAD_LEFT) : '00';
                        $est_minutes = isset($est[1]) ? str_pad(intval($est[1]), 2, '0', STR_PAD_LEFT) : '00';
                        $est_seconds = isset($est[2]) ? str_pad(intval($est[2]), 2, '0', STR_PAD_LEFT) : '00';
                    ?>
                    <div class="form-group">
                        <select required name="EST_HOURS" class="form-control" id="EST_HOURS">
                            <?php for ($i = 0; $i < 24; $i++): ?>
                                <option value="<?php echo sprintf('%02d', $i); ?>" <?php echo ($i == intval($est_hours)) ? 'selected' : ''; ?>>
                                    <?php echo sprintf('%02d', $i); ?> jam
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select required name="EST_MINUTES" class="form-control" id="EST_MINUTES">
                            <?php for ($i = 0; $i < 60; $i++): ?>
                                <option value="<?php echo sprintf('%02d', $i); ?>" <?php echo ($i == intval($est_minutes)) ? 'selected' : ''; ?>>
                                    <?php echo sprintf('%02d', $i); ?> menit
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select required name="EST_SECONDS" class="form-control" id="EST_SECONDS">
                            <?php for ($i = 0; $i < 60; $i++): ?>
                                <option value="<?php echo sprintf('%02d', $i); ?>" <?php echo ($i == intval($est_seconds)) ? 'selected' : ''; ?>>
                                    <?php echo sprintf('%02d', $i); ?> detik
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="START_TIME" class="form-label">START TIME</label>
                <div class="form-inline">
                    <?php
                        $start_time = isset($data['START_TIME']) ? explode(':', $data['START_TIME']) : ['00', '00', '00'];
                        $start_time_hours = isset($start_time[0]) ? str_pad(intval($start_time[0]), 2, '0', STR_PAD_LEFT) : '00';
                        $start_time_minutes = isset($start_time[1]) ? str_pad(intval($start_time[1]), 2, '0', STR_PAD_LEFT) : '00';
                        $start_time_seconds = isset($start_time[2]) ? str_pad(intval($start_time[2]), 2, '0', STR_PAD_LEFT) : '00';
                    ?>
                    <div class="form-group">
                        <select required name="START_TIME_HOURS" class="form-control" id="START_TIME_HOURS">
                            <?php for ($i = 0; $i < 24; $i++): ?>
                                <option value="<?php echo sprintf('%02d', $i); ?>" <?php echo ($i == intval($start_time_hours)) ? 'selected' : ''; ?>>
                                    <?php echo sprintf('%02d', $i); ?> jam
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select required name="START_TIME_MINUTES" class="form-control" id="START_TIME_MINUTES">
                            <?php for ($i = 0; $i < 60; $i++): ?>
                                <option value="<?php echo sprintf('%02d', $i); ?>" <?php echo ($i == intval($start_time_minutes)) ? 'selected' : ''; ?>>
                                    <?php echo sprintf('%02d', $i); ?> menit
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select required name="START_TIME_SECONDS" class="form-control" id="START_TIME_SECONDS">
                            <?php for ($i = 0; $i < 60; $i++): ?>
                                <option value="<?php echo sprintf('%02d', $i); ?>" <?php echo ($i == intval($start_time_seconds)) ? 'selected' : ''; ?>>
                                    <?php echo sprintf('%02d', $i); ?> detik
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="REMARK" class="form-label">REMARK</label>
                <input required value="<?php echo htmlspecialchars($data['REMARK'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="REMARK" class="form-control" id="REMARK">
            </div>
            <div class="mb-3">
                <label for="PRIORITAS" class="form-label">PRIORITAS</label>
                <input required value="<?php echo htmlspecialchars($data['PRIORITAS'], ENT_QUOTES, 'UTF-8'); ?>" type="text" name="PRIORITAS" class="form-control" id="PRIORITAS">
            </div>
            <button type="submit" name="submit" class="btn btn-danger my-5">Submit</button>
            <a class="btn btn-primary" href="./data.php">Kembali ke halaman data</a>
        </form>
    </div>
</body>
</html>