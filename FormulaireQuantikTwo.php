
<form action="FormulaireQuantikOne.php" method ="get">
	<?php
	include "ActionQuantik.php";
	session_start();
	$tableau = $_SESSION['tableau'];
	if ($_GET) {
		if (isset($_GET['PosPlateau'])) {
			$PosPlateau = $_GET['PosPlateau'];
			$posx = $PosPlateau[0];
			$posy = $PosPlateau[2];
			echo 'posx : '+$posx;
			echo 'posy : '+$posy;
		} elseif (isset($_GET['PiecesDispo'])) {
			$PiecesDispo = $_GET['PiecesDispo'];
			echo $PiecesDispo;
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

	function getFormPlateauQuantik(PlateauQuantik $pl, PieceQuantik $p):void {
		echo 'TEST';
		$pl->setPiece($posx, $posy, $p);
		/*for($i = 0; $i < 3; $i++) {
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
		$s = $s.'</table></p>';*/
		echo 'piece ajoutée';
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
		$_SESSION['piece'] = $PiecesDispo;
		echo 'avget';
		$action = new ActionQuantik($tableau);
		echo $PiecesDispo;
		echo $action;
		echo 'echo';
		echo $action->isValidePose($posx, $posy, $PiecesDispo);
		echo 'apA';
		if(	$action->isValidePose($posx, $posy, $PiecesDispo)){
			echo 'if1';
			$action->posePiece($posx, $posy, $PiecesDispo);
		}
		echo 'apif';
		echo 'icicccc';
		$affichetab = getFormPlateauQuantik($tableau, $PiecesDispo);
		echo 'apget';
		echo $affichetab;
	}

	$_SESSION['tableau'] = $tableau;
	echo '</form>';
	echo getFinHTML();
	?>
	<?php


	?>