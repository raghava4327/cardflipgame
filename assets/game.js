const selectors = {
    boardContainer: document.querySelector('.board-container'),
    board: document.querySelector('.board'),
    moves: document.querySelector('.moves'),
    timer: document.querySelector('.timer'),
    start: document.querySelector('.start'),
    win: document.querySelector('.win'),
    hints:document.querySelector('.hints button')
}

const state = {
    gameStarted: false,
    flippedCards: 0,
    totalFlips: 0,
    totalTime: 0,
    hints:5,
    loop: null
}

window.addEventListener('beforeunload', function (event) {
    // Cancel the event
    event.preventDefault();
  
    // Prompt the user
    event.returnValue = '';
  });
//  window.addEventListener("beforeonunload", function(event) 
//  {
   
    
//     var message = document.createElement("p");
//     message.innerText = "Are you sure you want to refresh the page?";
  
//     var yesButton = document.createElement("button");
//     yesButton.innerText = "Yes";
//     yesButton.addEventListener("click", function() {
//       // Do nothing - allow the page to refresh
//     });
//  });



const shuffle = array => {
    const clonedArray = [...array]

    for (let index = clonedArray.length - 1; index > 0; index--) {
        const randomIndex = Math.floor(Math.random() * (index + 1))
        const original = clonedArray[index]

        clonedArray[index] = clonedArray[randomIndex]
        clonedArray[randomIndex] = original
    }

    return clonedArray
}

const pickRandom = (array, items) => {
    const clonedArray = [...array]
    const randomPicks = []

    for (let index = 0; index < items; index++) {
        const randomIndex = Math.floor(Math.random() * clonedArray.length)
        
        randomPicks.push(clonedArray[randomIndex])
        clonedArray.splice(randomIndex, 1)
    }

    return randomPicks
}

const generateGame = () => {
    const dimensions = selectors.board.getAttribute('data-dimension')

    if (dimensions % 2 !== 0) {
        throw new Error("The dimension of the board must be an even number.")
    }

    const emojis = ['🥔', '🍒', '🥑', '🌽', '🥕', '🍇', '🍉', '🍌', '🥭', '🍍']
    const picks = pickRandom(emojis, (dimensions * dimensions) / 2) 
    const items = shuffle([...picks, ...picks])
    const cards = `
        <div class="board" style="grid-template-columns: repeat(${dimensions}, auto)">
            ${items.map(item => `
                <div class="card">
                    <div class="card-front"></div>
                    <div class="card-back">${item}</div>
                </div>
            `).join('')}
       </div>
    `
    
    const parser = new DOMParser().parseFromString(cards, 'text/html')

    selectors.board.replaceWith(parser.querySelector('.board'))
}
const hintsBtn = document.getElementById('hints-btn');
const startGame = () => {
    state.gameStarted = true
    hintsBtn.removeAttribute('disabled');
    selectors.start.classList.add('disabled')
    selectors.hints.classList.remove('disabled')

    state.loop = setInterval(() => {
        state.totalTime++
        
        selectors.moves.innerText = `Remaining moves: ${50-state.totalFlips} `
        selectors.timer.innerText = `Remaining time: ${120-state.totalTime} sec`
        selectors.hints.innerText=`Hints: ${state.hints} `
       
        if (state.totalTime >= 120) {
            selectors.boardContainer.classList.add('flipped');
            selectors.hints.classList.add('disabled');
            selectors.win.innerHTML = `
                <span class="win-text">
                    Game over!<br />
                    You ran out of time 
                </span>
            `;
            selectors.hints.setAttribute('disabled', 'disabled')  
            clearInterval(state.loop);
           
        }}, 1000)

  

}

const flipBackCards = () => {
    document.querySelectorAll('.card:not(.matched)').forEach(card => {
        card.classList.remove('flipped')
    })

    state.flippedCards = 0
}



const flipCard = card => {
    state.flippedCards++
    state.totalFlips++

    if (!state.gameStarted) {
        startGame()
    }

    if (state.flippedCards <= 2) {
        card.classList.add('flipped')
    }

    if (state.flippedCards === 2) {
        const flippedCards = document.querySelectorAll('.flipped:not(.matched)')

        if (flippedCards[0].innerText === flippedCards[1].innerText) {
            flippedCards[0].classList.add('matched')
            flippedCards[1].classList.add('matched')
        }

        setTimeout(() => {
            flipBackCards()
        }, 1000)
    }
 


    // If there are no more cards that we can flip, we won the game
    if (!document.querySelectorAll('.card:not(.flipped)').length) {
        setTimeout(() => {
            selectors.boardContainer.classList.add('flipped')
            selectors.win.innerHTML = `
                <span class="win-text">
                    You won!<br />
                You Scored <span class="highlight">${50-state.totalFlips+120-state.totalTime+state.hints}</span> points<br />
                    
                </span>
            `
           var x=50-state.totalFlips+120-state.totalTime+state.hints; 
           var y=state.totalTime;
           var z= state.totalFlips;
           document.cookie="recent_score="+x ;
           document.cookie="time="+y;
           document.cookie="moves="+z;   
            clearInterval(state.loop)
        }, 1000)    
    }
    if (state.totalFlips >= 50) {
        setTimeout(() => {
            selectors.boardContainer.classList.add('flipped')
            selectors.hints.classList.add('disabled')
            selectors.win.innerHTML = `
                <span class="win-text">
                    Game over!<br />
                    You complete total <span class="highlight">${state.totalFlips}</span> moves
                </span>
            `
        
            clearInterval(state.loop)
        }, 1000)
    }
    if (state.totalFlips >= 50) {
        selectors.hints.setAttribute('disabled', 'disabled')    
      }
    

      
}
   //dead ends
    
const flag=0;
const attachEventListeners = () => {
    document.addEventListener('click', event => {
        const eventTarget = event.target
        const eventParent = eventTarget.parentElement
        

    if (eventTarget.className.includes('card') && !eventParent.className.includes('flipped')) {
        flipCard(eventParent)
    }
    else if (eventTarget.className === 'start' && !eventTarget.className.includes('disabled')) {
    
        startGame()
       
    }

       
    })
}

function hints()
{  
    if(state.hints==0)
    {

        window.alert('no hints available')
    }
    else
    {
        state.hints=state.hints-1;
    selectors.hints.innerText=`Hints: ${state.hints} `
    
    
    const notflippedCards = document.querySelectorAll('.card:not(.flipped)')
    const pickedcards=pickRandom(notflippedCards,2)
    pickedcards.forEach(card => flipCard1(card))}
    

    

}
const flipCard1 = card => {
    state.flippedCards++
    

    if (!state.gameStarted) {
        startGame()
    }

    if (state.flippedCards <= 2) {
        card.classList.add('flipped')
    }

    if (state.flippedCards === 2) {
        const flippedCards = document.querySelectorAll('.flipped:not(.matched)')

        if (flippedCards[0].innerText === flippedCards[1].innerText) {
            flippedCards[0].classList.add('matched')
            flippedCards[1].classList.add('matched')
        }

        setTimeout(() => {
            flipBackCards()
        }, 1000)
    }}

generateGame()
attachEventListeners()