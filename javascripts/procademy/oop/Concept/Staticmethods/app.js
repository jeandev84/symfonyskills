// Static methods
/*
class Person {

    constructor(name, birthYear, gender) {
        this.name = name;
        this.birthYear = birthYear;
        this.gender = gender;
    }

    calculateAge() {
        console.log(new Date().getFullYear() - this.birthYear);
    }

    static greet() {
        console.log('Hey there! How are you?');
    }
}


let john = new Person('John', 1990, 'Male');
console.log(john);

// john.calculateAge();

// use class static method
Person.greet();
*/



let Person = function (name, gender, birthYear) {
    this.name = name;
    this.gender = gender;
    this.birthYear = birthYear;
}


// Attach method inheritance to prototype
Person.prototype.calculateAge = function () {
    let age = new Date().getFullYear() - this.birthYear;
    console.log(age)
}


// Add a static method simply
Person.greet = function () {
    console.log('Have a nice day!');
}


let mark = new Person('Mark', 'Male', 1995);
console.log(mark);
mark.calculateAge();
Person.greet();


// Examples static methods of object (Number)
Number.parseInt('203');
Number.isNaN('someNumber');

// Arrays
Array.from([100, 300, 205]);
