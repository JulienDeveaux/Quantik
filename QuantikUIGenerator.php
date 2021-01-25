<?php

require_once "PlateauQuantik.php";
require_once "ArrayPieceQuantik.php";

/**
 * Class QuantikUIGenerator
 */
class QuantikUIGenerator
{

    /**
     * @param string $title
     * @return string
     */
    public static function getDebutHTML(string $title = "Quantik"): string
    {
        return "<!doctype html>
<html lang='fr'>
    <head>
        <meta charset='UTF-8'>
        <title>$title</title>
        <link rel=\"stylesheet\" type=\"text/css\" href=\"quantik.css\" />
    </head>
    <body>
        <h1 class=\"quantik\">$title</h1>
        <div class='quantik'>\n";
    }

    /**
     * @return string
     */
    public static function getFinHTML(): string
    {
        return "</div></body>\n</html>";
    }

    /**
     * @param string $message
     * @return string
     */
    public static function getPageErreur(string $message): string
    {
        header("HTTP/1.1 400 Bad Request");
        $resultat = self::getDebutHTML("400 Bad Request");
        $resultat .= "<h2>$message</h2>";
        $resultat .= "<p><br /><br /><br /><a href='quantik.php?reset'>Retour à l'accueil...</a></p>";
        $resultat .= self::getFinHTML();
        return $resultat;
    }

    /**
     * @param PieceQuantik $pq
     * @return string
     */
    public static function getButtonClass(PieceQuantik $pq) {
        if ($pq->getForme()==PieceQuantik::VOID)
            return "vide";
        $ch = $pq->__toString();
        return substr($ch,1,2).substr($ch,4,1);
    }

    /**
     * production d'un bloc HTML pour présenter l'état du plateau de jeu,
     * l'attribution de classes en vue d'une utilisation avec les est un bon investissement...
     * @param PlateauQuantik $p
     * @return string
     */
    public static function getDivPlateauQuantik(PlateauQuantik $p): string
    {
        $resultat ="";
        for($i = 0; $i < 4; $i++) {
            $array[$i] = $p->getRow($i);
        }

        $resultat = '<p><table>';
        foreach($array as $value =>$v) {
            $resultat = $resultat.'<tr>';
            foreach ($v as $key => $val) {
                $resultat = $resultat."<td>"."<button type='submit' disabled >".$val."</button>"."</td>";
            }
            $resultat = $resultat."</tr>";
        }
        $resultat = $resultat.'</table></p>';
        return $resultat;
    }

    /**
     * @param ArrayPieceQuantik $apq
     * @param int $pos permet d'identifier la pièce qui a été sélectionnée par l'utilisateur avant de la poser (si != -1)
     * @return string
     */
    public static function getDivPiecesDisponibles(ArrayPieceQuantik $apq, int $pos = -1): string {
        $resultat ="";
        for($i = 0; $i < $apq->getTaille(); $i++) {
            $resultat = $resultat."<button type='submit' name='action' value='choisirPiece'";
            $resultat = $resultat.$i;
            $pos = $i;
            $resultat = $resultat."' enabled >";
            $resultat = $resultat.$apq->getPieceQuantik($i);
            $resultat = $resultat."</button>";
        }
        return $resultat;
    }

    /**
     * @param ArrayPieceQuantik $apq
     * @return string
     */
    public static function getFormSelectionPiece(ArrayPieceQuantik $apq): string {
        $resultat ="";
        for($i = 0; $i < $apq->getTaille(); $i++) {
            $resultat = $resultat."<button type='submit' ";
            $resultat = $resultat."' disabled >";
            $resultat = $resultat.$apq->getPieceQuantik($i);
            $resultat = $resultat."</button>";
        }
        return $resultat;
    }

    /**
     * @param PlateauQuantik $plateau
     * @param PieceQuantik $piece
     * @param int $position position de la pièce qui sera posée en vue de la transmettre via un champ caché du formulaire
     * @return string
     */
    public static function getFormPlateauQuantik(PlateauQuantik $plateau, PieceQuantik $piece, int $position): string {
        $resultat ="";
        for($i = 0; $i < 4; $i++) {
            $array[$i] = $plateau->getRow($i);
        }
        $x = 0;
        $y = 0;
        global $PiecePosition;
        global $tableau;
        $action = new ActionQuantik($tableau);
        $resultat = '<p><table>';
        foreach($array as $value =>$v) {
            $resultat = $resultat.'<tr>';
            foreach ($v as $key => $val) {
                if($val == '<p>Vide </p>' and ($action->isValidePose($x, $y, $piece))) {
                    $resultat = $resultat."<td>"."<button type='submit' name='trio' value='".$PiecePosition." ".$x." ".$y."' enabled >".$val."</button>"."</td>";
                } else {
                    $resultat = $resultat."<td>"."<button type='submit' name='trio' disabled >".$val."</button>"."</td>";
                }
                $y++;
            }
            $x++;
            $y = 0;
            $resultat = $resultat."</tr>";
        }
        $resultat = $resultat.'</table></p>';

        // ajout d'un formulaire pour modifier le choix de la pièce à poser
        $resultat .= self::getFormBoutonAnnuler();

        return $resultat;
    }

