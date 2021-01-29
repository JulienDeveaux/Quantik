<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css" />
	<title>TestQuantik</title>
</head>
<body>
	<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
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
    
    /*$ta = new ArrayPieceQuantik();
    $ta->addPieceQuantik(0);
    $ta->addPieceQuantik(1);
    $ta->addPieceQuantik(2);
    $ta->addPieceQuantik(3);
    $ta->setPieceQuantik(0, $cubeNoir);
    $initNoir = ArrayPieceQuantik::initPiecesNoires();
    echo $initNoir;
    $initBlanc = ArrayPieceQuantik::initPiecesBlanches();
    echo $initBlanc;
    /

    $cubeNoirtest = PieceQuantik::initBlackCube();
    $cubeBlanctest = PieceQuantik::initWhiteCube();
	/*$var->setPiece(0, 0, $cubeBlanc);
	$var->setPiece(1, 1, $cubeNoir);
	$var->setPiece(2, 2, $coneBlanc);
	$var->setPiece(3, 3, $coneNoir);
	$var->setPiece(3, 2, $cylindreBlanc);
	$var->setPiece(0, 1, $cylindreNoir);
	$var->setPiece(0, 2, $sphereBlanc);
	$var->setPiece(1, 2, $sphereNoir);*/

	$action = new ActionQuantik($tab);
	if(	$action->isValidePose(0, 0, $cubeBlanc)){
        $action->posePiece(0, 0, $cubeBlanc);
    }
    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        echo " Gagné ";
    }

    if( $action->isValidePose(0, 1, $cylindreNoir)){
        $action->posePiece(0, 1, $cylindreNoir);
    }

    if($action->isRowWin(0) or $action->isColWin(0) or $action->isCornerWin(0)){
        echo " Gagné ";
    }

   if($action->isValidePose(0, 2, $sphereBlanc)){

        $action->posePiece(0, 2, $sphereBlanc);
    }

    if($action->isRowWin(0) or $action->isColWin(2) or $action->isCornerWin(1)){
        echo " Gagné ";
    }


    if($action->isValidePose(0,3, $coneNoir)){
        $action->PosePiece(0,3, $coneNoir);
    }

    if($action->isRowWin(0) or $action->isColWin(3) or $action->isCornerWin(1)){
        echo " Gagné ici";
    }


    if($action->isValidePose(1,0, $coneBlanc1)){
        $action->PosePiece(1,0,$coneBlanc1);
    }

    if($action->isRowWin(1) or $action->isColWin(0) or $action->isCornerWin(0)){
        echo " Gagné";
    }


    if(	$action->isValidePose(1, 1, $cubeNoir)){
        $action->posePiece(1, 1, $cubeNoir);
    }

    if($action->isRowWin(1) or $action->isColWin(1) or $action->isCornerWin(0)){
        echo $action->isCornerWin(0);
           echo " Gagné ici n'est pas normal à revoir";
    }




    if($action->isValidePose(1, 2 , $sphereNoir)){

        $action->posePiece(1, 2, $sphereNoir);
    }
    if($action->isRowWin(1) or $action->isColWin(2) or $action->isCornerWin(1)){
        echo " Gagné ";
    }



    if($action->isValidePose(1, 3, $cubeBlanctest)){

        $action->posePiece(1, 3, $cubeNoirtest);
    }
    if($action->isRowWin(1) or $action->isColWin(3) or $action->isCornerWin(1)){
        echo " Gagné ";

    }


    if( $action->isValidePose(2, 0, $sphereBlanc1)){
        $action->posePiece(2, 0, $sphereBlanc1);
    }
    if($action->isRowWin(2) or $action->isColWin(0) or $action->isCornerWin(2)){
        echo " Gagné ";

    }


    if( $action->isValidePose(2, 1, $cylindreBlanc1)){
        $action->posePiece(2, 1, $cylindreBlanc1);
    }
    if($action->isRowWin(2) or $action->isColWin(1) or $action->isCornerWin(2)){
        echo " Gagné ";

    }


    if( $action->isValidePose(2, 2, $coneBlanc)){
        $action->posePiece(2, 2, $coneBlanc);
    }
    if($action->isRowWin(2) or $action->isColWin(2) or $action->isCornerWin(3)) {
        echo " Gagné ";
    }

    if ($action->isValidePose(2, 3, $cylindreNoir1)){
        $action->posePiece(2, 3, $cylindreNoir1);
    }
    if ($action->isRowWin(2) or $action->isColWin(3) or $action->isCornerWin(3)) {
                    echo " Gagné ";
    }



    if ($action->isValidePose(3, 0, $cubeNoir1)){
        $action->posePiece(3, 0, $cubeNoir1);
    }
    if ($action->isRowWin(3) or $action->isColWin(0) or $action->isCornerWin(2)) {
        echo " Gagné ";
        print_r($action->iscolWin(0));

    }


    if ($action->isValidePose(3, 1, $cubeBlanc1)){
        $action->posePiece(3, 1, $cubeBlanc1);
    }
    if ($action->isRowWin(3) or $action->isColWin(1) or $action->isCornerWin(2)) {
        echo " Gagné ";
    }


    if ($action->isValidePose(3, 2, $cylindreBlanc)){
        $action->posePiece(3, 2, $cylindreBlanc);
    }
    if ($action->isRowWin(3) or $action->isColWin(2) or $action->isCornerWin(3)) {
        echo " Gagné ";
    }



    if ($action->isValidePose(3, 3, $sphereNoir1)){
        $action->posePiece(3, 3, $sphereNoir1);
    }
    if ($action->isRowWin(3) or $action->isColWin(3) or $action->isCornerWin(3)) {
        echo " Gagné ";

    }



    ?>
</body>
</html>