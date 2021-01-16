<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css" />
<title>TestQuantik</title>
</head>
<body>
<?php
include "PlateauQuantik.php";

$var = new PlateauQuantik();
$piece1 = PieceQuantik::initWhiteCube();
$piece2 = PieceQuantik::initBlackCone();
$piece3 = PieceQuantik::initBlackCylindre();
$piece4 = PieceQuantik::initWhiteSpere();
$piece5 = PieceQuantik::initBlackCube();
$var->setPiece(0, 0, $piece1);
$var->setPiece(1, 1, $piece2);
$var->setPiece(2, 2, $piece3);
$var->setPiece(3, 3, $piece4);
$var->setPiece(3, 2, $piece5);
echo '<p>';
echo $var;
echo '</p>';

?>
</body>
</html>