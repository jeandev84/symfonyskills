// Constructor
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
// console.log(john.Prototype === Person.prototype);


let merry = new Person('Merry', 'Female', 1995);
//merry.calculateAge();
console.log(merry);


let steve = new Person('Steve', 'Male', 1989);
// steve.calculateAge();
console.log(steve);