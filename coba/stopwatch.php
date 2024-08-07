<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stopwatch in Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .start-time, .end-time {
            display: flex;
            align-items: center;
            padding: 5px; /* Reduced padding */
        }
        .start-time {
            justify-content: space-between; /* Distribute space between items */
        }
        .end-time {
            justify-content: flex-end; /* Align items to the end (right) */
        }
        .start-time button, .end-time button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Machine</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Machine 1</td>
                <td class="start-time">
                    <button onclick="startStopwatch(1)">Start</button>
                    <span id="startTime1">00:00:00</span>
                    <button onclick="pauseStopwatch(1)">Pause</button>
                </td>
                <td class="end-time">
                    <span id="endTime1">00:00:00</span>
                    <button onclick="stopStopwatch(1)">Stop</button>
                </td>
                <td><span id="duration1">00:00:00</span></td>
            </tr>
        </tbody>
    </table>

    <script>
        let timers = {};
        let startTimes = {};
        let elapsedTime = {};
        let pausedAt = {};
        let isPaused = {};

        function startStopwatch(id) {
            if (timers[id]) {
                clearInterval(timers[id]);
            }

            if (isPaused[id]) {
                startTimes[id] = new Date(new Date() - elapsedTime[id]);
                isPaused[id] = false;
            } else {
                startTimes[id] = new Date();
            }

            document.getElementById(`startTime${id}`).innerText = startTimes[id].toLocaleTimeString();
            timers[id] = setInterval(function() {
                let now = new Date();
                let elapsed = new Date(now - startTimes[id]);
                let hours = String(elapsed.getUTCHours()).padStart(2, '0');
                let minutes = String(elapsed.getUTCMinutes()).padStart(2, '0');
                let seconds = String(elapsed.getUTCSeconds()).padStart(2, '0');
                document.getElementById(`duration${id}`).innerText = `${hours}:${minutes}:${seconds}`;
            }, 1000);
        }

        function pauseStopwatch(id) {
            if (timers[id]) {
                clearInterval(timers[id]);
            }

            pausedAt[id] = new Date();
            elapsedTime[id] = pausedAt[id] - startTimes[id];
            isPaused[id] = true;
        }

        function stopStopwatch(id) {
            if (timers[id]) {
                clearInterval(timers[id]);
            }

            let endTime = new Date();
            document.getElementById(`endTime${id}`).innerText = endTime.toLocaleTimeString();

            let elapsed = new Date(endTime - startTimes[id]);
            let hours = String(elapsed.getUTCHours()).padStart(2, '0');
            let minutes = String(elapsed.getUTCMinutes()).padStart(2, '0');
            let seconds = String(elapsed.getUTCSeconds()).padStart(2, '0');
            document.getElementById(`duration${id}`).innerText = `${hours}:${minutes}:${seconds}`;
        }
    </script>
</body>
</html>
