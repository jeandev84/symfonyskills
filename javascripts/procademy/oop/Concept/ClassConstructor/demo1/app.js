// Constructor function
// let now  = new Date();
// let str  = new String();

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
console.log(john);
john.calculateAge();

console.log('========================================================================================')

let merry = new Person('Merry', 'Female', 1995);
console.log(merry);
merry.calculateAge();
