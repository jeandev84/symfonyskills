// console.log("Window location:", window.location)

// http://localhost:5555/?page=3&search=something&productId=3
const queryParamsValues = window.location.search;
// console.log("Keys & Values:", queryParamsValues);

const urlParams = new URLSearchParams(queryParamsValues);
//console.log(urlParams);

let page      = urlParams.get('page');
let search    = urlParams.get('search')
let productId = urlParams.get('productId');


console.log(`{"page": ${page}, "search": "${search}", "productId": ${productId}}`);