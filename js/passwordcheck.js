const pwd = document.getElementById("password");
const cpwd = document.getElementById("confirmpassword");
const msg = document.getElementById("checkMessage");

cpwd.addEventListener("keyup", () => {
    if (pwd.value === cpwd.value) {
        msg.style.color = "green";
        msg.textContent = "Passwords match";
    } else {
        msg.style.color = "red";
        msg.textContent = "Passwords do not match";
    }
});
