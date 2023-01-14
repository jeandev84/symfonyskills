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

let confirmationDel = confirm('Do you really want to delete this item ?');
console.log(confirmationDel);


if (confirmationDel) {
    // write the logic to delete the item
}
