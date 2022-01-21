//rock wins scissors
//paper wins rock
//scissors wins paper 
let roshamboArray = ['rock', 'paper', 'scissors']
let userInput;
let compInput;
function getRandomInt(max){
    return Math.floor(Math.random() * max)
}
userInput = getRandomInt(3);
compInput = getRandomInt(3);

let gameInput = roshamboArray[userInput];
let compMove = roshamboArray[compInput];

function roshambo(){
    if(gameInput == compMove){
        console.log(`A tie... Your Input: ${gameInput}  Computer input: ${compMove}`)
    }else if(gameInput == 'rock' && compMove != 'rock'){
         if(compMove == 'paper'){
            console.log(`You  lost... Your input: ${gameInput}  Computer input: ${compMove}`)
         }else{
            console.log(`You won... Your input: ${gameInput}  Computer input: ${compMove}`)
         }
    }else if(gameInput == 'paper' && compMove != 'paper'){
        if(compMove == 'scissors'){
            console.log(`You  lost... Your input: ${gameInput}  Computer input: ${compMove}`)
         }else{
            console.log(`You won... Your input: ${gameInput}  Computer input: ${compMove}`)
         } 
    }else if(gameInput == 'scissors' && compMove != 'scissors'){
        if(compMove == 'rock'){
            console.log(`You  lost... Your input: ${gameInput}  Computer input: ${compMove}`)
         }else{
            console.log(`You won... Your input: ${gameInput}  Computer input: ${compMove}`)
         }
    }else{
        console.log(`Something happened... Your input: ${gameInput}  Computer input: ${compMove}`)
    }
}
roshambo()
