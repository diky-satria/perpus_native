<?php 

	function kode_random($length){

		$data = "1234567890";
		$string = "UNUSIA-";

		for ($i=0; $i < $length ; $i++) { 
			$pos = rand(0, strlen($data) -1);
			$string .= $data{$pos};
		}

		return $string;
	}
		
	$kodes = kode_random(10);

 ?>