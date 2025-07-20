function showMessageModal(
    message,
    type = "info",
    redirectRoute,
    timeout = 1000
) {
    /*
    type: 'info' (blue), 'success' (green), 'error' (red), 'warning' (yellow)
  */

    const modal = document.getElementById("messageModal");
    const textEl = document.getElementById("messageText");
    const iconEl = document.getElementById("messageIcon");

    // Set message text
    textEl.textContent = message;

    // Reset classes
    modal.classList.remove(
        "show",
        "hide",
        "bg-primary",
        "bg-success",
        "bg-danger",
        "bg-warning"
    );
    iconEl.innerHTML = "";

    // Set background and icon based on type
    switch (type) {
        case "success":
            modal.classList.add("bg-success");
            iconEl.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M16 2a2 2 0 0 1-2 2h-9a.5.5 0 0 0 0 1h9a3 3 0 0 0 0-6H3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h11a3 3 0 0 0 1-5.75V2z"/></svg>';
            break;
        case "error":
            modal.classList.add("bg-danger");
            iconEl.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm3.146 9.146a.5.5 0 1 1-.708.708L8 8.707 5.854 10.854a.5.5 0 1 1-.708-.708L7.293 8 5.146 5.854a.5.5 0 1 1 .708-.708L8 7.293l2.146-2.147a.5.5 0 0 1 .708.708L8.707 8l2.147 2.146z"/></svg>';
            break;
        case "warning":
            modal.classList.add("bg-warning");
            iconEl.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" class="text-dark" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M8.982 1.566a1.13 1.13 0 0 0-1.964 0L.165 13.233c-.457.778.091 1.767.982 1.767h13.707c.89 0 1.439-.99.982-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1-.002-2 1 1 0 0 1 .002 2z"/></svg>';
            break;
        default:
            modal.classList.add("bg-primary");
            iconEl.innerHTML =
                '<svg xmlns="http://www.w3.org/2000/svg" class="text-white" width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a7 7 0 1 1 0 14A7 7 0 0 1 8 1z"/></svg>';
    }

    modal.style.display = "block";
    modal.classList.add("show");

    if (timeout > 0) {
        setTimeout(() => {
            hideMessageModal(redirectRoute);
        }, timeout);
    }
}

function hideMessageModal(redirectRoute) {
    const modal = document.getElementById("messageModal");

    console.log("redirect route: ", redirectRoute);

    // Wait for fade-out animation (300ms), then hide completely
    setTimeout(() => {
        modal.classList.remove("show");
        modal.classList.add("hide");
        modal.style.display = "none";
        modal.classList.remove("hide");
        window.location = redirectRoute;
    }, 300);
}

(function () {
    "use strict";

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll(".needs-validation");

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();
