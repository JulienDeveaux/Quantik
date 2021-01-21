<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css" />
	<title>Quantik</title>
</head>
<body>
	<form action="formulaireQuantikTwo.php" method ="get">
		<?php
		include "ActionQuantik.php";
		echo 'test';

		function getDivPiecesDisponibles(ArrayPieceQuantik $a):string {
			for($i = 0; $i < $a->getTaille; $i++) {
				$res =  "<button type='submit' name='active' disabled >";
				$res =  $res.$a->getPieceQuantik($i);
				$res =  $res."</button>";
			}
			return $res;
		}
		echo 'test';

		$cubeBlanc = PieceQuantik::initWhiteCube();
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

		$ta = new ArrayPieceQuantik();
		$ta->addPieceQuantik(0);
		$ta->addPieceQuantik(1);
		$ta->addPieceQuantik(2);
		$ta->addPieceQuantik(3);
		$ta->setPieceQuantik(0, $cubeNoir);
		echo 'test';
		echo $ta;
		?>
	</form>
</body>
</html>