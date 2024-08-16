<?php
    include_once("./koneksi.php");

    $query = "SELECT * FROM wip";
    $result = mysqli_query($db, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($db));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN WIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="./index.css">
    <style>
        .no, .description, .nop, .qty, .ket, .pic, .cust, .start, .del, .remarks {
            min-width: 120px;
        }
        .schedule {
            min-width: 250px;
        }
        .action {
            min-width: 200px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">HALAMAN<span> WIP</span>.</a>
        <div class="navbar-nav">
            <div class="menu">
                <a href="./index.php">Home<i data-feather="home" class="home-item"></i></a>
            </div>
            <div class="add">
                <a href="./tambah-wip.php">Add Data<i data-feather="plus-square" class="home-item"></i></a>
            </div>
        </div>
        <div class="navbar-extra">
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <div class="container">
        <table class="table">
            <thead>
                <tr align="center">
                    <th scope="col" class="no">NO</th>
                    <th scope="col" class="description">DESCRIPTION</th>
                    <th scope="col" class="nop">NOP</th>
                    <th scope="col" class="qty">QTY</th>
                    <th scope="col" class="ket">KET</th>
                    <th scope="col" class="pic">PIC</th>
                    <th scope="col" class="cust">CUST</th>
                    <th scope="col" class="start">START</th>
                    <th scope="col" class="del">DEL PLAN</th>
                    <th scope="col" class="schedule">SCHEDULE PERCEPATAN</th>
                    <th scope="col" class="remarks">REMARKS</th>
                    <th scope="col" class="action">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        while ($wip = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr align="center">
                        <td class="no"><?php echo htmlspecialchars($wip["NO"]); ?></td>
                        <td class="description"><?php echo htmlspecialchars($wip["DESCRIPTION"]); ?></td>
                        <td class="nop"><?php echo htmlspecialchars($wip["NOP"]); ?></td>
                        <td class="qty"><?php echo htmlspecialchars($wip["QTY"]); ?></td>
                        <td class="ket"><?php echo htmlspecialchars($wip["KET"]); ?></td>
                        <td class="pic"><?php echo htmlspecialchars($wip["PIC"]); ?></td>
                        <td class="cust"><?php echo htmlspecialchars($wip["CUST"]); ?></td>
                        <td class="start"><?php echo htmlspecialchars($wip["START"]); ?></td>
                        <td class="del"><?php echo htmlspecialchars($wip["DEL_PLAN"]); ?></td>
                        <td class="schedule"><?php echo htmlspecialchars($wip["SCHEDULE_PERCEPATAN"]); ?></td>
                        <td class="remarks"><?php echo htmlspecialchars($wip["REMARKS"]); ?></td>
                        <td class="action">
                            <a class="btn btn-primary btn-sm" href="edit-wip.php?id=<?php echo $wip['id']; ?>">Edit</a>
                            <a class="btn btn-danger btn-sm my-1" href="hapus-wip.php?id=<?php echo $wip['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>feather.replace();</script>
    <script src="./style.js"></script>
</body>
</html>