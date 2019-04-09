// JavaScript source code
var PlayerOnTurn = 1;
var myGameMessage = document.getElementById("MyGameMessage");
var myPlayer1Name = "PLAYER1", myPlayer2Name = "PLAYER2";
var MyMessage = "Player 1 is on turn";
function SetName() {
    
    var Player1Input = document.forms["TTTGameForm"]["nickname1"].value;
    var Player2Input = document.forms["TTTGameForm"]["nickname2"].value;
    myPlayer1Name = Player1Input;
    if (Player2Input.value !== "") myPlayer2Name = Player2Input.nodeValue;
    else myPlayer2Name = "Player2";
    MyMessage = myPlayer1Name + " is on turn.";
}
myGameMessage.innerText = MyMessage;
var Table = [
    [0, 0, 0],
    [0, 0, 0],
    [0, 0, 0]
];

function CheckWin() {
    var ThereIsAWinner = false;
    var Winner = 0;
    for (var i = 0; i < 3; i++) {
        if (Table[i][0] === Table[i][1] && Table[i][0] === Table[i][2] && Table[i][0] !== 0) {
            ThereIsAWinner = true;
            Winner = Table[i][0];
        }
    }
    if (ThereIsAWinner === false) {
        for (var j = 0; j < 3; j++) {
            if (Table[0][j] === Table[1][j] && Table[0][j] === Table[2][j] && Table[0][j] !== 0) {
                ThereIsAWinner = true;
                Winner = Table[0][j];
            }
        }
    }


    if (ThereIsAWinner === false && Table[0][0] === Table[1][1] && Table[0][0] === Table[2][2] && Table[0][0] !== 0) {
        ThereIsAWinner = true;
        Winner = Table[0][0];
    }

    if (ThereIsAWinner === false && Table[0][2] === Table[1][1] && Table[0][2] === Table[2][0] && Table[0][2] !== 0) {
        ThereIsAWinner = true;
        Winner = Table[0][2];
    }

    if (ThereIsAWinner === true) {
        var GameWinner;
        if (Winner === 1) GameWinner = myPlayer1Name;
        else GameWinner = myPlayer2Name;
        myGameMessage.innerText = "The winner is " + GameWinner;
        for (i = 1; i <= 3; i++)
            for (j = 1; j <= 3; j++) {
                let MyId = "Box" + i + "_" + j;
                let c = document.getElementById(MyId);
                let ctx = c.getContext("2d");
                ctx.clearRect(0, 0, c.width, c.height);
            }
    }

}

function Play(x, y) {
    if (Table[x-1][y-1] !== 0) return;
    
    if (PlayerOnTurn === 1) {
        MyMessage = myPlayer2Name + " is on turn.";
        myGameMessage.innerText = MyMessage;
        Table[x - 1][y - 1] = 1;
        PlayerOnTurn = 2;
        let MyId = "Box" + x + "_" + y;
        let c = document.getElementById(MyId);
        let ctx = c.getContext("2d");
        let img = document.getElementById("X");
        img.offsetWidth = 100;
        img.offsetHeight = 100;
        ctx.drawImage(img, 0, 0, 300, 150);
        CheckWin();
        return;
    }
    if (PlayerOnTurn === 2) {
        MyMessage = myPlayer1Name + " is on turn.";
        myGameMessage.innerText = MyMessage;
        Table[x - 1][y - 1] = 2;
        PlayerOnTurn = 1;
        let MyId = "Box" + x + "_" + y;
        let c = document.getElementById(MyId);
        let ctx = c.getContext("2d");
        let img = document.getElementById("O");
        img.offsetWidth = 100;
        img.offsetHeight = 100;
        ctx.drawImage(img, 0, 0, 300, 150);
        CheckWin();
        return;
    }
   // if (Table[x][y] !== 0);
}

