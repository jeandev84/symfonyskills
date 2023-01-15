/**
 * Javascript Modal windows
 * Alert - Used to show a message to the user
*/
// alert('Welcome to this Javascript course!');


/**
 * Prompt windows - Displays a message and an input field to the user
 * 1. returns the value entered in the input field when OK button is clicked
 * 2. empty string is returned if nothing is entered in the input field and OK button is clicked
 * 3. null is returned when user clicks on CANCEL button
*/

// let age = prompt('Please enter your age', 20);
// console.log(age);


/**
 * Confirm - Used to get confirmation from the user
 * Returns true if user clicks on OK button
 * Returns false if user clicks on cancel button
*/
/*
let confirmationDel = confirm('Do you really want to delete this item ?');
console.log(confirmationDel);


if (confirmationDel) {
    // write the logic to delete the item
}
*/


/**
 * Custom Alert modal window
*/


let alertBtn       = document.getElementById('btn-alert');
let alertElement   = document.querySelector('.alert');
let overlayElement = document.querySelector('.overlay');
let alertOk        = document.getElementById('alertOK');


function showAlert() {
    alertElement.classList.remove('hidden');
    overlayElement.classList.remove('hidden');
}

function hideAlert() {
    alertElement.classList.add('hidden');
    overlayElement.classList.add('hidden');
}

alertBtn.addEventListener('click', showAlert);


alertOk.addEventListener('click', hideAlert);


/**
 * Custom prompt modal window
*/

let promptBtn     = document.getElementById('btn-prompt');
let promptElement = document.querySelector('.prompt');
let promptOK      = document.getElementById('promptOK');
let promptCancel  = document.getElementById('promptCancel');
let inputAge      = document.getElementById('inputAge');

function showPrompt() {
    promptElement.classList.remove('hidden');
    overlayElement.classList.remove('hidden');
}

function hidePrompt(event) {

    // console.log(event);
    // console.log(event.target);
    // console.log(event.target.textContent);

    let age

    console.log(event.target.textContent);

    if (event.target.textContent === 'OK') {
        age = inputAge.value;
    } else {
        age = null;
    }

    console.log(age);

    promptElement.classList.add('hidden');
    overlayElement.classList.add('hidden');
}


// Prompts events
promptBtn.addEventListener('click', showPrompt)
promptOK.addEventListener('click', hidePrompt);
promptCancel.addEventListener('click', hidePrompt);





/**
 * Handling Keyboard events
 *
 * keydown, keypress, keyup
 *
 * KeyboardEven {isTrusted: true, key: 'Enter', code: 'Enter', location: 0, ctrlKey: false. ...}
 * KeyboardEven {isTrusted: true, key: 'g', code: 'KeyG', location: 0, ctrlKey: false. ...}
*/

// e.g Tap [ENTER], or [OTHER SYMBOL of Computer keyboard]
document.addEventListener('keydown', function (event) {
    // console.log(event);
    // console.log(event.key);
    console.log(`${event.key} is pressed on keyboard`)

    if (event.key === 'Enter') {
        if (! alertElement.classList.contains('hidden')) {
            hideAlert();
        }
    }
});



