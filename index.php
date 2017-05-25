<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Compiladores</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">	
</head>
<body>
	<?php
	function analizar(){
		$reglas[0][0]="S";
		$reglas[0][1] = "CDC";

		$reglas[1][0] = "D";
		$reglas[1][1] = "e";

		$reglas[2][0] = "D";
		$reglas[2][1] = "f";

		$reglas[3][0] = "D";
		$reglas[3][1] = "g";

		$reglas[4][0] = "D";
		$reglas[4][1] = "h";

		$reglas[5][0] = "D";
		$reglas[5][1] = "j";

		$reglas[6][0] = "D";
		$reglas[6][1] = "k";

		$reglas[7][0] = "C";
		$reglas[7][1] = "n";

		$reglas[8][0] = "C";
		$reglas[8][1] = "E";

		$reglas[9][0] = "E";
		$reglas[9][1] = "l";

		$reglas[10][0] = "E";
		$reglas[10][1] = "m";

		$inicioFin = "$";
		// $regla = "mhn$";
		$regla = "mln$";

		$pilaResult = array();
		$posRegla = 0;
		$pilaResult[0] = "$";
		$pilaResult[1] = $regla[$posRegla];
		$controlPila = 1;

		for ($i=0; $i < 11 ; $i++) {
			
			if($pilaResult[$controlPila] != '$'){
				if ($pilaResult[$controlPila] == $reglas[$i][1]) {
					echo "<h1>".nl2br($pilaResult[$controlPila]." -> OK \n")."</h1>";
					$pilaResult[$controlPila] = $reglas[$i][0];
					$i = -1;
				}
				if($i == 10){
					if($pilaResult[$controlPila-1]!='$'){
						$controlPila = $controlPila-1;
						$pilaResult[$controlPila] = $pilaResult[$controlPila].$pilaResult[$controlPila+1];
						$i = -1;
					}else{
						$controlPila++;
						$posRegla++;
						$pilaResult[$controlPila] = $regla[$posRegla];
						$i = -1;
					}
				}
			}else{
				$i = 12;
				if($pilaResult[1]=="S"){
					echo "<h3 class='black-text'>Sintaxis Correcta ".$pilaResult[1]."</h3>";
				}else{
					echo "<h3 class='grey-text'>Sintaxis Incorrecta ".$pilaResult[1]."</h3>";
				}
			}
		}

	}

	analizar();
	?>
</body>
</html>