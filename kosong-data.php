<?php
    include_once("./koneksi.php");

    $processFilter = isset($_GET['process']) ? mysqli_real_escape_string($db, $_GET['process']) : '';
    $machineFilter = isset($_GET['machine']) ? mysqli_real_escape_string($db, $_GET['machine']) : '';
    $nopFilter = isset($_GET['nop']) ? mysqli_real_escape_string($db, $_GET['nop']) : '';

    $query = "SELECT * FROM data WHERE START_TIME = '00:00:00' AND END_TIME = '00:00:00'";

    if ($processFilter) {
        $query .= " AND PROCESS = '$processFilter'";
    }
    if ($machineFilter) {
        $query .= " AND MACHINE = '$machineFilter'";
    }
    if ($nopFilter) {
        $query .= " AND NOP = '$nopFilter'";
    }

    $query .= " ORDER BY PRIORITAS DESC, id ASC";
    $result = mysqli_query($db, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($db));
    }
    
    $queryNops = "SELECT DISTINCT NOP FROM wip";
    $resultNops = mysqli_query($db, $queryNops);
    if (!$resultNops) {
        die("Query Error: " . mysqli_error($db));
    }

    $nops = [];
    while ($row = mysqli_fetch_assoc($resultNops)) {
        $nops[] = $row['NOP'];
    }

    $queryWip = "SELECT * FROM wip";
    $resultWip = mysqli_query($db, $queryWip);
    if (!$resultWip) {
        die("Query Error: " . mysqli_error($db));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN EMPTY DATA TIME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="./index.css">
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Empty<span> Data Time</span>.</a>
        <div class="navbar-nav">
            <div class="menu">
                <a href="./index.php">Home<i data-feather="home" class="home-item"></i></a>
            </div>
            <div class="data">
                <a href="./data.php">Data<i data-feather="archive" class="archive-item"></i></a>
            </div>
            <div class="add">
                <a href="./tambah-data.php">Add Data<i data-feather="plus-square" class="home-item"></i></a>
            </div>
            <div class="process">
                <a href="./progres.php">Process<i data-feather="clock" class="home-item"></i></a>
            </div>
            <div class="arsip">
                <a href="./arsip.php">Archive<i data-feather="archive" class="archive-item"></i></a>
            </div>
            <div class="excel">
                <a href="excel-kosong.php?<?php echo http_build_query($_GET); ?>" target="_blank">Download Excel<i data-feather="table" class="excel-item"></i></a>
            </div>
            <div class="word">
                <a href="pdf-kosong.php?<?php echo http_build_query($_GET); ?>" target="_blank">Download Word<i data-feather="file-text" class="word-item"></i></a>
            </div>
        </div>
        <div class="navbar-extra">
            <a href="#" id="filter-button" class="filter"><i data-feather="filter"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
        <div class="filter-form">
            <label for="filter-box">
                <form class="box mb-3" method="GET">
                    <div class="mb-3">
                        <label for="processFilter" class="form-label">Filter PROCESS</label>
                        <select id="processFilter" name="process" class="form-control">
                            <option value="">--- All PROCESS ---</option>
                            <option value="BUBUT" <?php if($processFilter == 'BUBUT') echo 'selected'; ?>>BUBUT</option>
                            <option value="CNC" <?php if($processFilter == 'CNC') echo 'selected'; ?>>CNC</option>
                            <option value="EDM" <?php if($processFilter == 'EDM') echo 'selected'; ?>>EDM</option>
                            <option value="MANUAL" <?php if($processFilter == 'MANUAL') echo 'selected'; ?>>MANUAL</option>
                            <option value="WIRECUT" <?php if($processFilter == 'WIRECUT') echo 'selected'; ?>>WIRECUT</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="machineFilter" class="form-label">Filter MACHINE</label>
                        <select id="machineFilter" name="machine" class="form-control">
                            <option value="">--- All MACHINE ---</option>
                            <option value="GMC 1" <?php if($machineFilter == 'GMC 1') echo 'selected'; ?>>GMC 1</option>
                            <option value="GMC 2" <?php if($machineFilter == 'GMC 2') echo 'selected'; ?>>GMC 2</option>
                            <option value="GMC 3" <?php if($machineFilter == 'GMC 3') echo 'selected'; ?>>GMC 3</option>
                            <option value="GMC 6" <?php if($machineFilter == 'GMC 6') echo 'selected'; ?>>GMC 6</option>
                            <option value="GMC 7" <?php if($machineFilter == 'GMC 7') echo 'selected'; ?>>GMC 7</option>
                            <option value="GMC 8" <?php if($machineFilter == 'GMC 8') echo 'selected'; ?>>GMC 8</option>
                            <option value="GMC 9" <?php if($machineFilter == 'GMC 9') echo 'selected'; ?>>GMC 9</option>
                            <option value="GMC 10" <?php if($machineFilter == 'GMC 10') echo 'selected'; ?>>GMC 10</option>
                            <option value="GMC 11" <?php if($machineFilter == 'GMC 11') echo 'selected'; ?>>GMC 11</option>
                            <option value="GMC 12" <?php if($machineFilter == 'GMC 12') echo 'selected'; ?>>GMC 12</option>
                            <option value="GMC 13" <?php if($machineFilter == 'GMC 13') echo 'selected'; ?>>GMC 13</option>
                            <option value="GMC 14" <?php if($machineFilter == 'GMC 14') echo 'selected'; ?>>GMC 14</option>
                            <option value="GMC 15" <?php if($machineFilter == 'GMC 15') echo 'selected'; ?>>GMC 15</option>
                            <option value="GMC 16" <?php if($machineFilter == 'GMC 16') echo 'selected'; ?>>GMC 16</option>
                            <option value="GMC 17" <?php if($machineFilter == 'GMC 17') echo 'selected'; ?>>GMC 17</option>
                            <option value="GMC 18" <?php if($machineFilter == 'GMC 18') echo 'selected'; ?>>GMC 18</option>
                            <option value="GMC 19" <?php if($machineFilter == 'GMC 19') echo 'selected'; ?>>GMC 19</option>
                            <option value="GEC 1" <?php if($machineFilter == 'GEC 1') echo 'selected'; ?>>GEC 1</option>
                            <option value="GEC 2" <?php if($machineFilter == 'GEC 2') echo 'selected'; ?>>GEC 2</option>
                            <option value="GEC 3" <?php if($machineFilter == 'GEC 3') echo 'selected'; ?>>GEC 3</option>
                            <option value="GEC 4" <?php if($machineFilter == 'GEC 4') echo 'selected'; ?>>GEC 4</option>
                            <option value="GEC 5" <?php if($machineFilter == 'GEC 5') echo 'selected'; ?>>GEC 5</option>
                            <option value="GEC 6" <?php if($machineFilter == 'GEC 6') echo 'selected'; ?>>GEC 6</option>
                            <option value="GEC 7" <?php if($machineFilter == 'GEC 7') echo 'selected'; ?>>GEC 7</option>
                            <option value="GEC 8" <?php if($machineFilter == 'GEC 8') echo 'selected'; ?>>GEC 8</option>
                            <option value="GEC 9" <?php if($machineFilter == 'GEC 9') echo 'selected'; ?>>GEC 9</option>
                            <option value="GDC 1" <?php if($machineFilter == 'GDC 1') echo 'selected'; ?>>GDC 1</option>
                            <option value="GDC 2" <?php if($machineFilter == 'GDC 2') echo 'selected'; ?>>GDC 2</option>
                            <option value="GDC 3" <?php if($machineFilter == 'GDC 3') echo 'selected'; ?>>GDC 3</option>
                            <option value="GDC 4" <?php if($machineFilter == 'GDC 4') echo 'selected'; ?>>GDC 4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nopFilter" class="form-label">Filter NOP</label>
                        <select id="nopFilter" name="nop" class="form-control">
                            <option value="">--- All NOP ---</option>
                            <?php foreach ($nops as $nop) : ?>
                                <option value="<?php echo $nop; ?>" <?php if($nopFilter == $nop) echo 'selected'; ?>><?php echo $nop; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="submit-container">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </label>
        </div>
    </nav>
    <div class="container">
        <table class="table">
            <thead>
                <tr align="center">
                    <th scope="col" class="process">PROCESS</th>
                    <th scope="col" class="machine">MACHINE</th>
                    <th scope="col" class="part">PART NAME</th>
                    <th scope="col" class="material">MATERIAL</th>
                    <th scope="col" class="pos">POS</th>
                    <th scope="col" class="actual">ACTUAL POS</th>
                    <th scope="col" class="qty">QTY</th>
                    <th scope="col" class="nop">NOP</th>
                    <th scope="col" class="est">EST</th>
                    <th scope="col" class="date">DATE</th>
                    <th scope="col" class="start">START TIME</th>
                    <th scope="col" class="end">END TIME</th>
                    <th scope="col" class="duration">DURATION</th>
                    <th scope="col" class="status">STATUS</th>
                    <th scope="col" class="remark">REMARK</th>
                    <th scope="col" class="prioritas">PRIORITAS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($result as $data) {
                        $durationParts = explode(':', $data["DURATION"]);
                        $durationHours = !empty($durationParts[0]) ? intval($durationParts[0]) : 0;
                        $durationMinutes = !empty($durationParts[1]) ? intval($durationParts[1]) : 0;
                        $durationSeconds = !empty($durationParts[2]) ? intval($durationParts[2]) : 0;

                        $estParts = explode(':', $data["EST"]);
                        $estHours = !empty($estParts[0]) ? intval($estParts[0]) : 0;
                        $estMinutes = !empty($estParts[1]) ? intval($estParts[1]) : 0;
                        $estSeconds = !empty($estParts[2]) ? intval($estParts[2]) : 0;

                        $durationTotalSeconds = ($durationHours * 3600) + ($durationMinutes * 60) + $durationSeconds;
                        $estTotalSeconds = ($estHours * 3600) + ($estMinutes * 60) + $estSeconds;

                        $diffSeconds = $durationTotalSeconds - $estTotalSeconds;
                        $absDiffSeconds = abs($diffSeconds);
                        $diffHours = floor($absDiffSeconds / 3600);
                        $diffMinutes = floor(($absDiffSeconds % 3600) / 60);
                        $diffSecondsFinal = $absDiffSeconds % 60;

                        if ((empty($data["START_TIME"]) || $data["START_TIME"] === '00:00:00') && (empty($data["END_TIME"]) || $data["END_TIME"] === '00:00:00')) {
                            $statusClass = 'status-red';
                            $statusText = "Belum Diproses";
                        } elseif (!empty($data["START_TIME"]) && (empty($data["END_TIME"]) || $data["END_TIME"] === '00:00:00')) {
                            $statusClass = 'status-green';
                            $statusText = "Sedang Diproses";
                        } elseif (!empty($data["START_TIME"]) && !empty($data["END_TIME"])) {
                            if ($diffSeconds > 0) {
                                $statusClass = 'status-red';
                                $statusText = "WAKTU LEBIH <br> $diffHours jam, $diffMinutes menit,<br> $diffSecondsFinal detik";
                            } elseif ($diffSeconds < 0) {
                                $statusClass = 'status-green';
                                $statusText = "WAKTU KURANG <br> $diffHours jam, $diffMinutes menit,<br> $diffSecondsFinal detik";
                            } else {
                                $statusClass = 'status-neutral';
                                $statusText = "WAKTU CUKUP";
                            }
                        } else {
                            $statusClass = 'status-red';
                            $statusText = "Status Tidak Diketahui";
                        }
                    ?>
                    <tr>
                        <td class="process"><?php echo htmlspecialchars($data["PROCESS"]); ?></td>
                        <td class="machine"><?php echo htmlspecialchars($data["MACHINE"]); ?></td>
                        <td class="part"><?php echo htmlspecialchars($data["PART_NAME"]); ?></td>
                        <td class="material"><?php echo htmlspecialchars($data["MATERIAL"]); ?></td>
                        <td class="pos"><?php echo htmlspecialchars($data["POS"]); ?></td>
                        <td class="actual"><?php echo htmlspecialchars($data["ACTUAL_POS"]); ?></td>
                        <td class="qty"><?php echo htmlspecialchars($data["QTY"]); ?></td>
                        <td class="nop"><?php echo htmlspecialchars($data["NOP"]); ?></td>
                        <td class="est" data-field="est"><?php echo htmlspecialchars($data["EST"]); ?></td>
                        <td class="date">
                            <input type="date" name="DATE" class="form-control" data-id="<?php echo $data["id"]; ?>" value="<?php echo date('Y-m-d', strtotime($data['DATE'])); ?>">
                        </td>
                        <td class="start-time">
                            <input type="hidden" name="START_TIME" class="form-control" data-id="<?php echo $data['id']; ?>" value="<?php echo date('H:i:s', strtotime($data['START_TIME'])); ?>">
                            <button id="startButton<?php echo $data['id']; ?>" class="btn-action start-button" type="button" data-id="<?php echo $data['id']; ?>" onclick="updateStartTime(<?php echo $data['id']; ?>)">
                                <i data-feather="play-circle"></i>
                            </button>
                            <span id="startTime<?php echo $data['id']; ?>"><?php echo date('H:i:s', strtotime($data['START_TIME'])); ?></span>
                            <button id="pauseButton<?php echo $data['id']; ?>" class="btn-action pause-button" type="button" data-id="<?php echo $data['id']; ?>" onclick="pauseStopwatch(<?php echo $data['id']; ?>)">
                                <i data-feather="pause-circle"></i>
                            </button>
                        </td>
                        <td class="end-time">
                            <input type="hidden" name="END_TIME" class="form-control" data-id="<?php echo $data['id']; ?>" value="<?php echo date('H:i:s', strtotime($data['END_TIME'])); ?>">
                            <span id="endTime<?php echo $data['id']; ?>"><?php echo date('H:i:s', strtotime($data['END_TIME'])); ?></span>
                            <button id="endButton<?php echo $data['id']; ?>" class="btn-action end-button" type="button" data-id="<?php echo $data['id']; ?>" onclick="updateEndTime(<?php echo $data['id']; ?>)">
                                <i data-feather="minus-circle"></i>
                            </button>
                        </td>
                        <td class="duration" data-id="<?php echo $data['id']; ?>" data-field="duration">
                            <?php echo htmlspecialchars($data["DURATION"]); ?>
                        </td>
                        <td data-id="<?php echo $data['id']; ?>" data-field="status" class="<?php echo $statusClass; ?>">
                            <?php echo $statusText; ?>
                        </td>
                        <td class="remark"><?php echo htmlspecialchars($data["REMARK"]); ?></td>
                        <td class="prioritas" style="color: red; font-weight: bold;"><?php echo htmlspecialchars($data["PRIORITAS"]); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-1MtbIsyU+mg1Xy5Z2pIvGSKXixbJz4lAxj5xVuf7B7OfRmiH2c2o6ZxfIUlHs5EO5" crossorigin="anonymous"></script>
    <script>feather.replace();</script>
    <script src="./style.js"></script>
    <script src="./javascript.js"></script>
    <script src="./index.js"></script>
</body>
</html>