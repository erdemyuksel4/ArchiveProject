<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TOAB_model extends MY_Model{
    const TABLE = "toabbilgileri";
    public $id;
    public $okulId;
    public $kendiYeri;
    public $telefon;
    public $adres;
    public $binaOzellikleri;

    public function ReadDetailWithSchool($okulId){
        return $this->db->get_where("toabbilgileri",array("okulId"=>$okulId))->result_array();
    }
}