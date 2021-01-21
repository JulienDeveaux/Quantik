<form action="FormulaireQuantikFour.php" method ="get">
	<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include "ActionQuantik.php";
	session_start();
	$tableau = $_SESSION['tableau'];
	if ($_GET) {
		if (isset($_GET['PosPlateau'])) {
			$PosPlateau = $_GET['PosPlateau'];
			$posx = (int)$PosPlateau[0];
			$posy = (int)$PosPlateau[2];
			echo 'posx : '+$posx;
			echo 'posy : '+$posy;
		} elseif (isset($_GET['trio'])) {
			$String = $_GET['trio'];
			$Piece = PieceQuantik::initVoid();
			if($String[0] == 0) {				//Blanc
				if($String[2] == 1) {			//Cube
					$Piece = PieceQuantik::initWhiteCube();
				} else if($String[2] == 2) {	//Cone
					$Piece = PieceQuantik::initWhiteCone();
				} else if($String[2] == 3) {	//Cylindre
					$Piece = PieceQuantik::initWhiteCylindre();
				} else if($String[2] == 4) {	//Sphere
					$Piece = PieceQuantik::initWhiteSphere();
				}
			} else {								//Noir
				if($String[0] == 1) {			//Cube
					$Piece = PieceQuantik::initBlackSphere();
				} else if($String[2] == 2) {	//Cone
					$Piece = PieceQuantik::initBlackSphere();
				} else if($String[2] == 3) {	//Cylindre
					$Piece = PieceQuantik::initBlackSphere();
				} else if($String[2] == 4) {	//Sphere
					$Piece = PieceQuantik::initBlackSphere();
				}
			}
			$posx = (int)$String[4];
			$posy = (int)$String[6];
			echo 'posx : '+$posx;
			echo 'posy : '+$posy;
			echo $Piece;
			$action = new ActionQuantik($tableau);
			if(	$action->isValidePose($posx, $posy, $Piece)){
				$action->posePiece($posx, $posy, $Piece);
			echo 'piece ajoutée';
			} else {
				$erreurPlacement;
			}
		}
	}

	function getDebutHTML():String{
		$s = "<!DOCTYPE html> <html lang=\"fr\">
		<head>
		<title>Quantik</title>
		<meta charset=\"utf-8\" />
		<link rel=\"stylesheet\" href=\"style.css\" />
		</head>
		<body>";
		return $s;
	}

	function getFinHTML():String{
		$s = "</body>
		</html>";
		return $s;
	}

	function getDivPiecesDisponibles(ArrayPieceQuantik $a):string {
		$res = "";
		for($i = 0; $i < $a->getTaille(); $i++) {
			$res = $res."<button type='submit' name='PiecesDispo' value='";
			if($a->getPieceQuantik($i)->getCouleur() == 0) {			//Blanc
				if($a->getPieceQuantik($i)->getForme() == 1) {			//Cube
					$res = $res."0 1";
				} else if($a->getPieceQuantik($i)->getForme() == 2) {	//Cone
					$res = $res."0 2";
				} else if($a->getPieceQuantik($i)->getForme() == 3) {	//Cylindre
					$res = $res."0 3";
				} else if($a->getPieceQuantik($i)->getForme() == 4) {	//Sphere
					$res = $res."0 4";
				}
			} else {													//Noir
				if($a->getPieceQuantik($i)->getForme() == 1) {			//Cube
					$res = $res."1 1";
				} else if($a->getPieceQuantik($i)->getForme() == 2) {	//Cone
					$res = $res."1 2";
				} else if($a->getPieceQuantik($i)->getForme() == 3) {	//Cylindre
					$res = $res."1 3";
				} else if($a->getPieceQuantik($i)->getForme() == 4) {	//Sphere
					$res = $res."1 4";
				}
			}
			$res = $res.$a->getPieceQuantik($i);
			$res = $res."' enabled >";
			$res = $res.$a->getPieceQuantik($i);
			$res = $res."</button>";
		}
		return $res;
	}

	function getFormSelectionPiece(ArrayPieceQuantik $a):string {
		$res = "";
		for($i = 0; $i < $a->getTaille(); $i++) {
			$res = $res."<button type='submit' name='PiecesDispo' value='";
			$res = $res.$a->getPieceQuantik($i)."' disabled >";
			$res = $res.$a->getPieceQuantik($i);
			$res = $res."</button>";
		}
		return $res;
	}

	function getDivPlateauQuantik(PlateauQuantik $p):string {
		for($i = 0; $i < 4; $i++) {
			$array[$i] = $p->getRow($i);
		}
		$x = 0;
		$y = 0;

		$s = '<p><table>';
		foreach($array as $value =>$v) {
			$s = $s.'<tr>';
			foreach ($v as $key => $val) {
				if($val == '<p>Vide </p>') {
					$s = $s."<td>"."<button type='submit' name='PosPlateau' value='".$x." ".$y."' enabled >".$val."</button>"."</td>";
				} else {
					$s = $s."<td>"."<button type='submit' name='PosPlateau' disabled >".$x." ".$y."</button>"."</td>";
				}
				$y++;			
			}
			$x++;
			$y = 0;
			$s = $s."</tr>";
		}
		$s = $s.'</table></p>';
		return $s;
	}

	function getFormPlateauQuantik(PlateauQuantik $pl, PieceQuantik $p):string {
		for($i = 0; $i < 4; $i++) {
			$array[$i] = $pl->getRow($i);
		}
		$x = 0;
		$y = 0;
		$s = '<p><table>';
		foreach($array as $value =>$v) {
			$s = $s.'<tr>';
			foreach ($v as $key => $val) {
				if($val == '<p>Vide </p>') {
					$s = $s."<td>"."<button type='submit' name='PosPlateau' value='".$x." ".$y."' enabled >".$val."</button>"."</td>";
				} else {
					$s = $s."<td>"."<button type='submit' name='PosPlateau' disabled >".$val."</button>"."</td>";
				}
				$y++;			
			}
			$x++;
			$y = 0;
			$s = $s."</tr>";
		}
		$s = $s.'</table></p>';
		return $s;
	}

	/*
		$action = new ActionQuantik($pl);
		if(	$action->isValidePose($x, $y, $p)){
			$action->posePiece($x, $y, $p);
		}
		echo 'piece ajoutée';
		if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
			echo " Gagné ";
		}
		*/

		echo getDebutHTML();

		if(isset($erreurPlacement)) {
			echo 'Erreur Placement a faire';
			echo "</br>";

			
		} else if(isset($String)) {
			echo $tableau;
			$tN = new ArrayPieceQuantik();
			$tN = $tN->initPiecesNoires();
			$affichepiecesNoires = getDivPiecesDisponibles($tN);
			echo $affichepiecesNoires;
		}

		$_SESSION['tableau'] = $tableau;
		echo '</form>';
		echo getFinHTML();
		?>
		<?php


		?>