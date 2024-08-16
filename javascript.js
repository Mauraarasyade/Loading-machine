let timers = {};
let startTimes = {};
let elapsedTime = {};
let isPaused = {};
let wasEnded = {};

function formatTime(date) {
    let hours = date.getHours().toString().padStart(2, '0');
    let minutes = date.getMinutes().toString().padStart(2, '0');
    let seconds = date.getSeconds().toString().padStart(2, '0');
    return `${hours}:${minutes}:${seconds}`;
}

function formatDuration(seconds) {
    let hours = Math.floor(seconds / 3600);
    let minutes = Math.floor((seconds % 3600) / 60);
    let secs = seconds % 60;

    hours = hours.toString().padStart(2, '0');
    minutes = minutes.toString().padStart(2, '0');
    secs = secs.toString().padStart(2, '0');
    return `${hours}:${minutes}:${secs}`;
}

function saveButtonStatus(id, status) {
    localStorage.setItem(`button_status_${id}`, status);
}

function getButtonStatus(id) {
    return localStorage.getItem(`button_status_${id}`) || 'inactive';
}

function saveToLocalStorage(id, startTime, elapsedTime, isPaused) {
    const data = {
        startTime: startTime,
        elapsedTime: elapsedTime,
        isPaused: isPaused
    };
    console.log(`Saving to Local Storage for ID ${id}`, data);
    localStorage.setItem(`stopwatch_${id}`, JSON.stringify(data));
}

function loadFromLocalStorage(id) {
    const data = JSON.parse(localStorage.getItem(`stopwatch_${id}`));
    if (data) {
        startTimes[id] = data.startTime ? new Date(data.startTime) : new Date('1970-01-01T00:00:00Z');
        elapsedTime[id] = data.elapsedTime || 0;
        isPaused[id] = data.isPaused || false;
        console.log(`Loaded from Local Storage for ID ${id}`, data);
        if (!isPaused[id] && getButtonStatus(id) !== 'end') {
            startStopwatch(id, true);
        } else if (isPaused[id]) {
            updateStopwatchDisplay(id);
        }
    } else {
        startTimes[id] = new Date('1970-01-01T00:00:00Z');
        elapsedTime[id] = 0;
        isPaused[id] = false;
    }
    updateButtonStyles(id, getButtonStatus(id));
}

function startStopwatch(id, fromLoad = false) {
    if (timers[id]) {
        clearInterval(timers[id]);
    }

    if (!fromLoad) {
        if (isPaused[id]) {
            startTimes[id] = new Date(new Date().getTime() - elapsedTime[id]);
        } else if (!wasEnded[id]) {
            startTimes[id] = new Date();
            elapsedTime[id] = 0;
        }
        isPaused[id] = false;
    } else {
        if (isPaused[id]) {
            startTimes[id] = new Date(new Date().getTime() - elapsedTime[id]);
            alert("PROGRAM BERJALAN KEMBALI");
        } else {
            console.log("Stopwatch is already running.");
        }
    }

    timers[id] = setInterval(function() {
        let now = new Date();
        elapsedTime[id] = now - startTimes[id];
        updateStopwatchDisplay(id);

        saveToLocalStorage(id, startTimes[id].toISOString(), elapsedTime[id], isPaused[id]);
    }, 1000);
    saveButtonStatus(id, 'start');
    updateButtonStyles(id, 'start');
}

