/**
 * Get access to webpage elements
*/

let score0          = document.getElementById('score--0');
let score1          = document.getElementById('score--1');
let diceImage       = document.querySelector('.dice')
let rollDiceBtn     = document.querySelector('.btn--roll');

/**
 * Initialize the values to zero
*/
score0.textContent = 0;
score1.textContent = 0;


/**
 * Hide dice
*/
diceImage.classList.add('hidden');


/**
 * Implement functionality for roll dice button
*/
rollDiceBtn.addEventListener('click', function () {

    // Math.random(); [0...10000..]
    // Math.trunc(Math.random() * 6) Generate [0-6]

    // 1. Generate a random number between : 1 and 6
    let diceRandomNumber = Math.trunc(Math.random() * 6) + 1;


    // 2. Display the dice image with the random number
    diceImage.classList.remove('hidden');
    diceImage.src = `/assets/images/dices/dice-${diceRandomNumber}.png`;


    // 3. If the random number is not 1 then add it to active player current score


    // 4. If random is 1 then reset current score to zero and change the active player

});




