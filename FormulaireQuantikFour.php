<form action="FormulaireQuantikOne.php" method ="get">
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
		} elseif (isset($_GET['PiecesDispo'])) {
			$PiecesString = $_GET['PiecesDispo'];
			$PiecesDispo = PieceQuantik::initVoid();
			if($PiecesString[0] == 0) {				//Blanc
				if($PiecesString[2] == 1) {			//Cube
					$PiecesDispo = PieceQuantik::initWhiteCube();
				} else if($PiecesString[2] == 2) {	//Cone
					$PiecesDispo = PieceQuantik::initWhiteCone();
				} else if($PiecesString[2] == 3) {	//Cylindre
					$PiecesDispo = PieceQuantik::initWhiteCylindre();
				} else if($PiecesString[2] == 4) {	//Sphere
					$PiecesDispo = PieceQuantik::initWhiteSphere();
				}
			} else {								//Noir
				if($PiecesString[0] == 1) {			//Cube
					$PiecesDispo = PieceQuantik::initBlackSphere();
				} else if($PiecesString[2] == 2) {	//Cone
					$PiecesDispo = PieceQuantik::initBlackSphere();
				} else if($PiecesString[2] == 3) {	//Cylindre
					$PiecesDispo = PieceQuantik::initBlackSphere();
				} else if($PiecesString[2] == 4) {	//Sphere
					$PiecesDispo = PieceQuantik::initBlackSphere();
				}
			}
			echo 'Selectionner la case où ajouter la piece :'.$PiecesDispo;
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
			$res = $res.$a->getPieceQuantik($i)."' enabled >";
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
			$array[$i] = $pl->getRow($i);
		}
		$x = 0;
		$y = 0;
		$piece = "";

		if($a->getPieceQuantik($i)->getCouleur() == 0) {			//Blanc
				if($a->getPieceQuantik($i)->getForme() == 1) {			//Cube
					$piece = $piece."0 1";
				} else if($a->getPieceQuantik($i)->getForme() == 2) {	//Cone
					$piece = $piece."0 2";
				} else if($a->getPieceQuantik($i)->getForme() == 3) {	//Cylindre
					$piece = $piece."0 3";
				} else if($a->getPieceQuantik($i)->getForme() == 4) {	//Sphere
					$piece = $piece."0 4";
				}
			} else {													//Noir
				if($a->getPieceQuantik($i)->getForme() == 1) {			//Cube
					$piece = $piece."1 1";
				} else if($a->getPieceQuantik($i)->getForme() == 2) {	//Cone
					$piece = $piece."1 2";
				} else if($a->getPieceQuantik($i)->getForme() == 3) {	//Cylindre
					$piece = $piece."1 3";
				} else if($a->getPieceQuantik($i)->getForme() == 4) {	//Sphere
					$piece = $piece."1 4";
				}
			}

			$s = '<p><table>';
			foreach($array as $value =>$v) {
				$s = $s.'<tr>';
				foreach ($v as $key => $val) {
					if($val == '<p>Vide </p>') {
						$s = $s."<td>"."<button type='submit' name='trio' value='".$piece." ".$x." ".$y."' enabled >".$val."</button>"."</td>";
					} else {
						$s = $s."<td>"."<button type='submit' name='trio' disabled >".$x." ".$y."</button>"."</td>";
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
			echo 'test';
			for($i = 0; $i < 4; $i++) {
				$array[$i] = $pl->getRow($i);
			}
			$x = 0;
			$y = 0;
			$piece = "";

		if($p->getCouleur() == 0) {					//Blanc
			echo 'dans if';
				if($p->getForme() == 1) {			//Cube
					$piece = $piece."0 1";
				} else if($p->getForme() == 2) {	//Cone
					$piece = $piece."0 2";
				} else if($p->getForme() == 3) {	//Cylindre
					$piece = $piece."0 3";
				} else if($p->getForme() == 4) {	//Sphere
					$piece = $piece."0 4";
				}
		} else {									//Noir
				if($p->getForme() == 1) {			//Cube
					$piece = $piece."1 1";
				} else if($p->getForme() == 2) {	//Cone
					$piece = $piece."1 2";
				} else if($p->getForme() == 3) {	//Cylindre
					$piece = $piece."1 3";
				} else if($p->getForme() == 4) {	//Sphere
					$piece = $piece."1 4";
				}
			}
			echo 'piece'+$piece;

			$s = '<p><table>';
			foreach($array as $value =>$v) {
				$s = $s.'<tr>';
				foreach ($v as $key => $val) {
					if($val == '<p>Vide </p>') {
						$s = $s."<td>"."<button type='submit' name='trio' value='".$piece." ".$x." ".$y."' enabled >".$val."</button>"."</td>";
					} else {
						$s = $s."<td>"."<button type='submit' name='trio' disabled >".$val."</button>"."</td>";
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

		if(isset($PosPlateau)) {
			$tB = new ArrayPieceQuantik();
			$tB = $tB->initPiecesBlanches();
			$affichepiecesBlanches = getDivPiecesDisponibles($tB);
			echo $affichepiecesBlanches;
			echo "</br>";

			$tN = new ArrayPieceQuantik();
			$tN = $tN->initPiecesNoires();
			$affichepiecesNoires = getDivPiecesDisponibles($tN);
			echo $affichepiecesNoires;
		} else if(isset($PiecesString)) {
			$affichetab = getFormPlateauQuantik($tableau, $PiecesDispo);
			echo $affichetab;
		}

		$_SESSION['tableau'] = $tableau;
		echo '</form>';
		echo getFinHTML();
		?>
		<?php


		?>