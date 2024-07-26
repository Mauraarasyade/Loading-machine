<?php
    include_once("./koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $START_TIME = isset($_POST['START_TIME']) ? mysqli_real_escape_string($db, $_POST['START_TIME']) : null;
        $END_TIME = isset($_POST['END_TIME']) ? mysqli_real_escape_string($db, $_POST['END_TIME']) : null;

        if (empty($START_TIME) || empty($END_TIME)) {
            echo "Failed: Start time and/or end time is missing.";
            exit;
        }

        try {
            $start = new DateTime($START_TIME);
            $end = new DateTime($END_TIME);
            $interval = $end->diff($start);

            $totalMinutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

            $est_query = mysqli_query($db, "SELECT EST FROM data WHERE id=$id");
            if (!$est_query) {
                throw new Exception("Database query failed: " . mysqli_error($db));
            }

            $est_result = mysqli_fetch_assoc($est_query);
            if (!$est_result) {
                throw new Exception("No EST found for the given ID.");
            }

            $est = $est_result['EST'];
            $estParts = explode(' ', $est);
            if (count($estParts) < 4) {
                throw new Exception("Invalid EST format.");
            }

            $estHours = intval($estParts[0]);
            $estMinutes = intval($estParts[2]);
            $estTotalMinutes = ($estHours * 60) + $estMinutes;

            $durationHours = floor($totalMinutes / 60);
            $durationMinutes = $totalMinutes % 60;

            $diffMinutes = $totalMinutes - $estTotalMinutes;
            $absDiffMinutes = abs($diffMinutes);
            $diffHours = floor($absDiffMinutes / 60);
            $diffMinutesFinal = $absDiffMinutes % 60;

            $statusText = '';
            $statusClass = '';

            if ($diffMinutes > 0) {
                $statusClass = 'status-red';
                $statusText = "WAKTU LEBIH $diffHours jam, $diffMinutesFinal menit";
            } else {
                $statusClass = 'status-green';
                $statusText = "WAKTU CUKUP $diffHours jam, $diffMinutesFinal menit";
            }

            $query = mysqli_query($db, "UPDATE data SET DURATION='$durationHours jam, $durationMinutes menit', STATUS='$statusText', START_TIME='$START_TIME', END_TIME='$END_TIME' WHERE id=$id");

            if ($query) {
                echo "Success";
            } else {
                echo "Failed: " . mysqli_error($db);
            }
        } catch (Exception $e) {
            echo 'Error calculating duration: ' . $e->getMessage();
        }
    }
?>