<?php


class PieceQuantik
{
    public static int $WHITE = 0;
    public static int $BLACK = 1;
    public static int $VOID = 0;
    public static int $CUBE = 1;
    public static int $CONE = 2;
    public static int $CYLINDRE = 3;
    public static int $SPHERE = 4;
    protected int $forme;
    protected int $couleur;

    //constructeur
    private function __construct(int $forme, int $couleur){

    }
    public function getForme(){
        return $this->forme;
    }
    public function getCouleur(){
        return $this->couleur;
    }
    public function __toString(){
        return $this;
    }
    public static function initVoid(){

    }

    public static function initWhiteCube(){

    }

    public static function initBlackCube(){

    }

    public static function initWhiteCone(){

    }

    public static function initBlackCone(){

    }

    public static function initWhiteCylindre(){

    }
    public static function initBlackCylindre(){

    }

    public static function initWhiteSpere(){

    }
    public static function initBlackSphere(){

    }
}