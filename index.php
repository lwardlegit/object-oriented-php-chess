<?php
include './pieces.php';
include './board.php';
?>

<!DOCTYPE html>
<head>
    <link rel='stylesheet' href='./app.css'>
</head>
<html>
<body>

<h1 class='header'>OOPHP CHESS</h1>

<div id='board' class='boardFrame'>
    
</div>

<?php
    
    $dataX = 0; 
    $dataY = 0 ;
    $atkX = 0;
    $atkY = 0;

    $board = new Board();
    $W_backrow = ['R','Kn','Bi','Q','K','Bi','kn','R'];
    $B_backrow = ['R','Kn','Bi','K','Q','Bi','kn','R'];

    

for($n = 0; $n < $board->length; $n++){
    for($z = 0; $z < $board->length; $z++){
       
        if($n == 1){  //all these spaces will be    white pawns
                $piece = new Piece('P',$z,1,1,'white',$n,$z);
                $board->squares[$n][$z]=$piece;   
        }

        if($n == 6){  //all these spaces will be    black pawns
                $piece = new Piece('P',$z,1,1,'black',$n,$z);
                $board->squares[$n][$z]=$piece;
        }

        if($n == 0){  //if n is 0 set the WHITE ROYAL pieces (backrow)
                $piece = new Piece($W_backrow[$z],$z,1,1,'white',$n,$z);
                $board->squares[$n][$z]=$piece;
        }

        if($n == 7){  //if n is 7 set the the BLACK ROYAL pieces (backrow)
            $piece = new Piece($B_backrow[$z],$z,1,1,'black',$n,$z);
            $board->squares[$n][$z]=$piece;
            }
        
        if ($n >= 2 && $n <= 5){
            $piece = new Piece('B',$z,1,1,'NA',$n,$z); // no pieces are currently here
            $board->squares[$n][$z]=$piece;
        }
    }
}

    echo implode(" ",$board->Wgraveyard);
    echo implode(" ",$board->Bgraveyard);

    $dataX = $_GET['dataX']; 
    $dataY = $_GET['dataY']; 
    $atkX = $_GET['atkX']; 
    $atkY = $_GET['atkY']; 


    $board->chosenPiece($board->squares[$dataX][$dataY]);
    $board->setAttackSquare($board->squares[$atkX][$atkY]);

    //handle the attack
    $board->attackLocation();
    echo 'white graveyard',implode(" ",$board->Wgraveyard);
    echo 'black graveyard',implode(" ",$board->Bgraveyard);


    
    
?>

<script>

        var board = <?php echo json_encode($board); ?>;

        function setColors(){
            let frame = document.getElementById('board').children;
            let count = 0
            for(let i = 0; i < frame.length; i++){

                if(count === 16){
                    count= 0
                }
                if(count >= 0 && count < 8){
                    if(count % 2 === 0){
                frame[i].style.backgroundColor = 'black'
                }
            }else{
                if(count % 2 !== 0){
                    frame[i].style.backgroundColor = 'black'
                }
            }
            count++
        }
        }



        function appendToDom(board){
            for(let x = 0; x < board.squares.length; x++){
                for(let y = 0; y < board.squares.length; y++){

                        let div = document.createElement("div")
                        div.innerHTML = board.squares[x][y].type;
                        div.className = 'gridItem';
                        div.id = y;

                    document.getElementById('board').appendChild(div)
                }
            }
            setColors()
        }
  appendToDom(board)  //runs every time the page loads

</script>

<p>select piece to move</p>
<form method="get" name="form" action="index.php"> 
        <input type="number" placeholder="row" name="dataX"> 
        <input type="number" placeholder="column" name="dataY"> 
        

        <p>square to attack</p>
        <input type="number" placeholder="row" name="atkX"> 
        <input type="number" placeholder="column" name="atkY"> 
        <input type="submit" value="Submit"> 
    </form> 

   

</body>
</html>


