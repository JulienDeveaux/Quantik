<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css"/>
	<title>TestQuantik</title>
</head>
<body>
	<a href="restart.php">Restart</a>
	<form action="FormulaireQuantikTwo.php" method ="get">
		<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		include "ActionQuantik.php";
		session_start();

		if(!isset($_SESSION['tableau'])) {
			$tableau = new PlateauQuantik();
		} else {
			$tableau = unserialize($_SESSION['tableau']);
		}
		if (!isset($_SESSION['ArrayBlanc'])) {
			$tB = new ArrayPieceQuantik();
			$tB = $tB->initPiecesBlanches();
		} else {
			$tB = unserialize($_SESSION['ArrayBlanc']);
		}
		if (!isset($_SESSION['ArrayNoir'])) {
			$tN = new ArrayPieceQuantik();
			$tN = $tN->initPiecesNoires();
		} else {
			$tN = unserialize($_SESSION['ArrayNoir']);
		}

		if (isset($_GET['trio'])) {
			$String = $_GET['trio'];
			$PiecePosition = (int)$String[0];
			$posx = (int)$String[2];
			$posy = (int)$String[4];
			$Piece = $tN->getPieceQuantik($PiecePosition);
			echo $Piece;
			$action = new ActionQuantik($tableau);
			if($action->isValidePose($posx, $posy, $Piece)){
				$action->posePiece($posx, $posy, $Piece);
				$tN->removePieceQuantik($PiecePosition);
			} else {
				echo '/!\ Problème de récupération de la pièce sélectionnée /!\ ';
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
				$res = $res.$i;
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
				$res = $res.$i;
				$res = $res."' disabled >";
				$res = $res.$a->getPieceQuantik($i);
				$res = $res."</button>";
			}
			return $res;
		}

		function getDivPlateauQuantik(PlateauQuantik $pl):string {
			for($i = 0; $i < 4; $i++) {
				$array[$i] = $pl->getRow($i);
			}
			$x = 0;
			$y = 0;
			$piece = "0 0";

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

		function getFormPlateauQuantik(PlateauQuantik $pl, PieceQuantik $p):string {
			$pl->setPiece($posx, $posy, $p);
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

	//echo getDebutHTML();

		if(isset($String)) {
			echo $tableau;
			echo getDivPiecesDisponibles($tB);
		} else {
			echo '<p>Initialisation de la partie</p>';
			echo $tableau;
			echo getDivPiecesDisponibles($tB);
			echo '</br>';
			echo getFormSelectionPiece($tN);
		}

		$_SESSION['ArrayBlanc'] = serialize($tB);
		$_SESSION['ArrayNoir'] = serialize($tN);
		$_SESSION['tableau'] = serialize($tableau);
		echo '</form>';
		echo getFinHTML();
		?>