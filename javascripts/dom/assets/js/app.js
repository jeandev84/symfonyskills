/**
 * Useful functions
*/

function jsQuery(anchor) {
    return document.querySelector(anchor);
}

function jsElementsByName(name) {
    return document.getElementsByName(name);
}

function jsElementById(id) {
    return document.getElementById(id);
}

function jsElementByClassname(classname) {
    return document.getElementsByClassName(classname);
}



/**
 * Collecting form data
 * How to collect data from text boxes
*/


let firstname = jsElementById("firstname").value;
let lastname  = jsElementById("lastname").value;
let email     = jsElementById("email").value;


/**
 * Getting selected value from a dropdown list
*/

let country  = jsQuery('#country').value;


/**
 * Getting value of checked radio button
*/

let gender = jsQuery('input[name="gender"]:checked').value;



/**
 * Getting all selecting checked checkboxes
*/

let hobbies = [];
let checkboxes = jsElementsByName('hobbies[]');

for(let i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        hobbies.push(checkboxes[i].value);
    }
}

console.log(hobbies);


