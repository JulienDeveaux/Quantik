	<a href="restart.php">Restart</a>
	<form action="FormulaireQuantikFour.php" method ="get">
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
		
		if (isset($_GET['trio'])) {
			$String = $_GET['trio'];
			$PiecePosition = (int)$String[0];
			$posx = (int)$String[2];
			$posy = (int)$String[4];
			$Piece = $tB->getPieceQuantik($PiecePosition);
			echo $Piece;
			$action = new ActionQuantik($tableau);
			if(	$action->isValidePose($posx, $posy, $Piece)){
				$action->posePiece($posx, $posy, $Piece);
				$tB->removePieceQuantik($PiecePosition);
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


		echo getDebutHTML();

		if(isset($String)) {
			echo $tableau;
			$affichepiecesNoires = getDivPiecesDisponibles($tN);
			echo $affichepiecesNoires;
		}

		$_SESSION['tableau'] = serialize($tableau);
		$_SESSION['ArrayNoir'] = serialize($tN);
		$_SESSION['ArrayBlanc'] = serialize($tB);
		echo '</form>';
		echo getFinHTML();
		?>