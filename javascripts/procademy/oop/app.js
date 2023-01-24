// Inheritance between classes
class Person {

    constructor(name, birthYear, gender) {
        this.name = name;
        this.birthYear = birthYear;
        this.gender = gender;
    }

    calculateAge() {
        let age = new Date().getFullYear() - this.birthYear;
        console.log(age)
    }
}



class Employee extends Person {

    constructor(name, gender, birthYear, employeeId, salary) {
        super(name, gender, birthYear);
        this.employeeId = employeeId;
        this.salary     = salary;
    }
}


let mark = new Employee('Mark', 'Male', 1995, 201, 18000);
console.log(mark);