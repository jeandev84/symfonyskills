// Inheritance between function constructors in Javascript
// Person function constructor
// Person - parent class (base class)
let Person = function (name, gender, birthYear) {
    this.name = name;
    this.gender = gender;
    this.birthYear = birthYear;
}


Person.prototype.calculateAge = function () {
    let age = new Date().getFullYear() - this.birthYear;
    console.log(age)
}


let john = new Person('John', 'Male', 1990);
console.log(john);


// Employee function constructor
/*
DON'T REPEAT YOUR SELF (DRY PRINCIPLE)
let Employee = function (name, gender, birthYear, employeeId, salary) {
    this.name = name;
    this.gender = gender;
    this.birthYear = birthYear;
    this.employeeId = employeeId;
    this.salary = salary;
}
*/


// Employee function constructor
// this = mark
// Employee - child class
let Employee = function (name, gender, birthYear, employeeId, salary) {
    Person.call(this, name, gender, birthYear);
    this.employeeId = employeeId;
    this.salary = salary;
}


// Inheritance all methods of Parent class (Assign prototype Child and Parent before running child prototype)
Employee.prototype = Person.prototype;



// And then
Employee.prototype.calculateSalary = function () {
    return this.salary * 12;
}


Employee.prototype.employeeDetails = function () {
    console.log(this.name);
    console.log(this.employeeId);
}


let mark = new Employee('Mark', 'Male', 1995, 101, 12000);
console.log(mark);