    /**
     * @return string
     */
    public static function getFormBoutonAnnuler() : string {
        return "<div>  Changer de pièce </br> <button type='submit' name='action' value='annulerChoix' enabled >Annuler</button> </div>";
    }

    /**
     * @param int $couleur
     * @return string
     */
    public static function getDivMessageVictoire(int $couleur) : string {
        /* TODO div annonçant la couleur victorieuse et proposant un lien pour recommencer une nouvelle partie */

        $resultat ="";
        if($couleur = 0){
            $resultat .= "<div> Les Blancs ont remportés la partie ";
        }elseif ($couleur = 1){
            $resultat .=  "<div> Les Noirs ont remportés la partie ";
        }
        $resultat .= "<\br> Recommencer ".self::getLienRecommencer()."</div>";
        return $resultat;
    }

    /**
     * @return string
     */
    public static function getLienRecommencer():string {
        session_destroy();
        return "<p><a href='quantik.php'> Recommencer ?</a></p>";
    }

    /**
     * @param array $lesPiecesDispos tableau contenant 2 ArrayPieceQuantik un pour les pièves blanches, un pour les pièces noires
     * @param int $couleurActive
     * @param PlateauQuantik $plateau
     * @return string
     */
    public static function getPageSelectionPiece(array $lesPiecesDispos, int $couleurActive, PlateauQuantik $plateau): string {
        $pageHTML = QuantikUIGenerator::getDebutHTML();
        if($couleurActive = 0 ){

            $pageHTML .= self::getDivPiecesDisponibles($lesPiecesDispos[0]);
            $pageHTML .= "</br>";
            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[1]);

        }elseif ($couleurActive = 1){

            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[0]);
            $pageHTML .= "<\br>";
            $pageHTML .= self::getDivPiecesDisponibles($lesPiecesDispos[1]);
        }

        $pageHTML .= self::getDivPlateauQuantik($plateau);

        return $pageHTML. self::getFinHTML();
    }

    /**
     * @param array $lesPiecesDispos tableau contenant 2 ArrayPieceQuantik un pour les pièves blanches, un pour les pièces noires
     * @param int $couleurActive
     * @param int $posSelection position de la pièce sélectionnée dans la couleur active
     * @param PlateauQuantik $plateau
     * @return string
     */
    public static function getPagePosePiece(array $lesPiecesDispos, int $couleurActive, int $posSelection, PlateauQuantik $plateau): string {
        $pageHTML = QuantikUIGenerator::getDebutHTML();
        $pageHTML .= "<form action=\"quantik.php\" method =\"get\">";
        if($couleurActive = 0 ){
            echo 'test';
            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[0]);
            $pageHTML .= "</br>";
            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[1]);

        }elseif ($couleurActive = 1){

            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[0]);
            $pageHTML .= "<\br>";
            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[1]);
        }

        $pageHTML .= self::getFormPlateauQuantik($plateau);


        $pageHTML .= "</form>";
                                                                                        /* TODO a quoi sert $posSelection */

        return $pageHTML . self::getFinHTML();
    }

    /**
     * @param array $lesPiecesDispos tableau contenant 2 ArrayPieceQuantik un pour les pièves blanches, un pour les pièces noires
     * @param int $couleurActive
     * @param int $posSelection
     * @param PlateauQuantik $plateau
     * @return string
     */
    public static function getPageVictoire(array $lesPiecesDispos, int $couleurActive, PlateauQuantik $plateau): string {
        $pageHTML = QuantikUIGenerator::getDebutHTML();
        $pageHTML .= "<form action=\"quantik.php\" method =\"get\">";
        if($couleurActive = 0 ){

            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[0]);
            $pageHTML .= "</br>";
            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[1]);

        }elseif ($couleurActive = 1){

            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[0]);
            $pageHTML .= "<\br>";
            $pageHTML .= self::getFormSelectionPiece($lesPiecesDispos[1]);
        }

        $pageHTML .= self::getDivPlateauQuantik($plateau);
        $pageHTML .= self::getDivMessageVictoire($couleurActive);
        $pageHTML .= "</form>";
        return $pageHTML . self::getFinHTML();

    }

}