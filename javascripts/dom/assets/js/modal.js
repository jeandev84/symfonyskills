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
divElement.classList.add('import-update');
divElement.style.marginTop = "30px";



// 2. Create a text content
// let textNode = document.createTextNode('This is a dynamically generated text content');
// divElement.appendChild(textNode);


// Create H2 element
let h2Element = document.createElement('h2');
h2Element.textContent = "Important Update";
divElement.appendChild(h2Element);

let pElement = `
<p>
Here we have an important update for all our student.
We are going to have a live free class on Thuresday July 2022, 2021 to discuss about
the new features in the latest release of ES2021.
</p>`;

// divElement.innerHTML = pElementText; Ecrase les elements precedents
divElement.insertAdjacentHTML('beforeend', pElement);

/*
divElement.insertAdjacentHTML('beforebegin', pElement);
divElement.insertAdjacentHTML('afterbegin', pElement);
divElement.insertAdjacentHTML('beforeend', pElement);
divElement.insertAdjacentHTML('afterend', pElement);
*/


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

// listDivClass is a child of <div class="content"></div>
let listDivClass = document.querySelector('.list');
contentDiv.insertBefore(divElement, listDivClass);




/**
 * Adding element dynamically on click to webpage
*/

const imgSrc = '/assets/images/students/avatar/';

// 1. Create a div and add it to webpage
let studentDivElement = document.createElement('div');
studentDivElement.classList.add('student-list');

let contentParentDiv = document.querySelector('.content');
contentParentDiv.appendChild(studentDivElement);


// 2. Add event listener on submit button
let submitBtn = document.getElementById('btn');
submitBtn.addEventListener('click', displayStudentDetails)


let i = 0;


// 3. Create displayStudentDetails function
function displayStudentDetails() {

    /**
     * Collecting Form Data using Javascript
    */
    // let form = {
    //     firstname: document.getElementById('firstname').value,
    //     lastname: document.getElementById('lastname').value,
    //     email: document.getElementById('email').value,
    //     country: document.querySelector('#country').value,
    //     gender: document.querySelector('input[name="gender"]:checked').value,
    //     hobbies: [{}]
    // }

    /*
    let attrNameFirstname = document.getElementById('firstname').name;
    let dataNames = document.getElementById('firstname').dataset;
    let dataInputField = document.getElementById('firstname').dataset.inputField;
    */

    /**
     * How to collect data from text
    */
    let firstname = document.getElementById('firstname').value;
    let lastname  = document.getElementById('lastname').value;
    let email     = document.getElementById('email').value;


    /**
     * Getting selected value from a dropdown list
    */
    let country   = document.querySelector('#country').value;


    /**
     * Getting value of checked radio button
     */
    let gender = document.querySelector('input[name="gender"]:checked').value;


    // /**
    //  * Selecting all checked checkbox
    // */
    // let hobbies    = [];
    //
    // let checkboxes = document.getElementsByName('hobbies[]');
    //
    // for (let i = 0; i < checkboxes.length; i++) {
    //     if (checkboxes[i].checked) {
    //         hobbies.push(checkboxes[i].value)
    //     }
    // }


    // form.hobbies = hobbies;

    /**
     * Log form
    */
    // console.log(form)
    // <img src="/assets/images/students/avatar/${gender}_avatar.png" width="70" alt="Student Image">

    /* let source = gender === 'male' ? '/assets/images/students/avatar/male_avatar.png' : '/assets/images/students/avatar/female_avatar.png'; */
    let source = gender === 'male' ? 'male_avatar.png' : 'female_avatar.png';

    let studentCardHTMLToAdd = `
            <div class="card">
               <img src="/assets/images/students/avatar/${source}" width="70" height="70" alt="Student Image">
               <div class="student-details">
                   <div class="std-name">${firstname} ${lastname}</div>
                   <div class="std-email"><i>${email}</i></div>
                   <div class="std-country">${country}</div>
               </div>
               <div class="div-remove-card">
                   <button class="remove-card" id="remove-card-${i}">X</button>
               </div>
            </div>
    `;

    studentDivElement.insertAdjacentHTML('beforeend', studentCardHTMLToAdd);


    // Removing object
    let removeCardBtn = document.querySelector('#remove-card-' + i);

    // console.log(removeCardBtn);
    removeCardBtn.addEventListener('click', function () {

        // console.log(this);
        // console.log(this.parentNode.parentNode);

        let confirmStudentToDelete = confirm('Do you really want to delete this student ?');

        if (confirmStudentToDelete) {
            let studentCardElementHTMLToRemove = this.parentNode.parentNode;
            studentDivElement.removeChild(studentCardElementHTMLToRemove);
        }
    });

    i++;
}








