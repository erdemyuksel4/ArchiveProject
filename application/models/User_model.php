<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {
    const TABLE= "kullanicilar";
    public $yetkiId;
    public $adSoyad;
    public $kullaniciAdi;
    public $email;
    public $telefon;
    public $sifre;
    public function __construct(){
        parent::__construct();
    }
}