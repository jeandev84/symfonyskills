export default class FormValidator {
    constructor(selector) {

        this.form = document.querySelector(selector);
        this.inputsWithErrors = new Set();

        this.form.addEventListener("submit", e => {

             e.preventDefault();

             /*
             if (! this.hasErrors()) {
                 this.form.submit();
             }
             */

             if (! this.inputsWithErrors.size > 0) {
                  this.form.submit();
             }

        });
    }

    get hasErrors() {
        return this.inputsWithErrors.size > 0;
    }

    register(selector, check) {

        const inputField = this.form.querySelector(selector);
        const errorElement = inputField.closest(".input").querySelector(".input__error");

        const execute = (hideErrors) => {
            const { pass, error } = check(inputField.value, inputField)

            // console.log(pass)
            // console.log(error)

            if (!hideErrors) {
                errorElement.textContent = error || "";
            }

            if (!pass) {
                // console.log('pass', inputField)
                this.inputsWithErrors.add(inputField);
                // console.log(this.inputsWithErrors);

            } else {
                console.log('delete')
                this.inputsWithErrors.delete(inputField);
            }
        };

        inputField.addEventListener("change", () => execute());
        execute(true);
    }
}