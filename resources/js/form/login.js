const FORM_ID = "login-form";
const EMAIL_ID = "email";
const PASSWORD_ID = "password";
const SUBMIT_BUTTON_ID = "submitButton";
const SUBMIT_INPUT_ID = "submit";

const VALIDATE_PATTERN = {
    EMAIL: new RegExp('^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$'),
    PASSWORD: new RegExp('^$|\\s+'),
};

let form;
let email;
let password;

let submitInput;
let submitButton;

let emailFirstTime = true;
let passwordFirstTime = true;

let emailValid = true;
let passwordValid = true;

function validateEmail() {

    if (email.value.length > 0) {
        emailFirstTime = true;
    }

    if (!emailFirstTime) {
        return false;
    }

    if (!VALIDATE_PATTERN.EMAIL.test(email.value)) {
        emailValid = false;
        email.parentElement.classList.add('error');
    } else {
        emailValid = true;
        email.parentElement.classList.remove('error');
    }

    toggleSubmitButton();

}

function validatePassword() {

    if (password.value.length > 0) {
        passwordFirstTime = true;
    }

    if (!passwordFirstTime) {
        return false;
    }

    if (VALIDATE_PATTERN.PASSWORD.test(password.value)) {
        password.parentElement.classList.add('error');
        passwordValid = false;
    } else {
        password.parentElement.classList.remove('error');
        passwordValid = true;
    }

    toggleSubmitButton();

}

function toggleSubmitButton() {

    submitInput.disabled = !emailValid || !passwordValid;

    if (submitInput.disabled) {
        submitButton.classList.add('disabled');
    } else {
        submitButton.classList.remove('disabled');
    }

}

export default function init() {

    form         = document.getElementById(FORM_ID);
    email        = document.getElementById(EMAIL_ID);
    password     = document.getElementById(PASSWORD_ID);
    submitInput  = document.getElementById(SUBMIT_INPUT_ID);
    submitButton = document.getElementById(SUBMIT_BUTTON_ID);

    if (!form || !email || !password || !submitInput || !submitButton) { return false; }

    email.addEventListener('change', validateEmail);
    password.addEventListener('change', validatePassword);

    toggleSubmitButton();

}
