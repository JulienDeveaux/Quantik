<?php

include "PieceQuantik.php";

class PlateauQuantik
{
     public const NBROWS = 4;
    public const NBCOLS = 4;
    public const NW = 0;
    public const NE = 1;
    public const SW = 2;
    public const SE = 3;
    protected array $cases;

    public  function __construct(){
         $this->cases = array(array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0));
     }
    public function getPiece(int $rowNum, int $colNum):PieceQuantik{
        return $this->cases[$rowNum][$colNum];
    }
    public function setPiece(int $rowNum, int $colNum, PieceQuantik $p):void{
        $p = $this->cases[$rowNum][$colNum];
    }

    public function getRow(int $numRow):PieceQuantik{

    }

    public function getCol(int $numCol):PieceQuantik{

    }

    public function getCorner(int $dir):PieceQuantik{

        switch($dir){
            case(self::NW) :
                $formI = 0;
                $formJ = 0;
                $toI = self::NBCOLS / 2;
                $toJ = self::NBROWS / 2;
                break;

            case(self::NE) :
                $formI = 1;
                $formJ = 0;
                $toI = self::NBCOLS /2;
                $toJ = self::NBROWS;
            break;

            case(self::SW) :
                $formI = 0;
                $formJ = 1;
                $toI = self::NBCOLS;
                $toJ = self::NBROWS /2;
            break;

            case(self::SE):
                $formI = 1;
                $formJ = 1;
                $toI = self::NBCOLS;
                $toJ = self::NBROWS;
            break;

        }

        for($i = $formI, $i < $toI ; $i++) {
            for($j = $formJ, $j < $toJ ; $j++) {

            }
        }
    }

    public function __toString():string{

    }

    public function getCornerFromCoord(int $rowNum, int $colNum):int{

    }

}