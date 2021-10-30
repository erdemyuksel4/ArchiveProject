<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SC_model extends MY_Model{
    const TABLE ="belirligunler";
    public $id;
    public $ad;
    public $baslangic;
    public $bitis;
    public function __construct(){
        parent::__construct();
    }
}