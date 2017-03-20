<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['komposisi_bpakan'] = $this->pengetahuan_model->getAllKomposisiBPakan();
  	// if($this->session->userdata('logged_in')!=null) {
			$this->load->view('user', $data);
		// } else {
		// 	echo ("<SCRIPT LANGUAGE='JavaScript'>
		// 	window.alert('Kamu tidak memiliki hak akses untuk mengakses halaman ini !')
		// 	window.location.href='".base_url()."';
		// 	</SCRIPT>");
		// }
	}

	public function hasil_optimasi() {
		$bb = $this->input->post('bb');
		$pbb = $this->input->post('pbb');
		// $pk[] = $this->input->post('pk');
		$pk1 = $this->input->post('pk1');
		$pk2 = $this->input->post('pk2');
		$pk3 = $this->input->post('pk3');
		$cr = $this->input->post('cr');
		$mr = $this->input->post('mr');
		$popSize = $this->input->post('popSize');
		$generasi = $this->input->post('generasi');

		$data['keb_nutrisi_sapi'] = $this->pengetahuan_model->getAllKebNutrisiSapi($bb, $pbb);
		$data['komposisi_bpakan'] = $this->pengetahuan_model->getAllKomposisiBPakanByParam($pk1, $pk2, $pk3);
		// $data['inisialisasi_kromosom'] = $this->pengetahuan_model->getAllInisialisasiKromosom();

		// $i=0;
		// foreach($data['inisialisasi_kromosom'] as $row){
		// 	$initKromosom[$i][0] = $row->kombinasi_satu;
		// 	$initKromosom[$i][1] = $row->kombinasi_dua;
		// 	$initKromosom[$i][2] = $row->kombinasi_tiga;
		//
		// 	$initKromosom[$i][0] = round(($initKromosom[$i][0] / ($initKromosom[$i][0] + $initKromosom[$i][1] + $initKromosom[$i][2])) * ($bb*0.1),1);
		// 	$initKromosom[$i][1] = round(($initKromosom[$i][1] / ($initKromosom[$i][0] + $initKromosom[$i][1] + $initKromosom[$i][2])) * ($bb*0.1),1);
		// 	$initKromosom[$i][2] = round(($initKromosom[$i][2] / ($initKromosom[$i][0] + $initKromosom[$i][1] + $initKromosom[$i][2])) * ($bb*0.1),1);
		//
		// 	$j=0;
		// 	// $hargaTot = 0;
		// 	$hargaTot[$i] = 0;
		// 	foreach ($data['komposisi_bpakan'] as $row) {
		// 		$harga[$i][$j] = $row->harga;
		//
		// 		$hargaTot[$i] += ($initKromosom[$i][$j] * $harga[$i][$j]);
		//
		// 		$j++;
		// 	}
		// 	$i++;
		// }

		$w = 0;

		for ($i=0; $i < $popSize ; $i++) {
			$initKromosom[$i][0] = mt_rand(3,7);
			$initKromosom[$i][1] = mt_rand(3,7);
			$initKromosom[$i][2] = mt_rand(3,7);

			$initKromosom[$i][0] = round(($initKromosom[$i][0] / ($initKromosom[$i][0] + $initKromosom[$i][1] + $initKromosom[$i][2])) * ($bb*0.1),1);
			$initKromosom[$i][1] = round(($initKromosom[$i][1] / ($initKromosom[$i][0] + $initKromosom[$i][1] + $initKromosom[$i][2])) * ($bb*0.1),1);
			$initKromosom[$i][2] = round(($initKromosom[$i][2] / ($initKromosom[$i][0] + $initKromosom[$i][1] + $initKromosom[$i][2])) * ($bb*0.1),1);

			$y=0;
			$hargaTot[$i] = 0;
			foreach ($data['komposisi_bpakan'] as $row) {
				$harga[$i][$y] = $row->harga;

				$hargaTot[$i] += ($initKromosom[$i][$y] * $harga[$i][$y]);

				$y++;
			}
		}

		$kromosom = [[]];
		$kromosomSorted = [[]];
		$offSpringC = [[]];
		$offSpringM = [[]];

		// $generasi = 11;


		$cr = ceil(($cr/10) * $popSize);
		if($cr%2 != 0) {
			$cr = $cr+1;
		}

		$mr = ceil(($mr/10) * $popSize);


		for ($cl=0; $cl < $generasi; $cl++) {
			if($cl < 1) {
				for ($ia=0; $ia < $popSize ; $ia++) {
					for ($ja=0; $ja < 3; $ja++) {
						$kromosom[$ia][$ja] = $initKromosom[$ia][$ja];
					}
				}
			} elseif($cl > 0) {
				for ($ib=0; $ib < $popSize ; $ib++) {
					for ($jb=0; $jb < 3; $jb++) {
						$kromosom[$ib][$jb] = $kromosomSorted[$ib][$jb];
						// echo $kromosom[$ib][$jb]." ";
					}
					// echo "</br>";
				}
			}




			// $minRan = -0.25;
			// $maxRan = 1.25;
			// for ($ic=0; $ic < 3 ; $ic++) {
			// 	$nilaiA[$ic] = $minRan + mt_rand() / mt_getrandmax() * ($maxRan - $minRan);
			// }

			$minRan = -0.25;
			$maxRan = 1.25;
			for ($ic=0; $ic < 3 ; $ic++) {
				$nilaiA[$ic] = $minRan + mt_rand() / mt_getrandmax() * ($maxRan - $minRan);
			}



			for ($wk=0; $wk < $popSize; $wk++) {
				$randNumber[] = $wk;
			}

			shuffle($randNumber);

			for ($id=0; $id < $cr ; $id++) {
				$choosedParentC[$id] = $randNumber[$id];
			}

			// shuffle($choosedParentC);


			// $cr = 2;
			$last = $cr-1;
			$ie = 0;
				while ($ie < $last) {
					$offSpringC[$ie][0] = round($kromosom[$choosedParentC[$ie]][0] + ($nilaiA[0] * ($kromosom[$choosedParentC[$last]][0] - $kromosom[$choosedParentC[$ie]][0] )),1);
					$offSpringC[$ie][1] = round($kromosom[$choosedParentC[$ie]][1] + ($nilaiA[1] * ($kromosom[$choosedParentC[$last]][1] - $kromosom[$choosedParentC[$ie]][1] )),1);
					$offSpringC[$ie][2] = round($kromosom[$choosedParentC[$ie]][2] + ($nilaiA[2] * ($kromosom[$choosedParentC[$last]][2] - $kromosom[$choosedParentC[$ie]][2] )),1);
					$offSpringC[$last][0] = round($kromosom[$choosedParentC[$last]][0] + ($nilaiA[0] * ($kromosom[$choosedParentC[$ie]][0] - $kromosom[$choosedParentC[$last]][0] )),1);
					$offSpringC[$last][1] = round($kromosom[$choosedParentC[$last]][1] + ($nilaiA[1] * ($kromosom[$choosedParentC[$ie]][1] - $kromosom[$choosedParentC[$last]][1] )),1);
					$offSpringC[$last][2] = round($kromosom[$choosedParentC[$last]][2] + ($nilaiA[2] * ($kromosom[$choosedParentC[$ie]][2] - $kromosom[$choosedParentC[$last]][2] )),1);
					$last--;
					$ie++;
				}

				for ($aa=0; $aa < $cr; $aa++) {
					$offSpringC[$aa][0] = round(($offSpringC[$aa][0] / ($offSpringC[$aa][0] + $offSpringC[$aa][1] + $offSpringC[$aa][2])) * ($bb*0.1),1);
					$offSpringC[$aa][1] = round(($offSpringC[$aa][1] / ($offSpringC[$aa][0] + $offSpringC[$aa][1] + $offSpringC[$aa][2])) * ($bb*0.1),1);
					$offSpringC[$aa][2] = round(($offSpringC[$aa][2] / ($offSpringC[$aa][0] + $offSpringC[$aa][1] + $offSpringC[$aa][2])) * ($bb*0.1),1);
				}




			for ($if=0; $if < $mr ; $if++) {
				$choosedParentM[$if] = mt_rand(0,$popSize-1);
			}

			$minRandom = 0.1;
			$maxRandom = 1;
			$nilaiR = $minRandom + mt_rand() / mt_getrandmax() * ($maxRandom - $minRandom);

			$choosedGen = rand(0,2);

			$nilaiMax = 7;
			$nilaiMin = 3;

				for ($ig=0; $ig < $mr ; $ig++) {
					if($choosedGen==0) {
						$offSpringM[$ig][$choosedGen] = round($kromosom[$choosedParentM[$ig]][$choosedGen] + ($nilaiR * ($nilaiMax - $nilaiMin) ),1);
						$offSpringM[$ig][1] = $kromosom[$choosedParentM[$ig]][1];
						$offSpringM[$ig][2] = $kromosom[$choosedParentM[$ig]][2];
					} elseif($choosedGen==1) {
						$offSpringM[$ig][0] = $kromosom[$choosedParentM[$ig]][0];
						$offSpringM[$ig][$choosedGen] = round($kromosom[$choosedParentM[$ig]][$choosedGen] + ($nilaiR * ($nilaiMax - $nilaiMin) ),1);
						$offSpringM[$ig][2] = $kromosom[$choosedParentM[$ig]][2];
					} elseif($choosedGen==2) {
						$offSpringM[$ig][0] = $kromosom[$choosedParentM[$ig]][0];
						$offSpringM[$ig][1] = $kromosom[$choosedParentM[$ig]][1];
						$offSpringM[$ig][$choosedGen] = round($kromosom[$choosedParentM[$ig]][$choosedGen] + ($nilaiR * ($nilaiMax - $nilaiMin) ),1);
					}
				}

				for ($aaa=0; $aaa < $mr; $aaa++) {
					$offSpringM[$aaa][0] = round(($offSpringM[$aaa][0] / ($offSpringM[$aaa][0] + $offSpringM[$aaa][1] + $offSpringM[$aaa][2])) * ($bb*0.1),1);
					$offSpringM[$aaa][1] = round(($offSpringM[$aaa][1] / ($offSpringM[$aaa][0] + $offSpringM[$aaa][1] + $offSpringM[$aaa][2])) * ($bb*0.1),1);
					$offSpringM[$aaa][2] = round(($offSpringM[$aaa][2] / ($offSpringM[$aaa][0] + $offSpringM[$aaa][1] + $offSpringM[$aaa][2])) * ($bb*0.1),1);
				}





			$d = 0;
			$e = 0;

			$kromosomBaruLength = count($kromosom)+count($offSpringC)+count($offSpringM);

			$kromosomBaru = [[]];
			for($ih=0;$ih<$kromosomBaruLength;$ih++) {
				if($ih >= count($kromosom) && $ih < (count($kromosom) + count($offSpringC)) ) {
						$kromosomBaru[$ih][0] = $offSpringC[$d][0];
						$kromosomBaru[$ih][1] = $offSpringC[$d][1];
						$kromosomBaru[$ih][2] = $offSpringC[$d][2];
						$d++;
				} elseif($ih > count($kromosom) &&  $ih >= (count($kromosom) + count($offSpringC)) ) {
					$kromosomBaru[$ih][0] = $offSpringM[$e][0];
					$kromosomBaru[$ih][1] = $offSpringM[$e][1];
					$kromosomBaru[$ih][2] = $offSpringM[$e][2];
					$e++;
				} elseif($ih < count($kromosom)) {
					$kromosomBaru[$ih][0] = $kromosom[$ih][0];
					$kromosomBaru[$ih][1] = $kromosom[$ih][1];
					$kromosomBaru[$ih][2] = $kromosom[$ih][2];
				}

				$f=0;
				// $hargaTot = 0;
				$hargaTotBaru[$ih] = 0;
				foreach ($data['komposisi_bpakan'] as $row) {
					$hargaBaru[$ih][$f] = $row->harga;

					$hargaTotBaru[$ih] += ($kromosomBaru[$ih][$f] * $hargaBaru[$ih][$f]);

					$f++;
				}
			}

			for ($ii=0 ; $ii < $kromosomBaruLength ; $ii++ ) {

				$g=0;

				$beratKeringTot[$ii] = 0;
				$proteinKeringTot[$ii] = 0;
				$totDigestibleNutTot[$ii] = 0;
				$calsiumTot[$ii] = 0;
				$fosforTot[$ii] = 0;
				foreach ($data['komposisi_bpakan'] as $row) {
					$beratKering[$ii][$g] = $row->berat_kering;
					$proteinKering[$ii][$g] = $row->protein_kering;
					$totDigestibleNut[$ii][$g] = $row->tot_digestible_nut;
					$calsium[$ii][$g] = $row->calsium;
					$fosfor[$ii][$g] = $row->fosfor;

					$beratKeringTot[$ii] += $beratKering[$ii][$g];
					$proteinKeringTot[$ii] += $proteinKering[$ii][$g];
					$totDigestibleNutTot[$ii] += $totDigestibleNut[$ii][$g];
					$calsiumTot[$ii] += $calsium[$ii][$g];
					$fosforTot[$ii] += $fosfor[$ii][$g];
					$g++;
				}

				foreach ($data['keb_nutrisi_sapi'] as $row) {
					$beratKeringSapi = $row->bk;
					$proteinKeringSapi = $row->pk;
					$tdnSapi = $row->tdn;
					$caSapi = $row->ca;
					$pSapi = $row->p;
				}

				$penalty[$ii] = 0;

				if(($beratKeringTot[$ii]-$beratKeringSapi) < 0 ) {
					$penalty[$ii] += abs($beratKeringTot[$ii]-$beratKeringSapi);
				} if(($proteinKeringTot[$ii]-$proteinKeringSapi) < 0) {
					$penalty[$ii] += abs($proteinKeringTot[$ii]-$proteinKeringSapi);
				} if(($totDigestibleNutTot[$ii]-$tdnSapi) < 0) {
					$penalty[$ii] += abs($totDigestibleNutTot[$ii]-$tdnSapi);
				} if(($calsiumTot[$ii]-$caSapi) < 0) {
					$penalty[$ii] += abs($calsiumTot[$ii]-$caSapi);
				} if(($fosforTot[$ii]-$pSapi) < 0) {
					$penalty[$ii] += abs($fosforTot[$ii]-$pSapi);
				}

				$constanta = 10000;

				$fitness[$ii] = $constanta / ($hargaTotBaru[$ii] + ($penalty[$ii] * $constanta));
			}

			for ($ij=0; $ij < count($kromosomBaru); $ij++) {
				$kromosomSorted[$ij][0] = $kromosomBaru[$ij][0];
				$kromosomSorted[$ij][1] = $kromosomBaru[$ij][1];
				$kromosomSorted[$ij][2] = $kromosomBaru[$ij][2];
				$kromosomSorted[$ij][3] = $hargaTotBaru[$ij];
				$kromosomSorted[$ij][4] = $fitness[$ij];
			}

			for ($ik=0; $ik < count($kromosomSorted) ; ++$ik) {
				for ($ka=0; $ka <= 4 ; $ka++) {
					$max[$ka] = null;
				}
				$maxKey = null;
				for ($la=$ik; $la < count($kromosomSorted); ++$la) {
					if (null == $max[4] || $kromosomSorted[$la][4] > $max[4]) {
						$maxKey = $la;
						$max[4] = $kromosomSorted[$la][4];
						$max[0] = $kromosomSorted[$la][0];
						$max[1] = $kromosomSorted[$la][1];
						$max[2] = $kromosomSorted[$la][2];
						$max[3] = $kromosomSorted[$la][3];
					}
				}
				$kromosomSorted[$maxKey][4] = $kromosomSorted[$ik][4];
				$kromosomSorted[$maxKey][0] = $kromosomSorted[$ik][0];
				$kromosomSorted[$maxKey][1] = $kromosomSorted[$ik][1];
				$kromosomSorted[$maxKey][2] = $kromosomSorted[$ik][2];
				$kromosomSorted[$maxKey][3] = $kromosomSorted[$ik][3];
				$kromosomSorted[$ik][4] = $max[4];
				$kromosomSorted[$ik][0] = $max[0];
				$kromosomSorted[$ik][1] = $max[1];
				$kromosomSorted[$ik][2] = $max[2];
				$kromosomSorted[$ik][3] = $max[3];
			}

			//bubble sort
			// $count = count($kromosomSorted);
	    // for ($j = 1; $j < $count; $j++) {
	    //     for ($i=1; $i < $count-$j+1; $i++) {
	    //         if ($kromosomSorted[$i-1][4] < $kromosomSorted[$i][4]) {
			// 					$temp[4] = $kromosomSorted[$i][4];
			// 					$temp[0] = $kromosomSorted[$i][0];
			// 					$temp[1] = $kromosomSorted[$i][1];
			// 					$temp[2] = $kromosomSorted[$i][2];
			// 					$temp[3] = $kromosomSorted[$i][3];
			// 			    $kromosomSorted[$i][4] = $kromosomSorted[$i-1][4];
			// 					$kromosomSorted[$i][0] = $kromosomSorted[$i-1][0];
			// 					$kromosomSorted[$i][1] = $kromosomSorted[$i-1][1];
			// 					$kromosomSorted[$i][2] = $kromosomSorted[$i-1][2];
			// 					$kromosomSorted[$i][3] = $kromosomSorted[$i-1][3];
			// 			    $kromosomSorted[$i-1][4] = $temp[4];
			// 					$kromosomSorted[$i-1][0] = $temp[0];
			// 					$kromosomSorted[$i-1][1] = $temp[1];
			// 					$kromosomSorted[$i-1][2] = $temp[2];
			// 					$kromosomSorted[$i-1][3] = $temp[3];
	    //         }
	    //     }
	    // }

			//insertion sort
			// $count = count($kromosomSorted);
      //   for ($i=1;$i<$count;$i++) {
      //       $element[4]=$kromosomSorted[$i][4];
			// 			$element[0]=$kromosomSorted[$i][0];
			// 			$element[1]=$kromosomSorted[$i][1];
			// 			$element[2]=$kromosomSorted[$i][2];
			// 			$element[3]=$kromosomSorted[$i][3];
      //       $j=$i;
      //       while($j>0 && $kromosomSorted[$j-1][4] < $element[4]) {
      //           //move value to right and key to previous smaller index
      //           $kromosomSorted[$j][4]=$kromosomSorted[$j-1][4];
			// 					$kromosomSorted[$j][0]=$kromosomSorted[$j-1][0];
			// 					$kromosomSorted[$j][1]=$kromosomSorted[$j-1][1];
			// 					$kromosomSorted[$j][2]=$kromosomSorted[$j-1][2];
			// 					$kromosomSorted[$j][3]=$kromosomSorted[$j-1][3];
      //           $j=$j-1;
      //       }
      //       //put the element at index $j
      //       $kromosomSorted[$j][4]=$element[4];
			// 			$kromosomSorted[$j][0]=$element[0];
			// 			$kromosomSorted[$j][1]=$element[1];
			// 			$kromosomSorted[$j][2]=$element[2];
			// 			$kromosomSorted[$j][3]=$element[3];
      //   }

			for ($o=0; $o < $popSize; $o++) {
				$kromosomSorted2[$o][0] = round(($kromosomSorted[$o][0] / ($kromosomSorted[$o][0] + $kromosomSorted[$o][1] + $kromosomSorted[$o][2])) * ($bb*0.1),1);
				$kromosomSorted2[$o][1] = round(($kromosomSorted[$o][1] / ($kromosomSorted[$o][0] + $kromosomSorted[$o][1] + $kromosomSorted[$o][2])) * ($bb*0.1),1);
				$kromosomSorted2[$o][2] = round(($kromosomSorted[$o][2] / ($kromosomSorted[$o][0] + $kromosomSorted[$o][1] + $kromosomSorted[$o][2])) * ($bb*0.1),1);

			}

		}



		$this->load->view('hasil-optimasi', array('keb_nutrisi_sapi' => $data['keb_nutrisi_sapi'],
																							'komposisi_bpakan' => $data['komposisi_bpakan'],
																							'kromosom' => $initKromosom,
																							'harga_tot' => $hargaTot,
																							'nilai_a' => $nilaiA,
																							'nilai_r' => $nilaiR,
																							'choosed_parent_c' => $choosedParentC,
																							'choosed_parent_m' => $choosedParentM,
																							'choosed_gen' => $choosedGen,
																							'kromosom_baru' => $kromosomBaru,
																							'harga_tot_baru' => $hargaTotBaru,
																							'offSpringC' => $offSpringC,
																							'offSpringM' => $offSpringM,
																							'fitness' => $fitness,
																							'kromosom_sorted' => $kromosomSorted,
																							'pop_size' => $popSize,
																							'generasi' => $generasi,
																							'nilai_max' => $nilaiMax,
																							'nilai_min' => $nilaiMin));
	}


}
