import FormValidator from "./FormValidator.js";

// fv: form validator
const fv = new FormValidator("#signup");


function validateLength(value, inputField) {
    if (value.length === 0 || value.length > 5) {
        return {
            pass: false,
            error: "Username must between 1-5 characters."
        }
    }

    return {
        pass: true
    }
}


fv.register("#username", validateLength);
// fv.register("#password", validateLength);

/*
fv.register("#username", (value, inputField) => {
    if (value.length === 0 || value.length > 5) {
        return {
            pass: false,
            error: "Username must between 1-5 characters."
        }
    }

    return {
        pass: true
    }
});
*/

window.fv = fv;