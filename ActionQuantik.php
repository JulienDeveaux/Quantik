<?php

include "PlateauQuantik.php";

class ActionQuantik
{
    protected PlateauQuantik $plateau;

    public function __construct(PlateauQuantik $plateau)
    {
        $this->plateau = $plateau;
    }

    public function getPlateau(): PlateauQuantik
    {
        return $this->plateau;
    }

    public function isValidePose(int $rowNum, int $colNum, PieceQuantik $piece): bool
    {
        $pieceRow = $this->plateau->getRow($rowNum);
        $pieceCol = $this->plateau->getCol($colNum);
        $pieceCorner = $this->plateau->getCorner(PlateauQuantik::getCornerFromCoord($rowNum, $colNum));
        $res = $this->isPieceValide($pieceRow, $piece) and $this->isPieceValide($pieceCol, $piece) and $this->isPieceValide($pieceCorner, $piece);
        return $res;
    }


    private static function isPieceValide(array $pieces, PieceQuantik $p): bool
    {
        switch ($p->getForme()){
            case PieceQuantik::CUBE :
                return !(in_array(PieceQuantik::initBlackCube(), $pieces) or in_array(PieceQuantik::initWhiteCube(), $pieces));
            case PieceQuantik::CONE :
                return !(in_array(PieceQuantik::initBlackCone(), $pieces) or in_array(PieceQuantik::initWhiteCone(), $pieces));
            case PieceQuantik::CYLINDRE :
                return !(in_array(PieceQuantik::initBlackCylindre(), $pieces) or in_array(PieceQuantik::initWhiteCylindre(), $pieces));
            case PieceQuantik::SPHERE :
                return !(in_array(PieceQuantik::initBlackSphere(), $pieces) or in_array(PieceQuantik::initWhiteSphere(), $pieces));

        }
    }


	public function posePiece(int $rowNum, int $colNum, PieceQuantik $piece):void{
		$this->plateau->setPiece($rowNum, $colNum, $piece);
	}



	public function __toString():String
	{
		$s = '<p>Vous avez ';
		for($i = 0; $i < PlateauQuantik::NBROWS; $i++) {
			if($this->isRowWin($i) || $this->isColWin($i) || $this->isCornerWin($i)) {
				$s = $s.'Gagné ^^</p>';
			} else {
				$s = $s.'Perdu :(</p>';
			}
		}
		return $s;
	}

    public function isRowWin(int $numRow): bool
    {
        $row = $this->plateau->getRow($numRow);
        return $this->isComboWin($row);
    }

    private static function isComboWin(array $pieces): bool
    {
        return
            (in_array(PieceQuantik::initBlackSphere(), $pieces) or in_array(PieceQuantik::initWhiteSphere(), $pieces)or
                in_array(PieceQuantik::initBlackCube(),$pieces)or in_array(PieceQuantik::initWhiteCube(), $pieces) or
                in_array(PieceQuantik::initBlackCone(),$pieces)or in_array(PieceQUantik::initWHiteCone(),$pieces)or
                in_array(PieceQuantik::initBlackCylindre(),$pieces) or in_array(PieceQuantik::initWhiteCylindre(), $pieces));
    }

    public function isColWin(int $numCol): bool
    {
        return self::isComboWin($this->plateau->getCol($numCol));

    }

    public function isCornerWin(int $dir): bool
    {

        return $this->isComboWin($this->plateau->getCorner($dir));
    }

}

?>
