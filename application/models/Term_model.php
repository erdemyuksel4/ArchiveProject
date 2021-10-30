<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Term_model extends MY_Model{
    public const TABLE ="ogretimdonemi";
    public $id;
    public $baslangicYil;
    public $bitisYil;
    public $aktifDonem;
    public function FindActiveTerm(){
        return $this->ReadDetailSingle(["aktifDonem"=>1]);
    }
    public function GetTermYear($id){
        $term = $this->ReadDetailSingle(["id"=>$id]);
        return $term["baslangicYil"]."-".$term["bitisYil"];
    }
}