document.addEventListener('DOMContentLoaded', function() {
    const machineColors = document.querySelectorAll('.machineColorSelect');
    
    machineColors.forEach(function(selectElement) {
        const storageKey = 'machineColorValue_' + selectElement.dataset.key;
        const savedValue = localStorage.getItem(storageKey);

        if (savedValue) {
            selectElement.value = savedValue;
            updateSelectColor(selectElement);
        }

        selectElement.addEventListener('change', function() {
            console.log('Changed select:', selectElement.dataset.key, selectElement.value);
            updateSelectColor(selectElement);
            localStorage.setItem(storageKey, selectElement.value);
        });
    });
});

function updateSelectColor(selectElement) {
    const value = selectElement.value;
    if (value.startsWith('GMC')) {
        selectElement.style.backgroundColor = 'blue';
        selectElement.style.color = 'white';
        selectElement.style.fontWeight = 'bold';
    } else if (value.startsWith('GEC')) {
        selectElement.style.backgroundColor = 'green';
        selectElement.style.color = 'white';
        selectElement.style.fontWeight = 'bold';
    } else if (value.startsWith('GDC')) {
        selectElement.style.backgroundColor = 'brown';
        selectElement.style.color = 'white';
        selectElement.style.fontWeight = 'bold';
    } else {
        selectElement.style.backgroundColor = 'white';
        selectElement.style.color = 'black';
        selectElement.style.fontWeight = 'bold';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('input[name="END_TIME"]').forEach(function(input) {
        input.addEventListener('change', function() {
            var row = input.closest('tr');
            var prioritasCell = row.querySelector('.prioritas');
            var id = input.getAttribute('data-id');
            
            if (input.value) {
                prioritasCell.textContent = '-';
                updatePrioritasInDatabase(id, '-');
            } else {
                var originalPrioritas = prioritasCell.getAttribute('data-original-prioritas');
                prioritasCell.textContent = originalPrioritas;
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

function updateDate(id, date) {
    $.ajax({
        url: 'update-date.php',
        type: 'POST',
        data: { id: id, DATE: date },
        success: function(response) {
            if (response === 'Success') {
                alert('Date updated successfully');
            } else {
                alert('Failed to update date: ' + response);
            }
        },
        error: function() {
            alert('Failed to update date');
        }
    });
}

$(document).ready(function() {
    $('input[name="DATE"]').on('change', function() {
        const id = $(this).data('id');
        const date = $(this).val();
        updateDate(id, date);
    });
});