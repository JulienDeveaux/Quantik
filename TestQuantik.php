<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css" />
	<title>TestQuantik</title>
</head>
<body>
	<?php
	include "ActionQuantik.php";

	$var = new PlateauQuantik();
	$tab = new PlateauQuantik();
	$piece1 = PieceQuantik::initWhiteCube();
	$piece2 = PieceQuantik::initBlackCone();
	$piece3 = PieceQuantik::initBlackCylindre();
	$piece4 = PieceQuantik::initWhiteSpere();
	$piece5 = PieceQuantik::initBlackCube();
	$piece6 = PieceQuantik::initWhiteCylindre();
	$piece7 = PieceQuantik::initBlackCone();
	$piece8 = PieceQuantik::initWhiteCone();
	$piece9 = PieceQuantik::initBlackSphere();
	$piece10 = PieceQuantik::initWhiteCylindre();
	$piece11 = PieceQuantik::initBlackSphere();
	$var->setPiece(0, 0, $piece1);
	$var->setPiece(1, 1, $piece2);
	$var->setPiece(2, 2, $piece3);
	$var->setPiece(3, 3, $piece4);
	$var->setPiece(3, 2, $piece5);
	$var->setPiece(0, 1, $piece6);
	$var->setPiece(0, 2, $piece7);
	$var->setPiece(1, 2, $piece8);
	$var->setPiece(0, 3, $piece9);
	$var->setPiece(3, 2, $piece10);
	$var->setPiece(1, 0, $piece11);
	echo '<p>plateau rempli par setPiece de PlateauQuantik :</p>';
	echo $var;
	$action = new ActionQuantik($tab);
	$action->posePiece(0, 0, $piece1);
	$action->posePiece(1, 1, $piece2);
	$action->posePiece(2, 2, $piece3);
	$action->posePiece(3, 3, $piece4);
	$action->posePiece(0, 1, $piece6);
	$action->posePiece(0, 2, $piece7);
	$action->posePiece(1, 2, $piece8);
	$action->posePiece(0, 3, $piece9);
	$action->posePiece(3, 2, $piece10);
	$action->posePiece(1, 0, $piece11);
	echo '<p>plateau rempli par posePiece de ActionQuantik :</p>';
	echo $tab;
	echo '<p>test de getPlateau de ActionQuantik :</p>';
	echo $action->getPlateau();

	?>
</body>
</html>