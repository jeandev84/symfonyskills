/**
 * Window Object control all window object: {window: Window, self: Window, document: document, name: '', location: Location, …}
 *
 * console.log(window)
*/

/*
console.log(window)
window {window: Window, self: Window, document: document, name: '', location: Location, …}
console.log(window.document)
console.log(window.document.getElementById("elementId"));
console.log(window.document.querySelector("#elementId"));

# Create a new element e.g : paragraph
let newParagraph = document.createElement('p');
let pContent     = document.createTextNode('I am new paragraph');

newParagraph.appendChild(pContent);
document.body.appendChild(newParagraph);
*/


/**
 * Accessing and Manipulating DOM elements
 * You can access a webpage element only by its ID
 * using getElementById() method
*/

/*
let p = document.getElementById('intro');
console.log(p)


let obj = {
    name: "",
    username: "",
    getFullName: function() {
       return this.name + this.username;
    }
}

obj.name = 'Jean-Claude'
console.log(obj.name)

let formObj = {
    sendForm: function (form) {
         return "form sent ..." + form;
    }
}


console.log(formObj.sendForm(1))
*/


