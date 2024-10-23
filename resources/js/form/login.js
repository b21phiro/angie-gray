const FORM_ID = "login-form";
const EMAIL_ID = "email";
const PASSWORD_ID = "password";

const VALIDATE_PATTERN = {
    EMAIL: new RegExp('^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$')
};

let form;
let email;
let password;

let emailFirstTime = true;
let passwordFirstTime = true;

let emailValid = false;
let passwordValid = false;

function validateEmail() {

    if (!email.value.length) {
        return false;
    }

    emailFirstTime = true;

    if (!emailFirstTime) {
        return false;
    }

    if (!VALIDATE_PATTERN.EMAIL.test(email.value)) {
        email.parentElement.classList.add('error');
    } else {
        email.parentElement.classList.remove('error');
    }

}

function validatePassword() {

    if (!password.value.length) {
        return false;
    }

    passwordFirstTime = false;

    if (!passwordFirstTime) {
        return false;
    }

    console.log(password.value.length);

    if (password.value.length < 1) {
        console.log("Password must be between 1 and 2");
        password.parentElement.classList.add('error');
    } else {
        password.parentElement.classList.remove('error');
    }

}

function init() {

    form     = document.getElementById(FORM_ID);
    email    = document.getElementById(EMAIL_ID);
    password = document.getElementById(PASSWORD_ID);

    if (!form || !email || !password) { return false; }

    email.addEventListener('change', validateEmail);
    password.addEventListener('change', validatePassword);

}

export default { init };
