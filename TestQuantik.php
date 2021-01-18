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
        echo " Gagné ";
        echo"Cubenoir";

    }

    if(	$action->isValidePose(1, 1, $cubeNoir)){
        $action->posePiece(1, 1, $cubeNoir);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
           echo " Gagné ";
           echo"Cubenoir";

    };

    if( $action->isValidePose(2, 2, $coneBlanc)){
        $action->posePiece(2, 2, $coneBlanc);
    }
    if($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(3)){
                    echo " Gagné ";
                    echo"coneblanc";

    };

    if ($action->isValidePose(2, 2, $coneNoir)){
        $action->posePiece(2, 2, $coneNoir);
    }

    if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo " Gagné ";
                    echo"cone noir";

    };

    if( $action->isValidePose(0, 1, $cylindreNoir)){
        $action->posePiece(0, 1, $cylindreNoir);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
         echo " Gagné ";
         echo"cylindreNoir";

    };

    if($action->isValidePose(0, 2, $sphereBlanc)){

        $action->posePiece(0, 2, $sphereBlanc);
    }
    if($action->isRowWin(0) or $action->isColWin(2) or $action->isCornerWin(1)){
       echo " Gagné ";
       echo"SphereBlanc";


    };

    if($action->isValidePose(1, 2 , $sphereNoir)){

        $action->posePiece(1, 2, $sphereNoir);
    }
    if($action->isRowWin(1) or $action->isColWin(2) or $action->isCornerWin(1)){
         echo " Gagné ";
         echo"sphereNoir";

    };

    if($action->isValidePose(0,3, $coneNoir)){
        $action->PosePiece(0,3, $coneNoir);
    }
    if($action->isRowWin(0) or $action->isColWin(3) or $action->isCornerWin(1)){
          echo " Gagné ";
          echo "coneNoir";

    };

    echo $tab;

    ?>
    <button type='submit' name='active' disabled >(Co:W)BoutonHTML</button>
</body>
</html>