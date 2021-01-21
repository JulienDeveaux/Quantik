
<form action="FormulaireQuantikTwo.php" method ="get">
	<?php
	include "ActionQuantik.php";
	session_start();
	$tableau = $_SESSION['tableau'];
	$pieceAjout = $_SESSION['piece'];
	if ($_GET) {
		if (isset($_GET['PosPlateau'])) {
			$PosPlateau = $_GET['PosPlateau'];
			$posx = $PosPlateau[0];
			$posy = $PosPlateau[2];
			echo 'posx : '+$posx;
			echo 'posy : '+$posy;
		} elseif (isset($_GET['PiecesDispo'])) {
			$PiecesDispo = $_GET['PiecesDispo'];
		} else {
			echo $pieceAjout;
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
		for($i = 0; $i < 3; $i++) {
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
		$pl->setPiece($posx, $posy, $p);
		for($i = 0; $i < 3; $i++) {
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

	echo getDebutHTML();

	if(isset($PosPlateau)) {
		echo $tableau;
		$tB = new ArrayPieceQuantik();
		$tB = $tB->initPiecesBlanches();
		$affichepiecesBlanches = getDivPiecesDisponibles($tB);
		echo $affichepiecesBlanches;
		echo "</br>";

		$tN = new ArrayPieceQuantik();
		$tN = $tN->initPiecesNoires();
		$affichepiecesNoires = getDivPiecesDisponibles($tN);
		echo $affichepiecesNoires;
	} else if(isset($PiecesDispo)) {
		echo $tableau;
		$affichetab = getDivPlateauQuantik($tableau);
		echo $affichetab;
	} else {
		echo 'Initialisation de la partie</br>';
		$tableau = new PlateauQuantik();
		echo $tableau;
		/*$afficheTab = getDivPlateauQuantik($tableau);
		echo $afficheTab;*/

		$tB = new ArrayPieceQuantik();
		$tB = $tB->initPiecesBlanches();
		$affichepiecesBlanches = getDivPiecesDisponibles($tB);
		echo $affichepiecesBlanches;
		echo "</br>";

		$tN = new ArrayPieceQuantik();
		$tN = $tN->initPiecesNoires();
		$affichepiecesNoires = getDivPiecesDisponibles($tN);
		echo $affichepiecesNoires;
	}

	/*$cubeBlanc = PieceQuantik::initWhiteCube();
	$cubeNoir = PieceQuantik::initBlackCube();
	$coneBlanc = PieceQuantik::initWhiteCone();
	$coneNoir = PieceQuantik::initBlackCone();
	$cylindreBlanc= PieceQuantik::initWhiteCylindre();
	$cylindreNoir = PieceQuantik::initBlackCylindre();
	$sphereBlanc = PieceQuantik::initWhiteSphere();
	$sphereNoir = PieceQuantik::initBlackSphere();
	$cubeBlanc1 = PieceQuantik::initWhiteCube();
	$cubeNoir1 = PieceQuantik::initBlackCube();
	$coneBlanc1 = PieceQuantik::initWhiteCone();
	$coneNoir1 = PieceQuantik::initBlackCone();
	$cylindreBlanc1= PieceQuantik::initWhiteCylindre();
	$cylindreNoir1 = PieceQuantik::initBlackCylindre();
	$sphereBlanc1 = PieceQuantik::initWhiteSphere();
	$sphereNoir1 = PieceQuantik::initBlackSphere();

	$tB = new ArrayPieceQuantik();
	$tB = $tB->initPiecesBlanches();
	$res  = getDivPiecesDisponibles($tB);
	echo $res;
	echo "</br>";

	$tN = new ArrayPieceQuantik();
	$tN = $tN->initPiecesNoires();
	$res  = getDivPiecesDisponibles($tN);
	echo $res;

	$tableau = new PlateauQuantik();
	$tableau->setPiece(0, 0, $cubeBlanc);
	$res = getDivPlateauQuantik($tableau);
	echo $res;*/

	$_SESSION['tableau'] = $tableau;
	echo '</form>';
	echo getFinHTML();
	?>
	<?php


	?>