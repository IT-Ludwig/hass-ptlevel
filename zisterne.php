<?php

	  $json = file_get_contents("http://[IP OF PTLEVEL]/config?json=true");
	  if ($json === false) {
		   echo "FEHLER - Die PtDevices-API konnte nicht abgefragt werden!";
		   return;
		}
		
		//$zisterne = json_decode($json);
		
		$a = explode(",",$json);
		$b = explode(",",$a[15]);
		$c = explode(":",$b[0]);
		
		$array[] = $c[2];
		$d = explode(",",$a[17]);
		$e = explode(":",$d[0]);
		
			$strings_alt = array("}");
			$strings_new = array("");
		$value = str_replace ( $strings_alt, $strings_new, $e[1]);
		
		$array[] = $value;
		
		$zis = implode("#", $array);

		print_r($zis);
		
		?>