<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_model extends MY_Model{
    const TABLE = "ogretmenler";
    public $id;
    public $bolgeId;
    public $yerId;
    public $okulId;
    public $adSoyad;
    public $tckn;
    public $website;
    public $email;
    public $dogumTarihi;
    public $dogumYeri;
    public $telefon;
    public $yurtDisiGorevBaslangic;
    public $gorevde;
    public $yolluk;
    public $genelBilgi;
    public $gorevYaptigiOkullar;
    public $almanyaIkametgah;
    public $turkiyeIkametgah;
    public $olusturulmaTarihi;
    public $turkiyeEhliyeti;
    public $almanyaEhliyeti;
    public $kullaniciId;
    public $siniflar;
    public function __construct(){
        parent::__construct();
    }
    public function FindTeacher(Array $filter = null){
        if(!isset($filter)){
            return $this->ReadDetailSingle(["kullaniciId"=>$this->session->userdata("Account")["data"]["id"]]);
        }else{
            return $this->ReadDetailSingle($filter);
        }
    }
    public function FindSchoolsOfTeacher(Array $filter = null){
        $t = $this->FindTeacher($filter);
        return array_merge([$t["okulId"]],explode(";",$t["gorevYaptigiOkullar"]));
    }
    public function FindAreaWithTeacher(Array $filter = null){
        $t = $this->FindTeacher();
        return $t["bolgeId"];
    }
}