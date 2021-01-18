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

	public function isRowWin(int $numRow):bool{
		$row = $this->plateau->getCol($numCol);
		return $this->isComboWin($row);
	}
    public function isValidePose(int $rowNum, int $colNum, PieceQuantik $piece): bool
    {
        $pieceRow = $this->plateau->getRow($rowNum);
        $pieceCol = $this->plateau->getCol($colNum);
        $pieceCorner = $this->plateau->getCorner(PlateauQuantik::getCornerFromCoord($rowNum, $colNum));

        return $this->isPieceValide($pieceRow, $piece) and $this->isPieceValide($pieceCol, $piece) and $this->isPieceValide($pieceCorner, $piece);
    }

	public function isColWin(int $numCol):bool{
		$col = $this->plateau->getCol($numCol);
		return $this->isComboWin($col);
		return false;
	}

	public function isCornerWin(int $dir):bool{
		$corner = $this->plateau->getCorner($dir);
		return $this->isComboWin($corner);
	}
    private static function isPieceValide(array $pieces, PieceQuantik $p): bool
    {
        switch ($pieces->getForme()){
            case PieceQuantik::CUBE :
                return !(in_array(PieceQuantik::initBlackCube(), $pieces) or in_array(PieceQuantik::initWhiteCube()));
            case PieceQuantik::CONE :
                return !(in_array(PieceQuantik::initBlackCone(), $pieces) or in_array(PieceQuantik::initWhiteCone()));
            case PieceQuantik::CYLINDRE :
                return !(in_array(PieceQuantik::initBlackCylindre(), $pieces) or in_array(PieceQuantik::initWhiteCylindre()));
            case PieceQuantik::SPHERE :
                return !(in_array(PieceQuantik::initBlackSphere(), $pieces) or in_array(PieceQuantik::initWhiteSphere()));

        }
    }

	public function isValidePose(int $rowNum, int $colNum, PieceQuantik $piece):bool{
		$piecesRow = $this->plateau->getRow($rowNum);
		$piecesCol = $this->plateau->getCol($colNum);
		$pieresCor = $this->plateau->getCorner(PlateauQuantik::getCornerFromCoord($rowNum, $colNum));
		return ($this->isPieceValide($piecesRow, $piece) and $this->isPieceValide($piecesCol, $piece) and $this->isPieceValide($pieresCor, $piece));
	}

	public function posePiece(int $rowNum, int $colNum, PieceQuantik $piece):void{
		$this->plateau->setPiece($rowNum, $colNum, $piece);
	}
    public function posePiece(int $rowNum, int $colNum, PieceQuantik $piece): void
    {
        /*if($this->isValidePose($rowNum, $colNum, $piece) == true) {	//merde ici mais marche sans
            $this->plateau->setPiece($rowNum, $colNum, $piece);
            echo '<p> piece posée</p>'
        } else {
            echo '<p> piece non posée</p>';
        }*/
        $this->plateau->setPiece($rowNum, $colNum, $piece);
        /*if($this->isColWin($colNum)) {
            echo '<p>Ok</p>';
        }*/
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

	private static function isPieceValide(array $pieces, PieceQuantik $p):bool{
		switch ($pieces->getForme()) {
			case PieceQuantik::CUBE:
				return !(in_array(PieceQuantik::initBlackCube(), $p) or in_array(PieceQuantik::initWhiteCube(), $p));

			case PieceQuantik::CONE:
				return !(in_array(PieceQuantik::initBlackCone(), $p) or in_array(PieceQuantik::initWhiteCone(), $p));

			case PieceQuantik::CYLINDRE:
				return !(in_array(PieceQuantik::initBlackCylindre(), $p) or in_array(PieceQuantik::initWhiteCylindre(), $p));

			case PieceQuantik::SPHERE:
				return !(in_array(PieceQuantik::initBlackSpere(), $p) or in_array(PieceQuantik::initWhiteSpere(), $p));

		}
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
        $col = $this->plateau->getCol($numCol);
        return $this->isComboWin($col);
    }

    public function isCornerWin(int $dir): bool
    {

        return $this->isComboWin($this->plateau->getCorner($dir));
    }


}

?>
