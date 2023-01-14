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
 * 1. Method: getElementById() methods returns null if no webpage element is present with specified ID
 *
 * 2. If more than one element with the same ID is present in the webpage, then only first will be returned.
 *
 @type {HTMLElement}
*/

let valueOfNullElement = document.getElementById('idOfNullElement');
// consoleLog(valueOfNullElement, 'document.getElementById(idOfNullElement)');

let p = document.getElementById('intro');
// consoleLog(p, 'document.getElementById(IdNameOfElement)');


/**
 * QuerySelector()
 *
 * 1. Method: querySelector() methods returns null if no webpage,
 * element is present with specified ID, class or Tag
 *
 * 2. If more than one element with the same ID, class, or tag is present in the webpage,
 * then only first element will be returned by querySelector()
 *
 * @type {Element}
*/
let div = document.querySelector('.list');
// consoleLog(div, 'document.querySelector(.ClassNameOfElement)')

let h1 = document.querySelector('#heading');
// consoleLog(h1, 'document.querySelector(#IdNameOfElement)')

let img = document.querySelector('img');
// console.log(img, 'document.querySelector(ImageTagName)')


/**
 * How to read webpage elements data
 * Read element content
 *
 * Property "textContent" is used to read the content of webpage element
*/

let pContent = p.textContent;
// console.log(pContent);


/**
 * InnerHTML : returns the HTML content of a webpage element
*/

let divContent = div.innerHTML;
// console.log(divContent)

/**
 * Modifying webpage content
*/
// console.log(div.innerHTML);
/*
let dynamicContent = document.getElementById('dynamicContent');
dynamicContent.textContent = 'This is a dynamically generated paragraph.';


div.innerHTML  = `
<table border="1">
    <thead>
       <th>ID</th>
       <th>Actions</th>
    </thead>
    <tbody>
        <tr>
           <td>1</td>
           <td>Accessing DOM element</td>
        </tr>
        <tr>
           <td>2</td>
           <td>Modifying DOM element</td>
        </tr>
        <tr>
           <td>3</td>
           <td>Adding DOM element</td>
        </tr>
        <tr>
           <td>4</td>
           <td>Removing DOM element</td>
        </tr>
    </tbody>
</table>
`;
*/


/**
 * Changing attribute and style of webpage element
 * How to change the attribute value of a webpage element
 *
 * Image object [attributes: src, height, width ...]
*/

let image = document.querySelector('img');
// console.log(image.src);
image.src    = '/assets/images/forest.jpeg'; // <img src="/assets/images/forest.jpeg">
// image.height = '200'; <img height="200">
// image.width  = '500'; <img width="500">


/**
 * Add styles dynamically to webpage element
*/
let heading = document.getElementById('heading');
heading.style.color = 'red'; style="color:red"

let listDiv = document.querySelector('.list');
// listDiv.style.backgroundColor = 'yellow'; // <div class="list" style="background: #fff0">


/**
 * Adding and removing class from a webpage element
 * Removing a class from a webpage element
*/

// REMOVE HTML ELEMENT
/* console.log(document.querySelector('.block-to-remove').classList); */
// document.querySelector('.block-to-remove').remove();
// document.querySelector('.header').classList.remove('header');
document.querySelector('.block-to-remove').classList.remove('btn-to-remove');



// ADD STYLE TO HTML ELEMENT
document.querySelector('.list').classList.add('dynamic')


/**
 * Collecting Form Data using Javascript
*/

let form = {
    firstname: document.getElementById('firstname').value,
    lastname: document.getElementById('lastname').value,
    email: document.getElementById('email').value,
    country: document.querySelector('#country').value,
    gender: document.querySelector('input[name="gender"]:checked').value,
    hobbies: [{}]
}

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


/**
 * Selecting all checked checkbox
*/
let hobbies    = [];
let checkboxes = document.getElementsByName('hobbies[]');

for (let i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        hobbies.push(checkboxes[i].value)
    }
}

form.hobbies = hobbies;

/**
 * Log form
*/
console.log(form)


/**
 * Events and Event handlers
 * onfocus, onblur, onclick, onsubmit, onmouseover
*/

let lName = document.getElementById('lastname');

lName.onfocus = function () {
    lName.style.backgroundColor = 'yellow';
};

lName.onblur  = function () {
    lName.style.backgroundColor = 'white';
}


let formH2 = document.querySelector('#registration');

formH2.onmouseover = function () {
    formH2.style.color = 'red';
}

formH2.onmouseout = function () {
    formH2.style.color = 'black';
}


/**
 * Event Handling:addEventLister(eventName, callback()) method
 *
 * submitButton.addEventListener('click', function () {
 *       ... do something
 * });
*/

/*
function displayAlert() {
    alert('You clicked on submit button')
}

let submitButton = document.getElementById('btn');

submitButton.addEventListener('click', displayAlert);
*/


let submitButton = document.getElementById('btn');

submitButton.addEventListener('click', function () {
    alert('You clicked on submit button');
})


let eMailText = document.getElementById('email');

eMailText.addEventListener('focus', function () {
    eMailText.style.backgroundColor = 'yellow';
})

eMailText.addEventListener('blur', function () {
    // document.getElementById('email').style.backgroundColor = 'white';
    // here this = document.getElementById('email');
    console.log(this)
    this.style.backgroundColor = 'white';
})
