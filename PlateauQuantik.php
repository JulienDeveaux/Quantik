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

	public function __construct(){
		/*$this->cases = array();		//rajouter une ligne vide en plus
		for($i; $i < self::NBROWS; $i++) {
			$this->cases[$i] = array();
			for($j = 0; $j < self::NBCOLS; $j++) {
				$this->cases[$i][$j] = PieceQuantik::initVoid();
			}
		}*/
		$this->cases = array_fill(0, self::NBROWS, array_fill(0, self::NBCOLS, PieceQuantik::initVoid()));
		/*$this->cases = array(array(PieceQuantik::initVoid(),PieceQuantik::initVoid(),PieceQuantik::initVoid(),PieceQuantik::initVoid()),array(PieceQuantik::initVoid(),PieceQuantik::initVoid(),PieceQuantik::initVoid(),PieceQuantik::initVoid()),array(PieceQuantik::initVoid(),PieceQuantik::initVoid(),PieceQuantik::initVoid(),PieceQuantik::initVoid()),array(PieceQuantik::initVoid(),PieceQuantik::initVoid(),PieceQuantik::initVoid(),PieceQuantik::initVoid()));*/
	}

	public function getPiece(int $rowNum, int $colNum):PieceQuantik{
		return $this->cases[$rowNum][$colNum];
	}

	public function setPiece(int $rowNum, int $colNum, PieceQuantik $p):void{
		$this->cases[$rowNum][$colNum] = $p;
	}

	public function getRow(int $numRow):array{
		for ($i = 0; $i < 4; $i++){
			$resultat[$i] = $this->cases[$numRow][$i];
		}
		return $resultat;
	}


	public function getCol(int $numCol):array{
		for ($i = 0; $i < 4; $i++){
			$resultat[$i] = $this->cases[$i][$numCol];
		}
		return $resultat;
	}

	public function getCorner(int $dir):array{

		switch($dir){
			case(self::NW) :
			$fromI = 0;
			$fromJ = 0;
			$toI = self::NBCOLS / 2;
			$toJ = self::NBROWS / 2;
			break;

			case(self::NE) :
			$fromI = 1;
			$fromJ = 0;
			$toI = self::NBCOLS /2;
			$toJ = self::NBROWS;
			break;

			case(self::SW) :
			$fromI = 0;
			$fromJ = 1;
			$toI = self::NBCOLS;
			$toJ = self::NBROWS /2;
			break;

			case(self::SE):
			$fromI = 1;
			$fromJ = 1;
			$toI = self::NBCOLS;
			$toJ = self::NBROWS;
			break;

		}

		for($i = $fromI; $i < $toI ; $i++) {
			for($j = $fromJ; $j < $toJ ; $j++) {
				$resultat[$i] = $this->cases[$fromI][$fromJ];
			}
		}

		return $resultat;
		/*prof
		switch ($dir) {
			case self::NW
				return[$this->cases[0][0], $this->cases[0][1], $this->cases[1][0], $this->cases[0][1]];

			case self::NE
				return[$this->cases[0][2], $this->cases[0][3], $this->cases[1][2], $this->cases[1][3]];

			case self::SW
				return[$this->cases[2][0], $this->cases[2][1], $this->cases[3][0], $this->cases[3][1]];

			case self::SE
				return[$this->cases[2][2], $this->cases[2][3], $this->cases[3][2], $this->cases[3][3]];
		}*/

	}

	public function __toString():String{
		$s = '<p><table>';
		foreach($this->cases as $value =>$v) {
			$s = $s.'<tr>';
			foreach ($v as $key => $val) {
				$s = $s."<td>".$val."</td>";
			}
			$s = $s."</tr>";
		}
		$s = $s.'</table></p>';
		return $s;
	}

	public function getCornerFromCoord(int $rowNum, int $colNum):int{
		if($rowNum <= 2 && $colNum <= 2){
			return self::NW;
		}
		if($rowNum <= 2 && $colNum >= 3){
			return self::NE;
		}

		if($rowNum >= 3 && $colNum <= 2){
			return self::SW;
		}

		if($rowNum >= 3 && $colNum <= 2){
			return self::SE;
		}
	}
}
?>
