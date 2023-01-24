// Object.create()

let person = {

    calculateAge() {
        return new Date().getFullYear() - this.birthYear;
    },

    greet() {
        return 'Have a nice day!';
    },

    init(name, birthYear, gender) {
         this.name = name;
         this.birthYear = birthYear;
         this.gender  = gender;
    }
}


// john inherit of person object
let john = Object.create(person);

john.name = 'John';
john.birthYear = 1990;
john.gender = 'Male';

console.log(john);
console.log(john.calculateAge());


// merry inherit of person object
let merry = Object.create(person, {
    name: {value: 'Merry'},
    birthYear: {value: 1995},
    gender: {value: 'Female'}
});

console.log(merry);


// mark inherit of person object
let mark = Object.create(person);
mark.init('Mark', 2002, 'Male');
console.log(mark);

