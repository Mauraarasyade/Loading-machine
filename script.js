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