<?php

include "PlateauQuantik.php";
include "PieceQuantik.php";

class ArrayPieceQuantik
{
	protected array $piecesQuantiks;
	protected int $taille;

	public function __construct() {
		$this->taille = 0;
	}

	public function __toString():String {
		$s = '<p>tableau : ';
		for($i = 0; $i < $this->taille; $i++) {
			$s = $s.$this->piecesQuantiks[$i].' ';
		}
		$s = $s.'</p>';
        return $s;
	}

	public function getTaille(): int {
		return $this->taille;
	}

	/*public const function initPiecesNoires(): ArrayPieceQuantik {
		$this->piecesQuantiks[0] = PieceQuantik::initBlackCube();
		$this->piecesQuantiks[1] = PieceQuantik::initBlackCone();
		$this->piecesQuantiks[2] = PieceQuantik::initBlackCylindre();
		$this->piecesQuantiks[3] = PieceQuantik::initBlackSphere();
		return $this;
	}

	public const function initPiecesBlanches(): ArrayPieceQuantik {
		$this->piecesQuantiks[0] = PieceQuantik::initWhiteCube();
		$this->piecesQuantiks[1] = PieceQuantik::initWhiteCone();
		$this->piecesQuantiks[2] = PieceQuantik::initWhiteCylindre();
		$this->piecesQuantiks[3] = PieceQuantik::initWhiteSphere();
		return $this;
	}*/

	public function getPieceQuantik(int $pos): PieceQuantik {
		return $this->piecesQuantiks[$pos];
	}

	public function setPieceQuantik(int $pos, PieceQuantik $piece): void {
		$this->piecesQuantiks[$pos] = $piece;
	}

	public function addPieceQuantik(int $pos): void {
		$this->taille++;
		$this->piecesQuantiks[$pos] = PieceQuantik::initVoid();
	}

	public function removePieceQuantik(int $pos): void {
		$this->taille--;
		$this->piecesQuantiks[$pos] = null;
	}
}

?>