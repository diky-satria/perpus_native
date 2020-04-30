<?php 

	function kode_random($length){

		$data = "12345";
		$string = "UNU-";

		for ($i=0; $i < $length ; $i++) { 
			$pos = rand(0, strlen($data) -1);
			$string .= $data{$pos};
		}

		return $string;
	}
		
	$kodes = kode_random(5);

 ?>