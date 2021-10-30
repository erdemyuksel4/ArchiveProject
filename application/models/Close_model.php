<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Close_model extends MY_Model{
    const TABLE ="yakinbilgisi";
    public $id;
    public $ogretmenId;
    public $adSoyad;
    public $derece;
    public $email;
    public $tckn;
    public $dogumTarihi;
    public $dogumYeri;
    public $asi;
    public $telefon;
    public function __construct(){
        parent::__construct();
    }
}