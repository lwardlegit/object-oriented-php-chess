<?php

/*
*
* @@Param type: the type of piece i.e (king, pawn, queen, knight, bishop,rook)
* @@Param pos: location of the piece on the board
* @@Param moveVal: how many spaces it can move
* @@Param color: the pieces color (black or white)
*
*/

/*
*  function MOVE()
*  @@description: assigns a pieces new location on the board
*
* @@Param posx  X location of a piece on the board
* @@Param posy: Y location of the piece on the board
*/


class Piece {

    public $type;      
    public $posx;
    public $posy;
    public $moveVal;
    public $color;
    public $X=null;
    public $Y=null;

    public function __construct($type,$posx,$posy,$moveVal,$color,$X,$Y){
        $this->type = $type;
        $this->posx = $posx;
        $this->posy = $posy;
        $this->moveVal = $moveVal;
        $this->color = $color;
        $this->X = $X;
        $this->Y = $Y;
    }

    public function move($posx, $posy){
        $this->posx = posx;
        $this->posy = posy;
    }

    public function setType($type){
        $this->type = $type;
        
    }

    public function getType(){
        return $this->type;
        
    }


}

