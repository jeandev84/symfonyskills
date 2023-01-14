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

===================================================================================================
# Create a new element e.g : paragraph
===================================================================================================

let newParagraph = document.createElement('p');
let pContent     = document.createTextNode('I am new paragraph');

newParagraph.appendChild(pContent);
document.body.appendChild(newParagraph);

=================================================================================================
# Object manipulate
=================================================================================================
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
    payload: {},
    setAttributes: function(payload) {
       this.payload = payload
    },
    send: function (form) {
         return "form sent ..." + form;
    }
}

console.log(formObj.send(1))
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
    payload: {},
    setAttributes: function(payload) {
       this.payload = payload
    },
    send: function (form) {
         return "form sent ..." + form;
    }
}

console.log(formObj.send(1))

=====================================================================
console.log('GET ELEMENT BY ID')
console.log('===============================================')
let p = document.getElementById('intro');
console.log(p)
console.log('===============================================')
console.log('GET ELEMENT BY QUERY SELECTOR')
console.log('===============================================')
let div = document.querySelector('.list');
console.log(div)
*/


function printHeader(title) {
    console.log('START LOG ['+ title +']')
    console.log('===============================================')
}


function printFooter() {
    console.log('END LOG')
    console.log('===============================================')
    console.log('\n')
}

function consoleLog(element, title = 'ELEMENT') {
    printHeader(title)
    console.log(element);
    printFooter()
}


/**
 * HtmlElement
 *
 * @type {HTMLElement}
*/


let p = document.getElementById('intro');
consoleLog(p, 'GET ELEMENT BY ID');

let div = document.querySelector('.list');
consoleLog(div, 'GET ELEMENT BY QUERY SELECTOR')
