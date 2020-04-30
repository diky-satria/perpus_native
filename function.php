<?php 

	function terlambat($tgl_kembali, $tgl_dateline){

		$selisih = strtotime($tgl_dateline) - strtotime($tgl_kembali);

		$selisih = $selisih/86400;

		if($selisih>=1){
			$hasil = floor($selisih);
		}else{
			$hasil = 0;
		}

		return $hasil;

	}

 ?>