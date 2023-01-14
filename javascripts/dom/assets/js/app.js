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

========================================================
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


let $ = {
  jsQuery: function() {
     return document.querySelector()
  }
};
let jsQuery = {
    selectById: function (id) {
         return document.getElementById(id);
    },
    selectQuery: function (anchor) {
         return document.querySelector(anchor);
    }
}


let htmlElement = {

}

let formObj = {

}


let $ = {
    elementName: "",
    elementObj: {},
    log: function(element) {
      return console.log(element)
    },
    jsQuery: function(elementName) {
        this.elementName = elementName;
        // return document.querySelector()
    },
    form: function (formObj) {
        // return formObj;
    }
};

$.jsQuery();

=========================================================

let $ = {
  jsQuery: function (selectorName) {
     return jsQuery(selectorName);
  }
}

let jsQuery = {
   selectorName: "",

}
*/


/**
 * Useful functions
*/

function printHeader(title) {
    console.log('starting ['+ title +']')
    console.log('===============================================')
}


function printFooter() {
    console.log('===============================================')
    console.log('end log')
    console.log('\n')
}

function consoleLog(element, title = 'ELEMENT') {
    printHeader(title)
    console.log(element);
    printFooter()
}


/**
 * Accessing and Manipulating DOM elements
 * You can access a webpage element only by its ID
 * using getElementById() method
 *
 * getElementById() methods returns null if no webpage element is present with specified ID
 *
 @type {HTMLElement}
*/
let valueOfNullElement = document.getElementById('idOfNullElement');
consoleLog(valueOfNullElement, 'document.getElementById(idOfNullElement)');

let p = document.getElementById('intro');
consoleLog(p, 'document.getElementById(IdNameOfElement)');


/**
 * querySelector() methods returns null if no webpage,
 * element is present with specified ID, class or Tag
 *
 * @type {Element}
*/
let div = document.querySelector('.list');
consoleLog(div, 'document.querySelector(.ClassNameOfElement)')

let h1 = document.querySelector('#heading');
consoleLog(h1, 'document.querySelector(#IdNameOfElement)')

let img = document.querySelector('img');
console.log(img, 'document.querySelector(ImageTagName)')
