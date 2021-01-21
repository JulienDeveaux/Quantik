
	<form action="formulaireQuantikTwo.php" method ="get">
		<?php
		include "ActionQuantik.php";


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
				$res =  $res."<button type='submit' name='active' disabled >";
				$res =  $res.$a->getPieceQuantik($i);
				$res =  $res."</button>";
			}
			return $res;
		}

		function getFormSelectionPiece(ArrayPieceQuantik $a):string {
			$res = "";
			return $res;
		}

		function getDivPlateauQuantik(PlateauQuantik $p):string {
			for($i = 0; $i < 3; $i++) {
				$array[$i] = $p->getRow($i);
			}

			$s = '<p><table>';
			foreach($array as $value =>$v) {
				$s = $s.'<tr>';
				foreach ($v as $key => $val) {
					$s = $s."<td>".$val."</td>";
				}
				$s = $s."</tr>";
			}
			$s = $s.'</table></p>';
			return $s;
		}

		function getFormPlateauQuantik(PlateauQuantik $pl, PieceQuantik $p):string {
			$res = "";
			return $res;
		}

		echo getDebutHTML();

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
		echo $ta;

		$t = new ArrayPieceQuantik();
		$t = $t->initPiecesBlanches();
		$res  = getDivPiecesDisponibles($t);
		echo $res;

		$tableau = new PlateauQuantik();
		$res = getDivPlateauQuantik($tableau);
		echo $res;




		echo getFinHTML();
		?>
	</form>