function updateStartTime(id) {
    const startTime = new Date();
    $.ajax({
        url: 'update-start-time.php',
        type: 'POST',
        data: { id: id, START_TIME: formatTime(startTime) },
        success: function(response) {
            if (response.trim() === 'Success') {
                document.getElementById(`startTime${id}`).innerText = formatTime(startTime);
                $(`input[name="START_TIME"][data-id="${id}"]`).val(formatTime(startTime));
                $(`td[data-id="${id}"][data-field="status"]`).removeClass('status-red status-green status-neutral').html('');
                    if (getButtonStatus(id) !== 'pause') {
                        startStopwatch(id);
                    } else {
                        startStopwatch(id, true);
                    }
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
        data: { id: id, END_TIME: "00:00:00" },
        success: function(response) {
            if (response.trim() === 'Success') {
                document.getElementById(`endTime${id}`).innerText = "00:00:00";
                $(`input[name="END_TIME"][data-id="${id}"]`).val("00:00:00");
                wasEnded[id] = true;
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

    isPaused[id] = true;
    updateStopwatchDisplay(id);
    saveToLocalStorage(id, startTimes[id].toISOString(), elapsedTime[id], isPaused[id]);
    saveButtonStatus(id, 'pause');
    updateButtonStyles(id, 'pause');

    console.log(`Paused stopwatch for ID ${id}`);
    console.log(`isPaused: ${isPaused[id]}`);
    console.log(`elapsedTime: ${elapsedTime[id]}`);
}

function updateEndTime(id) {
    const endTime = new Date();
    clearInterval(timers[id]);
    const formattedEndTime = formatTime(endTime);

    document.getElementById(`endTime${id}`).innerText = formattedEndTime;
    $(`input[name="END_TIME"][data-id="${id}"]`).val(formattedEndTime);

    const endTimeInput = document.querySelector(`input[data-id="${id}"]`);
    const endTimeSpan = document.querySelector(`#endTime${id}`);
    const prioritasCell = document.querySelector(`#prioritas-${id}`);
    const duration = document.getElementById(`duration${id}`).innerText;

    $.ajax({
        url: 'update-end-time.php',
        type: 'POST',
        data: { id: id, END_TIME: formattedEndTime, DURATION: duration },
        success: function(response) {
            if (response.trim() === 'Success') {
                sendDurationToServer(id, duration);
                updateStatus(id, duration);
                saveButtonStatus(id, 'end');
                updateButtonStyles(id, 'end');
                if (prioritasCell) {
                    prioritasCell.textContent = '-';
                    updatePrioritasInDatabase(id, '-');
                }
                wasEnded[id] = true;
            } else {
                alert('Failed to update end time: ' + response);
            }
        },
        error: function() {
            alert('Failed to update end time');
        }
    });
}

function updateStopwatchDisplay(id) {
    let elapsedSeconds = Math.floor(elapsedTime[id] / 1000);
    document.getElementById(`duration${id}`).innerText = formatDuration(elapsedSeconds);
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
            startButton.classList.add('btn-action.start-button');
            pauseButton.classList.add('btn-action.pause-button');
            endButton.classList.add('btn-action.end-button');
            break;
    }
}

function diffTime(startTime, endTime) {
    let start = new Date(`1970-01-01T${startTime}Z`);
    let end = new Date(`1970-01-01T${endTime}Z`);
    let diffMs = end - start;
    let hours = Math.floor(diffMs / 3600000);
    let minutes = Math.floor((diffMs % 3600000) / 60000);
    let seconds = Math.floor((diffMs % 60000) / 1000);

    hours = hours < 0 ? 24 + hours : hours;
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
            if (response.trim() !== 'Success') {
                alert('Failed to update duration: ' + response);
            }
        },
        error: function() {
            alert('Failed to update duration');
        }
    });
}

function updateStatus(id, duration, startTime, endTime) {
    const est = $(`td[data-id="${id}"][data-field="est"]`).text();

    const durationParts = duration.split(':');
    const durationHours = parseInt(durationParts[0], 10) || 0;
    const durationMinutes = parseInt(durationParts[1], 10) || 0;
    const durationSeconds = parseInt(durationParts[2], 10) || 0;

    const estParts = est.split(':');
    const estHours = parseInt(estParts[0], 10) || 0;
    const estMinutes = parseInt(estParts[1], 10) || 0;
    const estSeconds = parseInt(estParts[2], 10) || 0;

    const durationTotalSeconds = (durationHours * 3600) + (durationMinutes * 60) + durationSeconds;
    const estTotalSeconds = (estHours * 3600) + (estMinutes * 60) + estSeconds;

    const diffSeconds = durationTotalSeconds - estTotalSeconds;
    const absDiffSeconds = Math.abs(diffSeconds);
    const diffHours = Math.floor(absDiffSeconds / 3600);
    const diffMinutes = Math.floor((absDiffSeconds % 3600) / 60);
    const diffSecondsFinal = absDiffSeconds % 60;

    let statusText = '';
    let statusClass = '';

    if ((startTime === '' || startTime === '00:00:00') && (endTime === '' || endTime === '00:00:00')) {
        statusClass = 'status-red';
        statusText = 'Belum Diproses';
    } else if (startTime !== '' && (endTime === '' || endTime === '00:00:00')) {
        statusClass = 'status-green';
        statusText = 'Sedang Diproses';
    } else if (startTime !== '' && endTime !== '') {
        if (diffSeconds > 0) {
            statusClass = 'status-red';
            statusText = `WAKTU LEBIH <br> ${diffHours} jam, ${diffMinutes} menit, <br> ${diffSecondsFinal} detik`;
        } else if (diffSeconds < 0) {
            statusClass = 'status-green';
            statusText = `WAKTU KURANG <br> ${diffHours} jam, ${diffMinutes} menit, <br> ${diffSecondsFinal} detik`;
        } else {
            statusClass = 'status-neutral';
            statusText = 'WAKTU CUKUP';
        }
    } else {
        statusClass = 'status-red';
        statusText = 'Status Tidak Diketahui';
    }

    $(`td[data-id="${id}"][data-field="status"]`).removeClass('status-red status-green status-neutral')
        .addClass(statusClass).html(statusText);

    $.ajax({
        url: 'update-status.php',
        type: 'POST',
        data: { id: id, status: statusText },
        success: function(response) {
            if (response.trim() !== 'Success') {
                alert('Failed to update status: ' + response);
            }
        },
        error: function() {
            alert('Failed to update status');
        }
    });
}

$(document).ready(function() {
    $('tr').each(function() {
        const id = $(this).data('id');
        loadFromLocalStorage(id);

        $(`#startButton${id}`).click(function() {
            startStopwatch(id);
        });
        $(`#pauseButton${id}`).click(function() {
            pauseStopwatch(id);
        });
        $(`#endButton${id}`).click(function() {
            updateEndTime(id);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    let startButtons = document.querySelectorAll('.start-button');
    let pauseButtons = document.querySelectorAll('.pause-button');
    let endButtons = document.querySelectorAll('.end-button');

    startButtons.forEach(button => {
        let id = button.getAttribute('data-id');
        loadFromLocalStorage(id);
        button.addEventListener('click', function() {
            updateStartTime(id);
        });
    });

    pauseButtons.forEach(button => {
        let id = button.getAttribute('data-id');
        button.addEventListener('click', function() {
            pauseStopwatch(id);
        });
    });

    endButtons.forEach(button => {
        let id = button.getAttribute('data-id');
        button.addEventListener('click', function() {
            updateEndTime(id);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[name="END_TIME"]').forEach(function(input) {
        input.addEventListener('change', function() {
            console.log('END_TIME changed');
            var row = input.closest('tr');
            var prioritasCell = row.querySelector('.prioritas');
            var id = input.getAttribute('data-id');

            console.log('Prioritas Cell:', prioritasCell);
            console.log('ID:', id);

            if (input.value) {
                prioritasCell.textContent = '-';
                console.log('Prioritas diubah menjadi "-"');
                updatePrioritasInDatabase(id, '-');
            } else {
                var originalPrioritas = prioritasCell.getAttribute('data-original-prioritas');
                prioritasCell.textContent = originalPrioritas;
                console.log('Prioritas dikembalikan ke:', originalPrioritas);
                updatePrioritasInDatabase(id, originalPrioritas);
            }
        });
    });
});

function updatePrioritasInDatabase(id, prioritas) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update-prioritas.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log('Prioritas updated successfully');
        } else {
            console.error('Error updating prioritas');
        }
    };
    xhr.send('id=' + encodeURIComponent(id) + '&prioritas=' + encodeURIComponent(prioritas));
}