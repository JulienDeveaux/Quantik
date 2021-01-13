<?php


class PieceQuantik
{
    public const WHITE = 0;
    public const BLACK = 1;
    public const VOID = 0;
    public const CUBE = 1;
    public const CONE = 2;
    public const CYLINDRE = 3;
    public const SPHERE = 4;
    protected int $forme;
    protected int $couleur;

    //constructeur
    private function __construct(int $forme, int $couleur){
        $this->forme = $forme;
        $this->couleur = $couleur;

    }
    public function getForme():int{
        return $this->forme;
    }
    public function getCouleur():int{
        return $this->couleur;
    }
    public function __toString():string{

    }
    public static function initVoid():PieceQuantik{
        return new PieceQuantik(self::VOID, self::WHITE);
    }

    public static function initWhiteCube():PieceQuantik{
        return new PieceQuantik(self::CUBE, self::WHITE);
    }

    public static function initBlackCube():PieceQuantik{
        return new PieceQuantik(self::CUBE,self::BLACK);
    }

    public static function initWhiteCone():PieceQuantik{
        return new PieceQuantik(self::CONE, self::WHITE);
    }

    public static function initBlackCone():PieceQuantik{
        return new PieceQuantik(self::CONE,self::BLACK);
    }

    public static function initWhiteCylindre():PieceQuantik{
        return new PieceQuantik(self::CYLINDRE, self::WHITE);
    }
    public static function initBlackCylindre():PieceQuantik{
        return new PieceQuantik(self::CYLINDRE, self::BLACK);
    }

    public static function initWhiteSpere():PieceQuantik{
        return new PieceQuantik(self::SPHERE, self::WHITE);
    }
    public static function initBlackSphere():PieceQuantik{
        return new PieceQuantik(self::SPHERE,self::BLACK);
    }
}