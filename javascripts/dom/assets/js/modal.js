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
 * Adding Elements Dynamically to Webpage
*/

/*
 appendChild()
 <div>
   <p>Paragraph 1</p>
   <p>Paragraph 2</p>
   <p>Paragraph 3</p>
   <text>Text Node appended after last child of div element created!</text>
 </div>
*/

// 1. Create a DIV element
let divElement = document.createElement('div');


// 2. Create a text content
let textNode = document.createTextNode('This is a dynamically generated text content');
divElement.appendChild(textNode);


// 3. Add the created DIV to the webpage
let contentDiv = document.querySelector('.content');

/*
containerDiv.appendChild(divElement);
 appendChild()
 <div>
   <p>Paragraph 1</p>
   <p>Paragraph 2</p>
   <p>Paragraph 3</p>
   <text>Text Node appended after last child of div element created!</text>
 </div>
*/

let listDivClass = document.querySelector('.list');
contentDiv.insertBefore(divElement, listDivClass);




