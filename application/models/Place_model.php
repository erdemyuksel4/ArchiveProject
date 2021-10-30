<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Place_model extends MY_Model{
    const TABLE = "gorevyerleri";
    public $id;
    public $yerAdi;
    public $bolgeId;
    public $aciklama;
    public $resimler;
    
    public function ReadDetailWithArea(){
        return $this->db->get_where("gorevyerleri",array("bolgeId"=>$this->bolgeId))->result_array();
    }
}