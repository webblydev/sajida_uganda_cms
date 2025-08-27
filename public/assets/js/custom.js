function makeCourseEnrolRequest(event, id) {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "You want to enroll this course!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#02a499",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, confirm it!",
    }).then((result) => {
        if (result.isConfirmed) {
            if ($("#enroll-form-" + id).length > 0) {
                let form_id = $("#enroll-form-" + id);
                $(form_id).submit();
            } else {
                let form_id = $("#enroll-form-" + id);
                $(form_id).submit();
            }
        }
    });
    /*swal({
        title: "Are you sure?",
        text: "You will not be able to recover!",
        buttons: {
            cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "",
                closeModal: true
            },
            confirm: {
                text: "Yes, delete it!",
                value: true,
                visible: true,
                className: "",
                closeModal: false
            }
        },
        icon: "warning",
        dangerMode: true
    }).then(willDelete => {
        if (willDelete) {
            if ($("#delete-form-action-" + id).length > 0) {
                let form_id = $("#delete-form-action-" + id);
                $(form_id).submit();
            } else {
                let form_id = $("#delete-form-" + id);
                $(form_id).submit();
            }
        }
    });*/
}

// Job Filter Dropdown
let customSelects = document.querySelectorAll('.hex-select-js');

customSelects.forEach((element) => {
    const originalSelect = element.querySelector('select');
    const newSelect = document.createElement('div');
    newSelect.className = "custom-select";
    newSelect.innerHTML = '<span class="placeholder-text">' + originalSelect.options[0].text + '</span>';
    
    const optionsList = document.createElement('ul');
    optionsList.className = 'select-options';
    newSelect.appendChild(optionsList);
    
    for (i = 0; i < originalSelect.options.length; ++i) {
        const option = document.createElement('li');
        let optionText = originalSelect.options[i].text,
            optionValue = originalSelect.options[i].value;
        option.className = 'option-item';
        option.innerHTML = optionText;
        option.dataset.optionValue = optionValue;
        optionsList.appendChild(option);
        
        let event = new Event('change');
        
        // Adding the click function
        option.addEventListener('click', () => {
            newSelect.querySelector('span').innerHTML = optionText;
            originalSelect.value = optionValue;
            originalSelect.dispatchEvent(event);
        })
    }
  
    element.appendChild(newSelect);
    originalSelect.style.display = 'none';
    
    // Check if there is enough space above the custom select, if not, move options to the top
    let checkPosition = function (event) {
        const rect = element.getBoundingClientRect();
        const spaceAbove = rect.top;
        const spaceBelow = window.innerHeight - rect.bottom;

        if (spaceAbove < spaceBelow) {
        optionsList.style.top = '100%';
        optionsList.style.bottom = 'auto';
        optionsList.style.flexDirection = 'column';
        } else {
        optionsList.style.top = 'auto';
        optionsList.style.bottom = '100%';
        optionsList.style.flexDirection = 'column-reverse';
        }
    };
  
    newSelect.addEventListener('click', checkPosition, false);
    newSelect.addEventListener('mouseover', checkPosition, false);
});
// --end-- Job Filter Dropdown