// Implementing inheritance using Object.create()
let person = {

    calculateAge() {
       return new Date().getFullYear() - this.birthYear;
    },

    personInit(name, birthYear, gender) {
        this.name = name;
        this.birthYear = birthYear;
        this.gender = gender;
    }
}


let employee = Object.create(person);

// console.log(employee);

/*
DRY
employee.employeeInit = function (name, birthYear, gender, employeeId) {
    this.name = name;
    this.birthYear = birthYear;
    this.gender = gender;
    this.employeeId = employeeId;
}
*/

employee.employeeInit = function (name, birthYear, gender, employeeId, salary) {
    employee.personInit.call(this, name, birthYear, gender);
    this.employeeId = employeeId;
    this.salary = salary;
}

console.log(employee);


let mark = Object.create(employee);
mark.employeeInit('Mark', 1990, 'Male', 201, 24000);
console.log(mark);


/*
let form = new FormData();
console.log(form);
*/