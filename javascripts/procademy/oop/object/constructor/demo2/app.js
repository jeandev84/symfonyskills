// Constructor
let Person = function (name, gender, birthYear) {
     this.name      = name;
     this.gender    = gender;
     this.birthYear = birthYear;
     this.calculateAge = function () {
         let age = new Date().getFullYear() - this.birthYear;
         console.log(age);
     }
}


let john = new Person('John', 'Male', 1990);

// console.log(john);
// john.calculateAge();


// let john = {}
// this = john
// john.name = 'Something';
// john.gender = 'Male';
// john.birthYear = 1990;
// john.calculateAge = f() {
      // do some logic here ...
// };


// let now  = new Date();
// let str  = new String();



let merry = new Person('Merry', 'Female', 1995);

// console.log(merry);
// merry.calculateAge();


let steve = new Person('Steve', 'Male', 1989);
console.log(steve);