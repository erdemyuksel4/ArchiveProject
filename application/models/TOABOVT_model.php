<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TOABOVT_model extends MY_Model{
    const TABLE="toabovtgorevlileri";
    public $id;
    public $okulId;
    public $adSoyad;
    public $meslek;
    public $gorev;
    public $telefon;
    public $adres;
    public $email;

    public function ReadDetailWithSchool(){
        $arr = $this->db->get_where("toabovtgorevlileri",array("okulId"=>$this->okulId))->result_array();
        return $this->ControlEmpty($arr);
    }

}