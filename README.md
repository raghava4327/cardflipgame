# FLIP IT

'FLIP IT' is a interactive puzzle that tests the reasoning and cognitive skills of the user.This game starts with the basic insructions that expounds the game.This project is built with html along with css,javascript and php for backend connectivity along with SQL for data storage.All the codes are written right from scratch with some references.

This puzzle is very obvious,the user need to login to the account if the user hasn't registered yet thereby will be redirected to the registration page.The user will be provided with a 4x4 grid having cards flipped.The user need to flip the cards and should map two same cards with same pictures on it within the given time.

There is a admin-side panel that will display the scorecard of the each player along with their details.

## SKILLS ASSESSED

Through this game the reasoning or problem-solving skills of the users are assessed and the memory and alertness of the user are also assessed. This game also bolsters the spatial reasoning of the user and enchances their memory mapping skills.There are some hints provided in the puzzle along with the deadends that depends on time and number of moves.


## FEATURES

The admin panel has a leaderboard sorted in descending order of the scores.
Each user row of the leaderboard table has the data insights.
The user data insights has a table that has records for the time and score of every player.

## SCORE EVALUATION
The scoring logic is very simple.It evaluates the score based on time taken,number of moves and number of hints left unused.

score=50-moves_used + 120 - time_taken + no_of_hints_unused.



## Possible ways To solve the puzzle

The game board consists of several cards, each with a hidden emoji. The objective of the game is to flip over two cards at a time, attempting to match the hidden emoji on each card. If the emojis match, the cards will stay flipped, and you can continue with the next set of cards. If they do not match, the cards will flip back over, and you will need to remember their position for future matches.

The game ends when you have successfully matched all of the pairs or when you run out of time or moves. 

## Technology used
This uses the Javascript framework which is one of the best-suited frameworks for these kinds of projects.

Only one table used for this project:
 - player: stores all the gamedata and userdata.
 

## Tables used 

#### player

| ATTRIBUTE | DATATYPE | INDEX   | DESCRIPTION|
| :-------- | :------- | :-------- | :-------------|
| `username` | `varchar(50)` | `primary key` | `stores username (unique)`|
| `email` | `varchar(60)` | | `stores email address of user`|
| `password` | `varchar(20)` | | `stores user password`|
| `highscore` | `int(11)` |  | `stores highscore`|
| `mintime` | `int(11)` |  | `stores minimum time needed for highscore`|
| `minmoves` | `int(11)` |  | `stores minimum moves needed for highscore`|
| `usertype` | `varchar(20)` |  | `stores whether the user is admin or player`|







## How to Play
### To play the game:

1. Open the index.php file in your browser.
2. If you are old user then sign in else register for the game
3. Click on the "Start" button to begin the game.
4. Click on two cards at a time to try and match the hidden emojis.
5. Use the "Hint" button to reveal two random cards.
6. Continue playing until you match all pairs or run out of time.
7. Once the game is over, you can reload to start the "New Game".

## 👨‍💻 About Me
Quick learner with academic abilities and technical knowledge to succeed in
different roles. Ready to expand horizons with additional knowledge and abilities
gained from training and experience. Always ready to help others and use abilities to
support team goals.
## 🛠 Skills
Java, Javascript, HTML, CSS

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](linkedin.com/in/sai-raghava-79a904183)

