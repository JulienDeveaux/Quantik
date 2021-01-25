<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css" />
	<title>TestQuantik</title>
</head>
<body>
	<a href="restart.php">Restart</a>
	<form action="FormulaireQuantikThree.php" method ="get">
		<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		include "ActionQuantik.php";
		session_start();
		if(!isset($_SESSION['tableau'])) {
			echo '/!\ Problème de récupération du tableau de jeu /!\ ';
			$tableau = new PlateauQuantik();
		} else {
			$tableau = unserialize($_SESSION['tableau']);
		}
		if (!isset($_SESSION['ArrayBlanc'])) {
			echo '/!\ Problème de récupération du tableau de pièces blanches /!\ ';
			$tB = new ArrayPieceQuantik();
			$tB = $tB->initPiecesBlanches();
		} else {
			$tB = unserialize($_SESSION['ArrayBlanc']);
		}
		if (!isset($_SESSION['ArrayNoir'])) {
			echo '/!\ Problème de récupération du tableau de pièces noires /!\ ';
			$tN = new ArrayPieceQuantik();
			$tN = $tN->initPiecesNoires();
		} else {
			$tN = unserialize($_SESSION['ArrayNoir']);
		}
		if (isset($_GET['PiecesDispo'])) {
			$PiecePosition = $_GET['PiecesDispo'];
			$PiecePosition = intval($PiecePosition);
			$PieceNom = $tB->getPieceQuantik($PiecePosition);
			echo 'Selectionner la case où ajouter la piece : '.$PieceNom;
		} else {
			echo '/!\ Problème de récupération de la pièce sélectionnée /!\ ';
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
				$array[$i] = $p->getRow($i);
			}

			$s = '<p><table>';
			foreach($array as $value =>$v) {
				$s = $s.'<tr>';
				foreach ($v as $key => $val) {
						$s = $s."<td>"."<button type='submit' disabled >".$val."</button>"."</td>";
				}
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
			global $PiecePosition;
			global $tableau;
			$action = new ActionQuantik($tableau);
			$s = '<p><table>';
			foreach($array as $value =>$v) {
				$s = $s.'<tr>';
				foreach ($v as $key => $val) {
					if($val == '<p>Vide </p>' and ($action->isValidePose($x, $y, $p))) {
						$s = $s."<td>"."<button type='submit' name='trio' value='".$PiecePosition." ".$x." ".$y."' enabled >".$val."</button>"."</td>";
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

		//echo getDebutHTML();

		if(isset($PiecePosition)) {
		    echo getDivPlateauQuantik($tableau);
			$affichetab = getFormPlateauQuantik($tableau, $PieceNom);
			echo $affichetab;
		}

		$_SESSION['tableau'] = serialize($tableau);
		$_SESSION['ArrayBlanc'] = serialize($tB);
		$_SESSION['ArrayNoir'] = serialize($tN);
		echo '</form>';
		echo getFinHTML();
		?>