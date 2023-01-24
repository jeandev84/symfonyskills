// Javascript classes
// There are two ways to create a class
// 1. Using class declaration

class Person {

    constructor(name, birthYear, gender) {
         this.name      = name;
         this.birthYear = birthYear;
         this.gender    = gender;

         /*
         this.calculateAge = function () {
             console.log(new Date().getFullYear() - this.birthYear);
         }
         */
     }

     calculateAge() {
         console.log(new Date().getFullYear() - this.birthYear);
     }
}


Person.prototype.greet = function () {
   console.log('Good morning ' + this.name + '!')
}


let john = new Person('John', 1990, 'Male');
console.log(john);
john.calculateAge();
john.greet();


let merry = new Person('Merry', 1995, 'Female');
console.log(merry);

/* Enter this in console tools dev: >> john.__proto__ === Person.prototype ( true )*/


// 1. classes cannot be hoisted ( Declare class and do new instance of class)
// 2. classes are first class citizen
// 3. classes are executed in strict mode

