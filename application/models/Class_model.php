<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Class_model extends MY_Model {
    public const TABLE = "sinif";
    public $id;
    public $ogrenciId;
    public $okulId;
    public $sinifAdi;
    public $donemId;
    public function __construct(){
        parent::__construct();
    }
    public function IssetClass($filtre){
        return isset($this->ReadDetail($filtre)[0])?$this->ReadDetail($filtre)[0]:null;
    }
    public function ClassControl($filtre){
        $sinif = $this->IssetClass($filtre);
        if($sinif!=null && null !=$sinif["id"]){
            return $sinif["id"];
        }else {
            return $this->Create($filtre);
        }
    }
}