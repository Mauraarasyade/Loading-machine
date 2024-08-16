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
    }
}

function checkAvailability(selectedElement) {
    const selectedValue = selectedElement.value;
    let isValueUsed = false;

    document.querySelectorAll('.machineColorSelect').forEach(function(select) {
        if (select !== selectedElement && select.value === selectedValue) {
            isValueUsed = true;
        }
    });

    if (isValueUsed) {
        alert("Sedang digunakan");
        selectedElement.value = '';
        updateSelectColor(selectedElement);
        return;
    }

    document.querySelectorAll('.machineColorSelect').forEach(function(select) {
        if (select !== selectedElement) {
            select.querySelectorAll('option').forEach(function(option) {
                if (option.value === selectedValue) {
                    option.disabled = true;
                } else {
                    if (!isOptionUsedElsewhere(option.value)) {
                        option.disabled = false;
                    }
                }
            });
        }
    });
}

function isOptionUsedElsewhere(value) {
    let isUsed = false;
    document.querySelectorAll('.machineColorSelect').forEach(function(select) {
        if (select.value === value) {
            isUsed = true;
        }
    });
    return isUsed;
}

window.addEventListener('load', function() {
    document.querySelectorAll('.machineColorSelect').forEach(function(select) {
        updateSelectColor(select);
        const selectedValue = select.value;
        document.querySelectorAll('.machineColorSelect').forEach(function(otherSelect) {
            if (otherSelect !== select) {
                otherSelect.querySelectorAll('option').forEach(function(option) {
                    if (option.value === selectedValue) {
                        option.disabled = true;
                    }
                });
            }
        });
    });
});

function submitForm() {
const form = document.getElementById('posForm');
const formData = new FormData(form);

fetch(form.action, {
method: 'POST',
body: formData,
})
.then(response => response.text())
.then(data => {
console.log('Server response:', data);
if (data.trim() === "Success") {
    window.location.href = "data.php";
} else {
    alert(data);
}
})
.catch(error => {
console.error('Error:', error);
});
}


document.addEventListener('DOMContentLoaded', function() {
    const columns = document.querySelectorAll('.actual');

    columns.forEach((column, columnIndex) => {
        let currentStep = 1;
        const buttons = column.querySelectorAll('.actual-btn');

        buttons.forEach(button => {
            const isActive = localStorage.getItem(`column-${columnIndex}-button-${button.value}`);
            if (isActive === 'true') {
                button.classList.add('active');
                currentStep = Math.max(currentStep, parseInt(button.value) + 1);
            }
        });

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const buttonKey = `column-${columnIndex}-button-${button.value}`;
                const isActive = localStorage.getItem(buttonKey) === 'true';
                const buttonValue = parseInt(button.value);

                if (buttonValue !== currentStep) {
                    if (buttonValue < currentStep) {
                        return;
                    } else {
                        alert(`Anda harus mengklik tombol ${currentStep} terlebih dahulu`);
                        return;
                    }
                }

                if (isActive) {
                    button.classList.remove('active');
                    localStorage.setItem(buttonKey, 'false');
                } else {
                    button.classList.add('active');
                    localStorage.setItem(buttonKey, 'true');
                    currentStep++;
                }
            });
        });
    });
});

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