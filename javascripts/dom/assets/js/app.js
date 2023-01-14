/**
 * Get access to webpage elements
*/

let score0          = document.getElementById('score--0');
let score1          = document.getElementById('score--1');
let diceImage       = document.querySelector('.dice')
let rollDiceBtn     = document.querySelector('.btn--roll');
let currentScore1   = document.getElementById('current--0');
let currentScore2   = document.getElementById('current--1');
let player0         = document.querySelector('.player--0')
let player1         = document.querySelector('.player--1')


/**
 * Initialize the values to zero
*/

let scores         = [0, 0]; // [scorePlayer1, scorePlayer2]
let current        = 0;
let activePlayer   = 0;


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
    // For incrementation 1 by 1: current += 1; or current = current + 1

    if (diceRandomNumber !== 1) {
        current += diceRandomNumber;
        /* currentScore1.textContent = current; */
        document.getElementById(`current--${activePlayer}`).textContent = current;

    } else {
        current = 0;
        document.getElementById(`current--${activePlayer}`).textContent = current;
        activePlayer = activePlayer === 0 ? 1 : 0;
        player0.classList.toggle('player--active'); // add and remove
        player1.classList.toggle('player--active'); // add and remove
    }


    // 4. If random is 1 then reset current score to zero and change the active player

});




