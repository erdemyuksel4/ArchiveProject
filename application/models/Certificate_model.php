<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_model extends MY_Model{
    const TABLE ="sertifikavebelgebilgisi";
    public $id;
    public $ogretmenId;
    public $no;
    public $ad;
    public $tarih;
    public $kurum;
    public $sure;
    public $aciklama;
    public $resimler;
    public function __construct(){
        parent::__construct();
    }
}