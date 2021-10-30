<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends MY_Model{
    const TABLE = "ogrenciler";
    public $id;
    public $okulId;
    public $adSoyad;
    public $cinsiyet;
    public $dogumTarihi;
    public $dogumYeri;
    public $sinif;
    public $ttkdKatilimFormu;
    public $ebaId;
    public $devamDurumu;
    public $Mezun;
    public $katilimBelgesiNo;
    										
    public function FindClass($okulId){
        return $this->db->query("SELECT DISTINCT sinif FROM ogrenciler WHERE okulId=".$okulId)->result_array();
    }
}