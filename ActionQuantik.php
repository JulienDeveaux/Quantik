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
		$arr = $this->plateau->getRow($numRow);
		/*for($i = 0; $i < 4; $i++) {
			$arr[$i] = $this->plateau->getPiece($numRow, $i);
		}*/
		/*$p0 = $arr[0];
		$p1 = $arr[1];
		$p2 = $arr[2];
		$p3 = $arr[3];

		if($p0->forme != $p1->forme && $p0->forme != $p2->forme && $p0->forme != $p3->forme && $p1->forme != $p2->forme && $p1->forme != $p3->forme && $p2->forme != $p3->forme) {
			return true;
		}
		return false;*/
		return isComboWin($arr);
	}

	public function isColWin(int $numCol):bool{
		$arr = $this->plateau->getCol($numCol);
		/*for($i = 0; $i < 4; $i++) {
			$arr[$i] = $this->plateau->getPiece($numCol, $i);
		}*/
		return isComboWin($arr);
	}

	public function isCornerWin(int $dir):bool{
		$corner = $this->plateau->getCorner($dir);
		for($i = 0; $i < PlateauQuantik::NBROWS; $i++){

		}
		return true;
	}

	public function isValidePose(int $rowNum, int $colNum, PieceQuantik $piece):bool{
		$cornernum = $this->plateau->getCornerFromCoord($rowNum, $colNum);
		$corner = $this->plateau->getCorner($cornernum);
		for($i = 0; $i < PlateauQuantik::NBROWS; $i++){
			if($corner[$i] == $piece){
				return false;
			} 
		}
		$row = $this->plateau->getRow($rowNum);
		if($row[0]->forme == $row[1]->forme || $row[0]->forme == $row[2]->forme || $row[0]->forme == $row[3]->forme || $row[1]->forme == $row[2]->forme || $row[1]->forme == $row[3]->forme|| $row[2]->forme == $row[3]->forme) {
			return false;
		}
		$col = $this->plateau->getCol($numCol);
		if($col[0]->forme == $col[1]->forme || $col[0]->forme == $col[2]->forme || $col[0]->forme == $col[3]->forme || $col[1]->forme == $col[2]->forme || $col[1]->forme == $col[3]->forme|| $col[2]->forme == $col[3]->forme) {
			return false;
		}
		return true;
	}

	public function posePiece(int $rowNum, int $colNum, PieceQuantik $piece):void{
		/*if($this->isValidePose($rowNum, $colNum, $piece) == true) {	//merde ici mais marche sans
			$this->plateau->setPiece($rowNum, $colNum, $piece);
			echo '<p> piece posée</p>'
		} else {
			echo '<p> piece non posée</p>';
		}*/$this->plateau->setPiece($rowNum, $colNum, $piece);
		/*if($this->isColWin($colNum)) {
			echo '<p>Ok</p>';
		}*/
	}

	public function __toString():String
	{
		for($i = 0; $i < PlateauQuantik::NBROWS; $i++) {
			if($this->isRowWin($i) || $this->isColWin($i) || $this->isCornerWin($i)) {
				$s = '<p>Gagné ^^</p>';
			} else {
				$s = '<p>Perdu :(</p>';
			}
		}
		echo '<p>s : ';
		echo $s;
		echo '</p>';
		return $s;
	}

	private static function isPieceValide(array $pieces, PieceQuantik $p):bool{
		return false;
	}

	private static function isComboWin(array $arr):bool{
		$p0 = $arr[0];
		$p1 = $arr[1];
		$p2 = $arr[2];
		$p3 = $arr[3];
		echo $arr[0];
		if($p0->forme != $p1->forme && $p0->forme != $p2->forme && $p0->forme != $p3->forme && $p1->forme != $p2->forme && $p1->forme != $p3->forme && $p2->forme != $p3->forme) {
			return true;
		}
		return false;
	}
}
?>
