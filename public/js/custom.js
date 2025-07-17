
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

function ajaxFormSubmit(form){

    var action = form.getAttribute("action");
    var method = form.getAttribute("method");
    var formData = new FormData(form);

        $.ajax({
            url:action,
            type : method,
            data : formData,
            processData: false,
            contentType: false,
            success:function(response){
                showMessageModal(response.message, response.color);
                console.log(response?.error);
            }
        });
}
