/**
 *
*/


const form = document.querySelector('form');

form.addEventListener('submit', (e) => {

    e.preventDefault();

    const formPayload = new FormData(form);

    // console.log(formPayload.getAll('hobbies[]'));

    /*
    for (let item of formPayload) {
         console.log(item);
    }*/

    const obj = Object.fromEntries(formPayload);

    // console.log(JSON.stringify(obj))

    const json = JSON.stringify(obj);
    localStorage.setItem('form', json);

    window.location.href = "confirm.html";

})