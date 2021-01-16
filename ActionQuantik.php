<?php


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

    }

    public function isColWin(int $numCol):bool{

    }

    public function isCornerWin(int $dir):bool{

    }

    public function isValidePose(int $rowNum, int $colNum, PieceQuantik $piece):bool{

    }

    public function posePiece(int $rowNum, int $colNum, PieceQuantik $piece):void{

    }
    public function __toString():String
    {
        // TODO: Implement __toString() method.
    }

    private function isComboWin(array $pieces):bool{

    }
    private function isPieceValide(array $pieces, PieceQuantik $p):bool{

    }
}
?>
