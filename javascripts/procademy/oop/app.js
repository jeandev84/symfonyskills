// [ Getters and Setters ]
// Accessor properties are methods that gets or sets the value of an objects property

// 1. getter properties   - read objects property value   - use "get" keywords
// 2. setter properties   - set an objects property value - use "set" keywords

// Encapsulation - Hide data from outside world
//
let john = {
    name: 'John',
    birthYear: 1990,
    AnnualSalary: 12000,

    get getName() {
        return this.name;
    },

    get getPrefixedName() {
       return 'Mr. ' + this.name;
    },

    set setName(name) {
        if (name.length < 4) {
            alert('Name should be of at lest 4 characters.')
        } else {
            this.name = name;
        }
    }
}


console.log(john.getName);
john.setName = 'John Smith';
// john.setName = 'Joh';
console.log(john.getName);
console.log(john.getPrefixedName);


console.log(john.name);
john.name = 'John Doe';
console.log(john.name);
