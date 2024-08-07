<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stopwatch</title>
</head>
<body>
    <div>
        <h1 id="display">00:00:00</h1>
        <button onclick="startStopwatch()">Start</button>
        <button onclick="pauseStopwatch()">Pause</button>
        <button onclick="stopStopwatch()">Stop</button>
    </div>

    <script>
        let startTime;
        let interval;
        let elapsedSeconds = 0;
        let isPaused = false;

        function startStopwatch() {
            if (!isPaused) {
                startTime = new Date();
            }
            isPaused = false;
            interval = setInterval(updateStopwatch, 1000);
        }

        function pauseStopwatch() {
            clearInterval(interval);
            isPaused = true;
        }

        function stopStopwatch() {
            clearInterval(interval);
            updateDatabase(elapsedSeconds);
            elapsedSeconds = 0;
            document.getElementById('display').textContent = "00:00:00";
        }

        function updateStopwatch() {
            elapsedSeconds++;
            let hours = Math.floor(elapsedSeconds / 3600);
            let minutes = Math.floor((elapsedSeconds % 3600) / 60);
            let seconds = elapsedSeconds % 60;

            document.getElementById('display').textContent = 
                `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

            updateDatabase(elapsedSeconds);
        }

        function updateDatabase(duration) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_duration.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send(`start_time=${startTime.toISOString()}&duration=${duration}`);
        }
    </script>
</body>
</html>
