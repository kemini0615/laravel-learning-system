const toggle = document.getElementById("toggle-password");
const password = document.getElementById("password");
const toggleConfirm = document.getElementById("toggle-confirm-password");
const confirmPassword = document.getElementById("password_confirmation");

toggle.addEventListener("click", (event) => {
    event.preventDefault();
    const currentType = password.getAttribute("type");

    if (currentType === "password") {
        password.setAttribute("type", "text");
    } else {
        password.setAttribute("type", "password");
    }
});

toggleConfirm.addEventListener("click", (event) => {
    event.preventDefault();
    const currentType = confirmPassword.getAttribute("type");

    if (currentType === "password") {
        confirmPassword.setAttribute("type", "text");
    } else {
        confirmPassword.setAttribute("type", "password");
    }
});
