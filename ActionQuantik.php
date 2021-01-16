<?php

include "PlateauQuantik.php";

class ActionQuantik
{
    protected PlateauQuantik $plateau;

    public function __construct(PlateauQuantik $plateau){
        $this->plateau = $plateau;
    }

    public function getPlateau():PlateauQuantik{
        return $this->plateau;
    }

    public function isRowWin(int $numRow):bool{
        for($i = 0; $i < 4; $i++) {
            $arr[$i] = $this->plateau->getPiece($numRow, $i);
        }
        // a continuer
        return false;
    }

    public function isColWin(int $numCol):bool{
        for($i = 0; $i < 4; $i++) {
            $arr[$i] = $this->plateau->getPiece($i, $numCol);
        }
        // a continuer
        return false;
    }

    public function isCornerWin(int $dir):bool{
        $this->plateau->getCorner($dir);
        // a continuer
        return false;
    }

    public function isValidePose(int $rowNum, int $colNum, PieceQuantik $piece):bool{
        return false;
    }

    public function posePiece(int $rowNum, int $colNum, PieceQuantik $piece):void{

    }

    public function __toString():String
    {
        for($i = 0; $i < 4; $i++) {
            if($this->isRowWin($i) || $this->isColWin($i) || $this->isCornerWin($i)) {
                echo '<p>Gagné ^^';
            } else {
                echo '<p>Perdu :(</p>';
            }
        }
        $s = '';
        return $s;
    }

    private static function isPieceValide(array $pieces, PieceQuantik $p):bool{

    }

    private static function isComboWin(array $pieces):bool{

    }
}
?>
