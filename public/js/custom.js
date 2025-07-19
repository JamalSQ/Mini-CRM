
// This function dynamically listen to all the form on current loaded page and then listen
// to on their submit and then pass that form to ajaxFormSubmit function
document.addEventListener('DOMContentLoaded', function() {
  const forms = document.querySelectorAll('form.ajax-form');

  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      ajaxFormSubmit(form);
    });
  });
});

function ajaxFormSubmit(form) {
    var action = form.getAttribute("action");
    var method = form.getAttribute("method");
    var formData = new FormData(form);

    // Clear previous errors
    clearFormErrors(form);

    $.ajax({
        url: action,
        type: method,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {

            console.log(response);
            var redirectRoute = response.redirect || "/";
            showMessageModal(response.message, response.color, redirectRoute);
        },
        error: function(xhr) {
            console.log(xhr);
            if (xhr.status === 422) {
                const errors = xhr.responseJSON?.errors || xhr.responseJSON?.error || {};
                displayFormErrors(form, errors);
            } else {
                showMessageModal("An unexpected error occurred.", "danger","/");
            }
        }
    });
}

function clearFormErrors(form) {
    // Remove previous validation classes and messages
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    form.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
}

function displayFormErrors(form, errors) {
    for (const fieldName in errors) {
        const field = form.querySelector(`[name="${fieldName}"]`);
        if (field) {
            field.classList.add('is-invalid');

            // Create error div and append
            const errorDiv = document.createElement('div');
            errorDiv.classList.add('invalid-feedback');
            errorDiv.innerText = errors[fieldName][0]; // show only first error
            field.parentNode.appendChild(errorDiv);
        }
    }
}
