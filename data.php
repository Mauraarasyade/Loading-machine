<?php
    include_once("./koneksi.php");

    $processFilter = isset($_GET['process']) ? $_GET['process'] : '';
    $machineFilter = isset($_GET['machine']) ? $_GET['machine'] : '';
    $nopFilter = isset($_GET['nop']) ? $_GET['nop'] : '';

    $query = "SELECT * FROM data WHERE 1=1";

    if (!empty($processFilter)) {
        $query .= " AND PROCESS = '" . mysqli_real_escape_string($db, $processFilter) . "'";
    }

    if (!empty($machineFilter)) {
        $query .= " AND MACHINE = '" . mysqli_real_escape_string($db, $machineFilter) . "'";
    }

    if (!empty($nopFilter)) {
        $query .= " AND NOP = '" . mysqli_real_escape_string($db, $nopFilter) . "'";
    }

    $query .= " ORDER BY CASE WHEN START_TIME != '00:00:00' AND END_TIME = '00:00:00' THEN 1
                                WHEN START_TIME = '00:00:00' AND END_TIME = '00:00:00' THEN 2
                                ELSE 3 END, PRIORITAS DESC, DATE ASC, START_TIME ASC";
    $result = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN LOADING MACHINE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="./style.css">
    <style>
        .btn-action {
            border: none;
            background-color: white;
            font-size: 16px;
            cursor: pointer;
            transition: color 0.4s;
        }

        .btn-action.start-button {
            background-color: white;
            color: grey;
        }
        .start-active {
            background-color: white;
            color: green !important;
        }

        .inactive {
            background-color: white;
            color:black !important;
        }

        .btn-action.pause-button {
            background-color: white;
            color: grey;
        }
        .pause-active {
            background-color: white;
            color: orange !important;
        }

        .btn-action.end-button {
            background-color: white;
            color: grey;
        }
        .end-active {
            background-color: white;
            color: red !important;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Loading<span> Machine</span>.</a>
        <div class="navbar-nav">
            <div class="menu">
                <a href="./index.php">Home<i data-feather="home" class="home-item"></i></a>
            </div>
            <div class="add">
                <a href="./tambah-data.php">Add Data<i data-feather="plus-square" class="add-item"></i></a>
            </div>
            <div class="empty">
                <a href="./kosong-data.php">Empty Data Time<i data-feather="file-minus" class="add-item"></i></a>
            </div>
            <div class="process">
                <a href="./progres.php">Process<i data-feather="clock" class="add-item"></i></a>
            </div>
            <div class="arsip">
                <a href="./arsip.php">Archive<i data-feather="archive" class="archive-item"></i></a>
            </div>
            <div class="excel">
                <a href="cetak-excel.php?<?php echo http_build_query($_GET); ?>" target="_blank">Download Excel<i data-feather="table" class="excel-item"></i></a>
            </div>
            <div class="word">
                <a href="cetak-pdf.php?<?php echo http_build_query($_GET); ?>" target="_blank">Download Word<i data-feather="file-text" class="word-item"></i></a>
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
                            <option value="red" <?php if($nopFilter == 'red') echo 'selected'; ?>>Red</option>
                            <option value="green" <?php if($nopFilter == 'green') echo 'selected'; ?>>Green</option>
                            <option value="blue" <?php if($nopFilter == 'blue') echo 'selected'; ?>>Blue</option>
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
                    <th scope="col" class="action">ACTION</th>
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

                        if (empty($data["START_TIME"]) || $data["START_TIME"] === '00:00:00' && empty($data["END_TIME"]) || $data["END_TIME"] === '00:00:00') {
                            $statusClass = 'status-red';
                            $statusText = "Belum Diproses";
                        } elseif (!empty($data["START_TIME"]) && empty($data["END_TIME"])) {
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
                        <td class="process">
                            <form action="update-machine.php" method="POST" class="update-machine">
                                <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
                                <select name="PROCESS" class="form-control" onchange="this.form.submit()">
                                    <option value="">Pilih Proses</option>
                                    <option value="BUBUT" <?php if($data["PROCESS"] == 'BUBUT') echo 'selected'; ?>>BUBUT</option>
                                    <option value="CNC" <?php if($data["PROCESS"] == 'CNC') echo 'selected'; ?>>CNC</option>
                                    <option value="EDM" <?php if($data["PROCESS"] == 'EDM') echo 'selected'; ?>>EDM</option>
                                    <option value="MANUAL" <?php if($data["PROCESS"] == 'MANUAL') echo 'selected'; ?>>MANUAL</option>
                                    <option value="WIRECUT" <?php if($data["PROCESS"] == 'WIRECUT') echo 'selected'; ?>>WIRECUT</option>
                                </select>
                            </form>
                        </td>
                        <td class="machine">
                            <form action="update-machine.php" method="POST" class="update-machine">
                                <input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
                                <select name="MACHINE" data-key="<?php echo $data["id"]; ?>" class="form-control machineColorSelect" onchange="updateSelectColor(this); this.form.submit();">
                                    <option value="">Pilih Mesin</option>
                                    <option value="GMC 1" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 1') echo 'selected'; ?>>GMC 1</option>
                                    <option value="GMC 2" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 2') echo 'selected'; ?>>GMC 2</option>
                                    <option value="GMC 3" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 3') echo 'selected'; ?>>GMC 3</option>
                                    <option value="GMC 6" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 6') echo 'selected'; ?>>GMC 6</option>
                                    <option value="GMC 7" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 7') echo 'selected'; ?>>GMC 7</option>
                                    <option value="GMC 8" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 8') echo 'selected'; ?>>GMC 8</option>
                                    <option value="GMC 9" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 9') echo 'selected'; ?>>GMC 9</option>
                                    <option value="GMC 10" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 10') echo 'selected'; ?>>GMC 10</option>
                                    <option value="GMC 11" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 11') echo 'selected'; ?>>GMC 11</option>
                                    <option value="GMC 12" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 12') echo 'selected'; ?>>GMC 12</option>
                                    <option value="GMC 13" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 13') echo 'selected'; ?>>GMC 13</option>
                                    <option value="GMC 14" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 14') echo 'selected'; ?>>GMC 14</option>
                                    <option value="GMC 15" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 15') echo 'selected'; ?>>GMC 15</option>
                                    <option value="GMC 16" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 16') echo 'selected'; ?>>GMC 16</option>
                                    <option value="GMC 17" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 17') echo 'selected'; ?>>GMC 17</option>
                                    <option value="GMC 18" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 18') echo 'selected'; ?>>GMC 18</option>
                                    <option value="GMC 19" class="gmc-option" <?php if($data["MACHINE"] == 'GMC 19') echo 'selected'; ?>>GMC 19</option>
                                    <option value="GEC 1" class="gec-option"<?php if($data["MACHINE"] == 'GEC 1') echo 'selected'; ?>>GEC 1</option>
                                    <option value="GEC 2" class="gec-option"<?php if($data["MACHINE"] == 'GEC 2') echo 'selected'; ?>>GEC 2</option>
                                    <option value="GEC 3" class="gec-option"<?php if($data["MACHINE"] == 'GEC 3') echo 'selected'; ?>>GEC 3</option>
                                    <option value="GEC 4" class="gec-option"<?php if($data["MACHINE"] == 'GEC 4') echo 'selected'; ?>>GEC 4</option>
                                    <option value="GEC 5" class="gec-option"<?php if($data["MACHINE"] == 'GEC 5') echo 'selected'; ?>>GEC 5</option>
                                    <option value="GEC 6" class="gec-option"<?php if($data["MACHINE"] == 'GEC 6') echo 'selected'; ?>>GEC 6</option>
                                    <option value="GEC 7" class="gec-option"<?php if($data["MACHINE"] == 'GEC 7') echo 'selected'; ?>>GEC 7</option>
                                    <option value="GEC 8" class="gec-option"<?php if($data["MACHINE"] == 'GEC 8') echo 'selected'; ?>>GEC 8</option>
                                    <option value="GEC 9" class="gec-option"<?php if($data["MACHINE"] == 'GEC 9') echo 'selected'; ?>>GEC 9</option>
                                    <option value="GDC 1" class="gdc-option"<?php if($data["MACHINE"] == 'GDC 1') echo 'selected'; ?>>GDC 1</option>
                                    <option value="GDC 2" class="gdc-option"<?php if($data["MACHINE"] == 'GDC 2') echo 'selected'; ?>>GDC 2</option>
                                    <option value="GDC 3" class="gdc-option"<?php if($data["MACHINE"] == 'GDC 3') echo 'selected'; ?>>GDC 3</option>
                                    <option value="GDC 4" class="gdc-option"<?php if($data["MACHINE"] == 'GDC 4') echo 'selected'; ?>>GDC 4</option>
                                </select>
                            </form>
                        </td>
                        <td class="part"><?php echo htmlspecialchars($data["PART_NAME"]); ?></td>
                        <td class="material"><?php echo htmlspecialchars($data["MATERIAL"]); ?></td>
                        <td class="pos"><?php echo htmlspecialchars($data["POS"]); ?></td>
                        <td class="qty"><?php echo htmlspecialchars($data["QTY"]); ?></td>
                        <td class="nop"><?php echo htmlspecialchars($data["NOP"]); ?></td>
                        <td class="est" data-id="<?php echo $data['id']; ?>" data-field="est"><?php echo date('H:i:s', strtotime($data['EST'])); ?></td>
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
                        <td><span id="duration<?php echo $data['id']; ?>"><?php echo date('H:i:s', strtotime($data['DURATION'])); ?></span></td>
                        <td data-id="<?php echo $data['id']; ?>" data-field="status" class="<?php echo $statusClass; ?>">
                            <?php echo $statusText; ?>
                        </td>
                        <td class="remark"><?php echo htmlspecialchars($data['REMARK']); ?></td>
                        <td class="prioritas" id="prioritas-<?php echo $data['id']; ?>" data-original-prioritas="<?php echo htmlspecialchars($data['PRIORITAS']); ?>" style="color: red; font-weight: bold;">
                            <?php echo htmlspecialchars($data['PRIORITAS']); ?>
                        </td>
                        <td class="action">
                            <a class="btn btn-primary" href="edit-data.php?id=<?php echo $data['id']; ?>">Edit</a>
                            <a class="btn btn-danger my-1" href="hapus-data.php?id=<?php echo $data['id']; ?>">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-1MtbIsyU+mg1Xy5Z2pIvGSKXixbJz4lAxj5xVuf7B7OfRmiH2c2o6ZxfIUlHs5EO5" crossorigin="anonymous"></script>
    <script>feather.replace();</script>
    <script src="./style.js"></script>
    <script src="./javascript.js"></script>
    <script>
        let timers = {};
let startTimes = {};
let elapsedTime = {};
let pausedAt = {};
let isPaused = {};

function formatTime(date) {
    let hours = date.getHours().toString().padStart(2, '0');
    let minutes = date.getMinutes().toString().padStart(2, '0');
    let seconds = date.getSeconds().toString().padStart(2, '0');
    return `${hours}:${minutes}:${seconds}`;
}

function saveButtonStatus(id, status) {
    console.log(`Saving button status for ID ${id}: ${status}`);
    localStorage.setItem(`button_status_${id}`, status);
}

function getButtonStatus(id) {
    const status = localStorage.getItem(`button_status_${id}`) || 'inactive';
    console.log(`Retrieved button status for ID ${id}: ${status}`);
    return status;
}

function saveToLocalStorage(id, startTime, elapsedTime, isPaused) {
    const data = {
        startTime: startTime,
        elapsedTime: elapsedTime,
        isPaused: isPaused
    };
    localStorage.setItem(`stopwatch_${id}`, JSON.stringify(data));
}

function loadFromLocalStorage(id) {
    const data = JSON.parse(localStorage.getItem(`stopwatch_${id}`));
    if (data) {
        try {
            startTimes[id] = data.startTime ? new Date(data.startTime) : new Date('1970-01-01T00:00:00Z');
            elapsedTime[id] = data.elapsedTime || 0;
            isPaused[id] = data.isPaused || false;

            if (startTimes[id]) {
                if (!isPaused[id] && getButtonStatus(id) !== 'end') {
                    startStopwatch(id);
                } else if (isPaused[id]) {
                    startTimes[id] = new Date(new Date() - elapsedTime[id]);
                    updateStopwatchDisplay(id);
                }
            }
        } catch (e) {
            console.error(`Error loading data for ID ${id}: ${e}`);
            resetStopwatch(id); // Reset if there's an error
        }
    } else {
        startTimes[id] = new Date('1970-01-01T00:00:00Z');
        elapsedTime[id] = 0;
        isPaused[id] = false;
    }

    updateButtonStyles(id, getButtonStatus(id));
}

function startStopwatch(id) {
    if (timers[id]) {
        clearInterval(timers[id]);
    }

    if (isPaused[id]) {
        startTimes[id] = new Date(new Date() - elapsedTime[id]);
        isPaused[id] = false;
    } else if (!startTimes[id] || startTimes[id].getTime() === new Date('1970-01-01T00:00:00Z').getTime()) {
        startTimes[id] = new Date();
        elapsedTime[id] = 0;
    }

    document.getElementById(`startTime${id}`).innerText = formatTime(startTimes[id]);

    timers[id] = setInterval(function() {
        let now = new Date();
        let elapsed = new Date(now - startTimes[id]);
        let hours = String(elapsed.getUTCHours()).padStart(2, '0');
        let minutes = String(elapsed.getUTCMinutes()).padStart(2, '0');
        let seconds = String(elapsed.getUTCSeconds()).padStart(2, '0');
        document.getElementById(`duration${id}`).innerText = `${hours}:${minutes}:${seconds}`;
    }, 1000);

    saveToLocalStorage(id, startTimes[id].toISOString(), elapsedTime[id], isPaused[id]);
    saveButtonStatus(id, 'start');
    updateButtonStyles(id, 'start');
}

function updateStopwatchDisplay(id) {
    let now = new Date();
    let elapsed = new Date(now - startTimes[id]);
    let hours = String(elapsed.getUTCHours()).padStart(2, '0');
    let minutes = String(elapsed.getUTCMinutes()).padStart(2, '0');
    let seconds = String(elapsed.getUTCSeconds()).padStart(2, '0');
    document.getElementById(`duration${id}`).innerText = `${hours}:${minutes}:${seconds}`;
}

function updateStartTime(id) {
    const startTime = formatTime(new Date());
    const endTime = "00:00:00";

    $.ajax({
        url: 'update-start-time.php',
        type: 'POST',
        data: { id: id, START_TIME: startTime },
        success: function(response) {
            if (response.trim() === 'Success') {
                document.getElementById(`startTime${id}`).innerText = startTime;
                $(`input[name="START_TIME"][data-id="${id}"]`).val(startTime);
                $(`td[data-id="${id}"][data-field="status"]`).removeClass('status-red status-green status-neutral').html('');
                startStopwatch(id);
            } else {
                alert('Failed to update start time: ' + response);
            }
        },
        error: function() {
            alert('Failed to update start time');
        }
    });

    $.ajax({
        url: 'update-end-time.php',
        type: 'POST',
        data: { id: id, END_TIME: endTime },
        success: function(response) {
            if (response.trim() === 'Success') {
                document.getElementById(`endTime${id}`).innerText = endTime;
                $(`input[name="END_TIME"][data-id="${id}"]`).val(endTime);
            } else {
                alert('Failed to reset end time: ' + response);
            }
        },
        error: function() {
            alert('Failed to reset end time');
        }
    });

    saveButtonStatus(id, 'start');
    updateButtonStyles(id, 'start');
}

function pauseStopwatch(id) {
    if (timers[id]) {
        clearInterval(timers[id]);
    }

    pausedAt[id] = new Date();
    elapsedTime[id] = pausedAt[id] - startTimes[id];
    isPaused[id] = true;

    updateStopwatchDisplay(id);

    saveButtonStatus(id, 'pause');
    updateButtonStyles(id, 'pause');

    saveToLocalStorage(id, startTimes[id].toISOString(), elapsedTime[id], isPaused[id]);
}

function updateEndTime(id) {
    const endTime = formatTime(new Date());
    document.getElementById(`endTime${id}`).innerText = endTime;
    $(`input[name="END_TIME"][data-id="${id}"]`).val(endTime);

    clearInterval(timers[id]);
    let duration = document.getElementById(`duration${id}`).innerText;

    $.ajax({
        url: 'update-end-time.php',
        type: 'POST',
        data: { id: id, END_TIME: endTime, DURATION: duration },
        success: function(response) {
            if (response.trim() === 'Success') {
                sendDurationToServer(id, duration);
                updateStatus(id, duration);
                saveButtonStatus(id, 'end');
                updateButtonStyles(id, 'end');
            } else {
                alert('Failed to update end time: ' + response);
            }
        },
        error: function() {
            alert('Failed to update end time');
        }
    });
}

function updateButtonStyles(id, status) {
    let startButton = document.getElementById(`startButton${id}`);
    let pauseButton = document.getElementById(`pauseButton${id}`);
    let endButton = document.getElementById(`endButton${id}`);

    startButton.className = 'btn-action start-button';
    pauseButton.className = 'btn-action pause-button';
    endButton.className = 'btn-action end-button';

    switch (status) {
        case 'start':
            startButton.classList.add('start-active');
            pauseButton.classList.add('inactive');
            endButton.classList.add('inactive');
            break;
        case 'pause':
            startButton.classList.add('inactive');
            pauseButton.classList.add('pause-active');
            endButton.classList.add('inactive');
            break;
        case 'end':
            startButton.classList.add('inactive');
            pauseButton.classList.add('inactive');
            endButton.classList.add('end-active');
            break;
        default:
            startButton.classList.add('inactive');
            pauseButton.classList.add('inactive');
            endButton.classList.add('inactive');
            break;
    }
}

function diffTime(startTime, endTime) {
    let start = new Date(`1970-01-01T${startTime}Z`);
    let end = new Date(`1970-01-01T${endTime}Z`);
    if (isNaN(start) || isNaN(end)) {
        console.error(`Invalid time format: start=${startTime}, end=${endTime}`);
        return "Invalid Time";
    }

    let diffMs = end - start;
    let hours = Math.floor(diffMs / 3600000);
    let minutes = Math.floor((diffMs % 3600000) / 60000);
    let seconds = Math.floor((diffMs % 60000) / 1000);

    hours = hours < 0 ? 24 + hours : hours;  // handle cases where end time is past midnight
    hours = String(hours).padStart(2, '0');
    minutes = String(minutes).padStart(2, '0');
    seconds = String(seconds).padStart(2, '0');

    return `${hours}:${minutes}:${seconds}`;
}

function sendDurationToServer(id, duration) {
    $.ajax({
        url: 'update-duration.php',
        type: 'POST',
        data: { id: id, DURATION: duration },
        success: function(response) {
            console.log(`Duration for ID ${id} sent to server: ${duration}`);
        },
        error: function() {
            console.error(`Failed to send duration for ID ${id}`);
        }
    });
}

function updateStatus(id, duration) {
    let est = $(`input[name="EST"][data-id="${id}"]`).val();
    if (!est) {
        console.error(`EST value is missing for ID ${id}`);
        return;
    }

    let estTime = new Date(`1970-01-01T${est}Z`);
    let durationTime = new Date(`1970-01-01T${duration}Z`);

    let estSeconds = estTime.getHours() * 3600 + estTime.getMinutes() * 60 + estTime.getSeconds();
    let durationSeconds = durationTime.getHours() * 3600 + durationTime.getMinutes() * 60 + durationTime.getSeconds();

    let statusElement = $(`td[data-id="${id}"][data-field="status"]`);
    let status;

    if (durationSeconds > estSeconds) {
        let diff = durationSeconds - estSeconds;
        let diffHours = Math.floor(diff / 3600);
        let diffMinutes = Math.floor((diff % 3600) / 60);
        status = `${diffHours}h ${diffMinutes}m over`;
        statusElement.removeClass('status-green').addClass('status-red');
    } else {
        let diff = estSeconds - durationSeconds;
        let diffHours = Math.floor(diff / 3600);
        let diffMinutes = Math.floor((diff % 3600) / 60);
        status = `${diffHours}h ${diffMinutes}m under`;
        statusElement.removeClass('status-red').addClass('status-green');
    }

    statusElement.text(status);
    saveToLocalStorage(id, startTimes[id].toISOString(), elapsedTime[id], isPaused[id]);
}

function resetStopwatch(id) {
    if (timers[id]) {
        clearInterval(timers[id]);
    }

    startTimes[id] = new Date('1970-01-01T00:00:00Z');
    elapsedTime[id] = 0;
    isPaused[id] = false;

    document.getElementById(`startTime${id}`).innerText = '00:00:00';
    document.getElementById(`endTime${id}`).innerText = '00:00:00';
    document.getElementById(`duration${id}`).innerText = '00:00:00';
    
    saveButtonStatus(id, 'inactive');
    updateButtonStyles(id, 'inactive');

    localStorage.removeItem(`stopwatch_${id}`);
    localStorage.removeItem(`button_status_${id}`);
}

function initializeStopwatch(id) {
    loadFromLocalStorage(id);
    $(`#resetButton${id}`).click(function() {
        resetStopwatch(id);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    feather.replace();
    document.querySelectorAll('.stopwatch').forEach((element) => {
        const id = element.dataset.id;
        initializeStopwatch(id);
    });
});

    </script>
</body>
</html>