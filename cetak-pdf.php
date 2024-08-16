<?php
    include_once("./koneksi.php");

    $processFilter = isset($_GET['process']) ? $_GET['process'] : '';
    $machineFilter = isset($_GET['machine']) ? $_GET['machine'] : '';
    $nopFilter = isset($_GET['nop']) ? $_GET['nop'] : '';

    $query = "SELECT * FROM data WHERE 1=1";
    if ($processFilter != '') {
        $query .= " AND PROCESS='$processFilter'";
    }
    if ($machineFilter != '' && $machineFilter != 'all') {
        $query .= " AND MACHINE='$machineFilter'";
    }
    if ($nopFilter != '' && $nopFilter != 'all') {
        $query .= " AND NOP='$nopFilter'";
    }
    $query .= " ORDER BY PRIORITAS DESC, id ASC";
    $result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <div class="container w-10">
        <h1 class="my-4" align="center">LAPORAN LOADING MACHINE</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">PROCESS</th>
                    <th scope="col">MACHINE</th>
                    <th scope="col">PART NAME</th>
                    <th scope="col">MATERIAL</th>
                    <th scope="col">POS</th>
                    <th scope="col">ACTUAL POS</th>
                    <th scope="col">QTY</th>
                    <th scope="col">NOP</th>
                    <th scope="col">EST</th>
                    <th scope="col">DATE</th>
                    <th scope="col">START TIME</th>
                    <th scope="col">END TIME</th>
                    <th scope="col">DURATION</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">REMARK</th>
                    <th scope="col">PRIORITAS</th>
                </tr>
            </thead>
            <tbody>
                <?php while($data = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $data["PROCESS"] ?></td>
                        <td><?php echo $data["MACHINE"] ?></td>
                        <td><?php echo $data["PART_NAME"] ?></td>
                        <td><?php echo $data["MATERIAL"] ?></td>
                        <td><?php echo $data["POS"] ?></td>
                        <td><?php echo $data["ACTUAL_POS"] ?></td>
                        <td><?php echo $data["QTY"] ?></td>
                        <td><?php echo $data["NOP"] ?></td>
                        <td><?php echo $data["EST"] ?></td>
                        <td><?php echo $data["DATE"] ?></td>
                        <td><?php echo $data["START_TIME"] ?></td>
                        <td><?php echo $data["END_TIME"] ?></td>
                        <td><?php echo $data["DURATION"] ?></td>
                        <td><?php echo $data["STATUS"] ?></td>
                        <td><?php echo $data["REMARK"] ?></td>
                        <td><?php echo $data["PRIORITAS"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">window.print();</script>
</body>
</html>
