/**
 * Declaration de variable
*/


const a = `Salut`;
const b = 'les gens';

const greet = `${a} ${b}`;
const isMajor = undefined;


const notes = [
    13,
    14,
    9,
    'hello',
    [1, 2, 3]
];

const person = {
    firstname: 'John',
    lastname: 'Doe',
    age: 24,
    notes: [12, 14, 15],
    job: {
        name: 'Informaticien',
        hours: 35
    }
}

console.log(person);

console.log(person.firstname);
console.log(person.notes[1]);
console.log(person.job.name);
console.log(person.job.hours);

person.job.name = 'Developer';
person.notes[1] = 29;

console.log(person.job.name);
console.log(person.notes);
console.log(person['firstname']);
console.log(person['notes']);
console.log(person['job']);


/**
 * Typeof
*/

console.log(typeof a);
console.log(typeof b);
console.log(typeof person);
console.log(typeof notes);
console.log(b.length);
console.log(notes.length);


/**
 * Operations
*/

console.log(4 + 3);
console.log(0.1 + 0.2);
console.log(4 + '3');
console.log(3.4 + '2');
console.log(2 * 3);
console.log(2 * '2');
console.log(2 * 'a'); // NaN
console.log(2 / 3);
console.log(2 * (3 + 5));
console.log(16 % 2);