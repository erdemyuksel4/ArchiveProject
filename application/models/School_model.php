<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends MY_Model{
    const TABLE = "okullar";
    public $id;
    public $bolgeId;
    public $yerId;
    public $ad;
    public $tur;
    public $genelBilgi;
    public $resimler;
    public $adres;
    public $telefon;
    public $email;
    public $website;
    public $okulMuduru;
    public $okulSekreteri;
    public $okulVeliTemsilcisi;
    public $okulVeliTemsilcisiTelefon;
    public $okulVeliTemsilcisiEmail;

    public function ReadSchoolTypes(){
        return $this->db->get("okulturleri")->result_array();
    }
    public function FindSchoolType(){
        return $this->db->get_where("okulturleri",array("id"=>$this->tur))->result_array();
    }
    public function ReadDetailWithArea(){
        return $this->db->get_where("okullar",array("bolgeId"=>$this->bolgeId))->result_array();
    }
    public function ReadDetailWithPlace(){
        return $this->db->get_where("okullar",array("yerId"=>$this->yerId))->result_array();
    }
}
