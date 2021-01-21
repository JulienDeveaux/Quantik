
<form action="FormulaireQuantikOne.php" method ="get">
	<?php
	include "ActionQuantik.php";
	session_start();
	$tableau = $_SESSION['tableau'];
	if ($_GET) {
		if (isset($_GET['PosPlateau'])) {
			$PosPlateau = $_GET['PosPlateau'];
		} elseif (isset($_GET['PiecesDispo'])) {
			$PiecesDispo = $_GET['PiecesDispo'];
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
		return $res;
	}

	function getDivPlateauQuantik(PlateauQuantik $p):string {
		for($i = 0; $i < 3; $i++) {
			$array[$i] = $p->getRow($i);
		}

		$s = '<p><table>';
		foreach($array as $value =>$v) {
			$s = $s.'<tr>';
			foreach ($v as $key => $val) {
				if($val == '<p>Vide </p>') {
					$s = $s."<td>"."<button type='submit' name='PosPlateau' value='".$val."' enabled >".$val."</button>"."</td>";
				} else {
					$s = $s."<td>"."<button type='submit' name='PosPlateau' disabled >".$val."</button>"."</td>";
				}					
			}
			$s = $s."</tr>";
		}
		$s = $s.'</table></p>';
		return $s;
	}

	function getFormPlateauQuantik(PlateauQuantik $pl, PieceQuantik $p):string {
		$res = "";
		return $res;
	}

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
	} else if(isset($PiecesDispo)) {
		$affichetab = getDivPlateauQuantik($tableau);
		echo $affichetab;
	}

	$_SESSION['tableau'] = $tableau;
	echo '</form>';
	echo getFinHTML();
	?>
	<?php


	?>