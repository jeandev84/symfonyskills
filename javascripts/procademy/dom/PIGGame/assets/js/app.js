/**
 * Get access to webpage elements
*/

let currentScore1   = document.getElementById('current--0');
let currentScore2   = document.getElementById('current--1');


let score0          = document.getElementById('score--0');
let score1          = document.getElementById('score--1');
let diceImage       = document.querySelector('.dice')


let player0         = document.querySelector('.player--0')
let player1         = document.querySelector('.player--1')

let name1           = document.getElementById('name--0');
let name2           = document.getElementById('name--1');


let rollDiceBtn     = document.querySelector('.btn--roll');
let holdBtn         = document.querySelector('.btn--hold')
let newGameBtn      = document.querySelector('.btn--new');


/**
 * Initialize the values to zero
*/

let scores;
let current;
let activePlayer;


/**
 * Initialize Game
*/
function initGame() {

    // Reset values

    /*
    score0.textContent = `${0}`;
    score1.textContent = `${0}`;
    score0.textContent = 0;
    score1.textContent = 0;
    */

    /**
     * Initialize current score
     *
     * @type {number}
    */
    score0.textContent = 0;
    score1.textContent = 0;

    currentScore1.textContent = 0;
    currentScore2.textContent = 0;

    name1.textContent = "Player 1";
    name2.textContent = "Player 2";


    /**
     * Activation current player
    */
    player0.classList.remove('player--winner');
    player1.classList.remove('player--winner');

    player0.classList.add('player--active');
    player1.classList.remove('player--active');


    /**
     * Hide buttons
    */
    rollDiceBtn.classList.remove('hidden');
    holdBtn.classList.remove('hidden');



    /**
     * Hide dice
    */
    diceImage.classList.add('hidden');

    scores         = [0, 0]; // [scorePlayer1, scorePlayer2]
    current        = 0;
    activePlayer   = 0;

}


// Call Init Game
initGame();


// SwitchPlayer
let switchPlayer = function () {
    current = 0;
    document.getElementById(`current--${activePlayer}`).textContent = current;
    activePlayer = activePlayer === 0 ? 1 : 0;
    player0.classList.toggle('player--active'); // add and remove
    player1.classList.toggle('player--active'); // add and remove
}


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
        /*
        current = 0;
        document.getElementById(`current--${activePlayer}`).textContent = current;
        activePlayer = activePlayer === 0 ? 1 : 0;
        player0.classList.toggle('player--active'); // add and remove
        player1.classList.toggle('player--active'); // add and remove
        */
        switchPlayer();
    }


    // 4. If random is 1 then reset current score to zero and change the active player

});


/**
 * Implement hold button functionality
*/
holdBtn.addEventListener('click', function () {

    // 1. add current score to global score
    // scores[activePlayer] = scores[activePlayer] + current;
    scores[activePlayer] +=  current;
    document.getElementById(`score--${activePlayer}`).textContent = `${scores[activePlayer]}`;


    // 2. check if the player already reached maximum score
    if (scores[activePlayer] >= 20) {

        // finish the game
        document.querySelector(`.player--${activePlayer}`).classList.add('player--winner');
        document.querySelector(`.player--${activePlayer}`).classList.remove('player--active');
        document.getElementById(`name--${activePlayer}`).textContent = 'Winner!';

        // hide dice image
        diceImage.classList.add('hidden');
        rollDiceBtn.classList.add('hidden');
        holdBtn.classList.add('hidden');

    } else {
        switchPlayer();
    }
});


/**
 * Implement functionality for new game button
 * Start the new game
*/

newGameBtn.addEventListener('click', initGame);


