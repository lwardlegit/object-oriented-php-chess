<?php

class Board {
public $length = 8;
public $squares = array([array(0,0,0,0,0,0,0,0),
                        array(0,0,0,0,0,0,0,0),
                        array(0,0,0,0,0,0,0,0),
                        array(0,0,0,0,0,0,0,0),
                        array(0,0,0,0,0,0,0,0),
                        array(0,0,0,0,0,0,0,0),
                        array(0,0,0,0,0,0,0,0),
                        array(0,0,0,0,0,0,0,0)]
                        );
public $Wgraveyard = [];
public $Bgraveyard = [];

public $chosenPiece = null;
public $attackSquare = null;


public function chosenPiece($piece){
    $this->chosenPiece = $piece;
}
public function setAttackSquare($piece){
    $this->attackSquare = $piece;
}

public function attackLocation(){
    $this->handleAttack($this->chosenPiece,$this->attackSquare); //handle the attack
}

protected function handleAttack($chosen,$attacking){
    
        if( $this->squares[$attacking->X][$attacking->Y] != '' && $this->squares[$attacking->X][$attacking->Y]->color == 'white' ){

            array_push($this->Wgraveyard,$this->squares[$attacking->X][$attacking->Y]->type);//remove the item from the board and put it into the graveyard
            $this->squares[$attacking->X][$attacking->Y]->type = $this->squares[$chosen->X][$chosen->Y]->type;
            $this->squares[$chosen->X][$chosen->Y]->type = 'B';

        }elseif ($this->squares[$attacking->X][$attacking->Y]->color == 'black'){

            array_push($this->Bgraveyard,$this->squares[$attacking->X][$attacking->Y]->type);  //remove the item from the board and put it into the graveyard
            $this->squares[$attacking->X][$attacking->Y]->type = $this->squares[$chosen->X][$chosen->Y]->type;
            $this->squares[$chosen->X][$chosen->Y]->type = 'B';
            
        }else{
            $this->squares[$attacking->X][$attacking->Y]->type = $this->squares[$chosen->X][$chosen->Y]->type;
            $this->squares[$chosen->X][$chosen->Y]->type = 'B';
        }
   }

}