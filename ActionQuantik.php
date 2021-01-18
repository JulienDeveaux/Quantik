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
		$row = $this->plateau->getCol($numCol);
		return $this->isComboWin($row);
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

	public function isValidePose(int $rowNum, int $colNum, PieceQuantik $piece):bool{
		$piecesRow = $this->plateau->getRow($rowNum);
		$piecesCol = $this->plateau->getCol($colNum);
		$pieresCor = $this->plateau->getCorner(PlateauQuantik::getCornerFromCoord($rowNum, $colNum));
		return ($this->isPieceValide($piecesRow, $piece) and $this->isPieceValide($piecesCol, $piece) and $this->isPieceValide($pieresCor, $piece));
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

	private static function isComboWin(array $arr):bool{
		return ((in_array(PieceQuantik::initBlackSpere(), $arr) or in_array(PieceQuantik::initWhiteSpere(), $arr)) and
			(in_array(PieceQuantik::initBlackCone(), $arr) or in_array(PieceQuantik::initWhiteCone(), $arr)) and
			(in_array(PieceQuantik::initBlackCube(), $arr) or in_array(PieceQuantik::initWhiteCube(), $arr)) and
			(in_array(PieceQuantik::initBlackCylindre(), $arr) or in_array(PieceQuantik::initWhiteCylindre(), $arr)));
	}
}
?>
