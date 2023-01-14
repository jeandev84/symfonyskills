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