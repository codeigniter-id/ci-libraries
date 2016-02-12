<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lama_waktu{
	
	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2016-02-12 14:08:24
		* @Source 				: http://saungkode.com/tutorial/read/membuat-beberapa-waktu-yang-lalu-menggunakan-php
 	**/

	public function konversiwaktuLalu($waktuPosting=null){
		// Jika parameter $waktuPosting kosong
		// $waktuPosting menggunakan waktu sekarang.
		if(empty($waktuPosting)){
			$waktuPosting = date("Y-m-d h:i:s");
		}
		//  waktuLalu adalah waktu estimasi kira-kira berapa lama jeda antara hari ini dengan waktu posting
		//  waktuLalu = tanggal sekarang - waktu posting 
		$waktuLalu = time() - strtotime($waktuPosting);

		//  jika waktuLalu kurang dari 1 detik, maka munculkan pesan 'beberapa saat yang lalu'
		if($waktuLalu < 1 ){
			return 'beberapa saat yang lalu.';
		}

		//  kondisi dimana tahun, bulan, hari, jam, menit, dan detik dalam satuan detik 
		//  dimasukkan ke dalam sebuah array untuk pembanding
		$condition = array( 
			31104000    =>  'tahun',
			2592000     =>  'bulan',
			86400       =>  'hari',
			3600        =>  'jam',
			60          =>  'menit',
			1           =>  'detik'
		);

		//  melakukan perulangan untuk mengecek kondisi mana yang paling sesuai dengan waktuLalu
		foreach($condition as $secs => $str){
			//  $d adalah nilai satuan yg digunakan seperti '1 tahun' atau '2 jam'
			//  $d didapat dari waktuLalu dibagi dengan kondisi
			$d = $waktuLalu / $secs;

			// jika $d lebih dari atau sama dengan 1 maka cetak hasil kondisi dan sudahi perulangan
			if($d >= 1){
				//  waktu di bulatkan
				$r = round($d);
				return $r.' '.$str.' yang lalu.';
			}
		}
	}
}