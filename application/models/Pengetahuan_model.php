<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengetahuan_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function lihatData()
		{
			$sql = $this->db->query("select * from training");
            return $sql;
		}

    function getAllKomposisiBPakan() {
      // $query = $this->db->get_where('keb_nutrisi_sapi', array('uuid_bpakan' => $pk1, 'uuid_bpakan' => $pk2, 'uuid_bpakan' => $pk3));
      $query = $this->db->query("select * from komposisi_bpakan");
      return $query->result();
    }

    function getAllKomposisiBPakanByParam($pk1, $pk2, $pk3) {
      $params = array($pk1, $pk2, $pk3);
      // $this->db->select('komposisi_bpakan');
      $query = $this->db->query("select * from komposisi_bpakan where uuid_bpakan in ('$pk1', '$pk2', '$pk3')");
      // $query = $this->db->query("select * from komposisi_bpakan");
      return $query->result();
    }

    function getAllKebNutrisiSapi($bb, $pbb) {
      // $bbTemp = $bb;
      if($bb >=100 && $bb <200) {
        $bbTemp = 1;
      }
      elseif($bb >=200 && $bb <250) {
        $bbTemp = 2;
      }
      elseif($bb >=250 && $bb <300) {
        $bbTemp = 3;
      }
      elseif($bb >=300 && $bb <350) {
        $bbTemp = 4;
      }
      $query = $this->db->get_where('keb_nutrisi_sapi', array('berat_badan' => $bbTemp, 'pbbh' => $pbb));
      return $query->result();
    }

    function getAllInisialisasiKromosom() {
      $query = $this->db->query("select * from inisialisasi_kromosom");

      return $query->result();
    }

}
