<?php
			// Vars
			$diameter = 2;
			$depth = 1.83;
			$pi = pi();
			$n = 60;
			$m = 2.26;
				// Calc allg.
				$r = $diameter / 2;
				$g = $pi * pow($r, 2);
			$corr = 60;
			

	  $json = file_get_contents("[IP OF PTLEVEL]/config?json=true");
	  if ($json === false) {
		   echo "FEHLER - Die PtDevices-API konnte nicht abgefragt werden!";
		   return;
		}	
		$a = explode(",",$json);
		$b = explode(",",$a[15]);
		$c = explode(":",$b[0]);

			$correctionC = $c[2]+$corr;
			$percentLevel = ($correctionC-$n)/$m;
			$percentLevel_calc = round($percentLevel,2);
			$cmLevel_calc = round((($depth/100)* $percentLevel)*100,2);
		
			$volumeLevel_calc = round(($g * $cmLevel_calc)*10,2);
		
		$array["percent"] = $percentLevel_calc;
		$array["cm"] = $cmLevel_calc ;
		$array["vol"] = $volumeLevel_calc;
		$d = explode(",",$a[17]);
		$e = explode(":",$d[0]);
		
			$strings_alt = array("}");
			$strings_new = array("");
		$value = str_replace ( $strings_alt, $strings_new, $e[1]);
		
		$array["battery"] = $value;
		$array2["zisterne"] = $array;
		//$zis = implode("#", $array);

		echo json_encode($array2); 	?>