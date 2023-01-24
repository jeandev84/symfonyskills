
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