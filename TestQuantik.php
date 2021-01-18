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

	//include "PlateauQuantik.php";
	$var = new PlateauQuantik();
	$tab = new PlateauQuantik();
	$cubeBlanc = PieceQuantik::initWhiteCube();
	$cubeNoir = PieceQuantik::initBlackCube();
	$coneBlanc = PieceQuantik::initWhiteCone();
	$coneNoir = PieceQuantik::initBlackCone();
    $cylindreBlanc= PieceQuantik::initWhiteCylindre();
    $cylindreNoir = PieceQuantik::initBlackCylindre();
    $sphereBlanc = PieceQuantik::initWhiteSphere();
    $sphereNoir = PieceQuantik::initBlackSphere();

	/*$var->setPiece(0, 0, $cubeBlanc);
	$var->setPiece(1, 1, $cubeNoir);
	$var->setPiece(2, 2, $coneBlanc);
	$var->setPiece(3, 3, $coneNoir);
	$var->setPiece(3, 2, $cylindreBlanc);
	$var->setPiece(0, 1, $cylindreNoir);
	$var->setPiece(0, 2, $sphereBlanc);
	$var->setPiece(1, 2, $sphereNoir);*/


	echo '<p>plateau rempli par setPiece de PlateauQuantik :</p>';
	//echo $var;
	$action = new ActionQuantik($tab);
	if(	$action->isValidePose(0, 0, $cubeBlanc)){
        $action->posePiece(0, 0, $cubeBlanc);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        if($action->isRowWin(1) or $action->isColWin(1) or $action->isCornerWin(1)) {
            if ($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(2)) {
                if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo "Gagné";
                }
            }
        }
    };
    if(	$action->isValidePose(1, 1, $cubeNoir)){
        $action->posePiece(1, 1, $cubeNoir);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        if($action->isRowWin(1) or $action->isColWin(1) or $action->isCornerWin(1)) {
            if ($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(2)) {
                if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo "Gagné";
                }
            }
        }
    };

    if( $action->isValidePose(2, 2, $coneBlanc)){
        $action->posePiece(2, 2, $coneBlanc);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        if($action->isRowWin(1) or $action->isColWin(1) or $action->isCornerWin(1)) {
            if ($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(2)) {
                if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo "Gagné";
                }
            }
        }
    };
    if ($action->isValidePose(2, 2, $coneNoir)){
        $action->posePiece(2, 2, $coneNoir);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        if($action->isRowWin(1) or $action->isColWin(1) or $action->isCornerWin(1)) {
            if ($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(2)) {
                if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo "Gagné";
                }
            }
        }
    };
    if( $action->isValidePose(0, 1, $cylindreNoir)){
        $action->posePiece(0, 1, $cylindreNoir);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        if($action->isRowWin(1) or $action->isColWin(1) or $action->isCornerWin(1)) {
            if ($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(2)) {
                if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo "Gagné";
                }
            }
        }
    };
    if($action->isValidePose(0, 2, $sphereBlanc)){

        $action->posePiece(0, 2, $sphereBlanc);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        if($action->isRowWin(1) or $action->isColWin(1) or $action->isCornerWin(1)) {
            if ($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(2)) {
                if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo "Gagné";
                }
            }
        }
    };
    if($action->isValidePose(1, 2 , $sphereNoir)){

        $action->posePiece(1, 2, $sphereNoir);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        if($action->isRowWin(1) or $action->isColWin(1) or $action->isCornerWin(1)) {
            if ($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(2)) {
                if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo "Gagné";
                }
            }
        }
    };

    if($action->isValidePose(2,0, $coneNoir)){
        $action->PosePiece(2,0, $coneNoir);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        if($action->isRowWin(1) or $action->isColWin(1) or $action->isCornerWin(1)) {
            if ($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(2)) {
                if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo "Gagné";
                }
            }
        }
    };

    echo $tab;

    ?>
    <button type='submit' name='active' disabled >(Co:W)BoutonHTML</button>
</body>
</html>