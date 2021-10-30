<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends MY_Model{
    const TABLE ="projedeneyimi";
    public $id;
    public $ogretmenId;
    public $ad;
    public $sure;
    public $butce;
    public $aciklama;
    public $resimler;
    public function __construct(){
        parent::__construct();
    }
}