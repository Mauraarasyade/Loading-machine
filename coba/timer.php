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
        input[type="datetime-local"] {
            width: 100%;
            box-sizing: border-box;
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
                <td><input type="datetime-local" id="startTime1" onchange="startTimer(1)"></td>
                <td><input type="datetime-local" id="endTime1" onchange="stopTimer(1)"></td>
                <td><span id="duration1">0 jam, 0 menit, 0 detik</span></td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <script>
        let timers = {};
        let startTimes = {};

        function startTimer(id) {
            if (timers[id]) {
                clearInterval(timers[id]);
            }

            const startTimeInput = document.getElementById(`startTime${id}`);
            const startTime = new Date();
            startTimes[id] = startTime;

            // Set the input value to the current time in the correct format
            startTimeInput.value = startTime.toISOString().slice(0, 16);

            timers[id] = setInterval(function() {
                updateDuration(id);
            }, 1000);
        }

        function stopTimer(id) {
            if (timers[id]) {
                clearInterval(timers[id]);
            }
            updateDuration(id);  // Ensure the duration is updated once more after stopping
        }

        function updateDuration(id) {
            const startTimeInput = document.getElementById(`startTime${id}`);
            const endTimeInput = document.getElementById(`endTime${id}`);
            const durationElement = document.getElementById(`duration${id}`);

            const startTime = startTimes[id];
            const endTime = endTimeInput.value ? new Date(endTimeInput.value) : new Date();

            if (startTime) {
                const elapsed = Math.floor((endTime - startTime) / 1000);
                const hours = Math.floor(elapsed / 3600);
                const minutes = Math.floor((elapsed % 3600) / 60);
                const seconds = elapsed % 60;
                durationElement.innerText = `${hours} jam, ${minutes} menit, ${seconds} detik`;
            } else {
                durationElement.innerText = "0 jam, 0 menit, 0 detik";
            }
        }
    </script>
</body>
</html>
