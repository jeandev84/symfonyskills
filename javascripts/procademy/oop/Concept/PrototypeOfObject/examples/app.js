// Constructor function
let Person = function (name, gender, birthYear) {
     this.name      = name;
     this.gender    = gender;
     this.birthYear = birthYear;
}


// inheritance
Person.prototype.calculateAge = function () {
    let age = new Date().getFullYear() - this.birthYear;
    console.log(age);
};

Person.prototype.city = 'London';


let john = new Person('John', 'Male', 1990);
// john.calculateAge();
console.log(john);
// console.log(john.hasOwnProperty('city'));
// console.log(john.Prototype === Person.prototype);


let merry = new Person('Merry', 'Female', 1995);
// merry.calculateAge();
console.log(merry);


let steve = new Person('Steve', 'Male', 1989);
// steve.calculateAge();
console.log(steve);



// Prototype Chaining

// Every object we create in Javascript is directly or indirectly an instance of object constructor

// let mark = new Object(); - empty object
// mark.name = 'Mark';
// mark.birthYear = 1992;
// mark.gender = 'Male';


let mark = {
    name: 'Mark',
    birthYear: 1992,
    gender: 'Male'
};

// console.log(mark);
// console.log(mark instanceof Object);
// console.log(mark.hasOwnProperty('name'));
// console.log(mark.hasOwnProperty('foo'));
// console.log(Person instanceof Object);


let arr = [10, 20, 30];
console.log(arr);
console.log(arr instanceof Array);
// new Array();
// arr.push();
// arr.unshift();
// arr.pop();

