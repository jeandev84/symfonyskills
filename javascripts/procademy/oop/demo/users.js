/**
* OOP Concept
* - Inheritance
* - Encapsulation
* - Abstraction
* - Polymorphism
*/

let users = {
    name: 'John',
    role: 'admin',
    access: 'read-write',

    addUser() {
        // Logic to add user
    },

    removeUser() {
       // Logic to remove user
    }
}


// Inheritance

let person = {
    name: '',
    birthYear: '',
    gender: '',
    calculateAge() {

    }
}


let john = {
    name: 'John',
    birthYear: 1990,
    gender: 'Male',

    calculateAge(currentData = 2023) {
        return currentData - this.birthYear;
    }
}


let merry = {
    name: 'Merry',
    birthYear: 1995,
    gender: 'Female',

    calculateAge(currentData = 2023) {
        return currentData - this.birthYear;
    }
}



let steve = {
    name: 'Steve',
    birthYear: 1985,
    gender: 'Male',

    calculateAge(currentData = 2023) {
        return currentData - this.birthYear;
    }
}


// Abstraction

let Employee = {
    employeeId: 0,
    salary: 0,
    company: '',
    calculateSalary() {

    }
}


let PermanentEmployee = {
    monthlySalary: 0,
    getSalary() {
        return 12 * this.monthlySalary;
    }
}


let PartTimeEmployee = {
     hourlySalary: 0,
     getSalary() {
         return 12 * this.hourlySalary;
     }
}


// Polymorphism

let Calculator = {

    addNumbers(x, y) {
        return x + y;
    }
}


let CalculatorAdvanced = {

    addNumbers(x, y, z) {
        return x + y + z;
    }
}