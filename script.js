function updateStartTime(id, startTime) {
    $.ajax({
        url: 'update-start-time.php',
        type: 'POST',
        data: { id: id, START_TIME: startTime },
        success: function(response) {
            if (response === 'Success') {
                const endTime = $(`input[name="END_TIME"][data-id="${id}"]`).val();
                alert('Start time updated successfully');
                if (startTime) {
                    updateDuration(id, startTime, endTime);
                }
            } else {
                alert('Failed to update start time: ' + response);
            }
        },
        error: function() {
            alert('Failed to update start time');
        }
    });
}

function updateEndTime(id, endTime) {
    $.ajax({
        url: 'update-end-time.php',
        type: 'POST',
        data: { id: id, END_TIME: endTime },
        success: function(response) {
            if (response === 'Success') {
                const startTime = $(`input[name="START_TIME"][data-id="${id}"]`).val();
                alert('End time updated successfully');
                if (endTime) {
                    updateDuration(id, startTime, endTime);
                }
            } else {
                alert('Failed to update end time: ' + response);
            }
        },
        error: function() {
            alert('Failed to update end time');
        }
    });
}

function calculateDuration(startTime, endTime) {
    const start = new Date(startTime);
    const end = new Date(endTime);

    if (isNaN(start.getTime()) || isNaN(end.getTime())) {
        return 'Invalid time';
    }

    const durationMs = end - start;

    if (durationMs < 0) {
        return 'Invalid duration';
    }

    const totalMinutes = Math.floor(durationMs / 1000 / 60);
    const hours = Math.floor(totalMinutes / 60);
    const minutes = totalMinutes % 60;

    return `${hours} jam, ${minutes} menit`;
}

function updateDuration(id, startTime, endTime) {
    $.ajax({
        url: 'update-duration.php',
        type: 'POST',
        data: { id: id, START_TIME: startTime, END_TIME: endTime },
        success: function(response) {
            if (response === 'Success') {
                const duration = calculateDuration(startTime, endTime);
                $(`td[data-id="${id}"][data-field="duration"]`).text(duration);
                updateStatus(id, duration);
            } else {
                alert('Failed to update duration: ' + response);
            }
        },
        error: function() {
            alert('Failed to update duration');
        }
    });
}

function updateStatus(id, duration) {
    const est = $(`td[data-id="${id}"][data-field="est"]`).text();

    const durationParts = duration.split(' ');
    const durationHours = parseInt(durationParts[0], 10);
    const durationMinutes = parseInt(durationParts[2], 10);

    const estParts = est.split(' ');
    const estHours = parseInt(estParts[0], 10);
    const estMinutes = parseInt(estParts[2], 10);

    if (isNaN(durationHours) || isNaN(durationMinutes) || isNaN(estHours) || isNaN(estMinutes)) {
        console.error('One or more of the values are NaN. Please check the input values.');
        return;
    }

    const durationTotalMinutes = (durationHours * 60) + durationMinutes;
    const estTotalMinutes = (estHours * 60) + estMinutes;

    const diffMinutes = durationTotalMinutes - estTotalMinutes;
    const absDiffMinutes = Math.abs(diffMinutes);
    const diffHours = Math.floor(absDiffMinutes / 60);
    const diffMinutesFinal = absDiffMinutes % 60;

    let statusText = '';
    let statusClass = '';

    if (diffMinutes > 0) {
        statusClass = 'status-red';
        statusText = `WAKTU LEBIH <br> ${diffHours} jam, ${diffMinutesFinal} menit`;
    } else {
        statusClass = 'status-green';
        statusText = `WAKTU CUKUP <br> ${diffHours} jam, ${diffMinutesFinal} menit`;
    }

    $(`td[data-id="${id}"][data-field="status"]`).removeClass('status-red status-green').addClass(statusClass).html(statusText);

    $.ajax({
        url: 'update-status.php',
        type: 'POST',
        data: { id: id, STATUS: statusText, START_TIME: startTime, END_TIME: endTime},
        success: function(response) {
            if (response !== 'Success') {
                alert('Failed to update status: ' + response);
            }
        },
        error: function() {
            alert('Failed to update status');
        }
    });
}

$(document).ready(function() {
    $('input[name="START_TIME"], input[name="END_TIME"]').on('change', function() {
        const id = $(this).data('id');
        const startTime = $(`input[name="START_TIME"][data-id="${id}"]`).val();
        const endTime = $(`input[name="END_TIME"][data-id="${id}"]`).val();
        
        if (startTime && endTime) {
            updateDuration(id, startTime, endTime);
        } else if ($(this).attr('name') === 'START_TIME') {
            updateStartTime(id, startTime);
        } else if ($(this).attr('name') === 'END_TIME') {
            updateEndTime(id, endTime);
        }
    });
});