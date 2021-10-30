<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaccine_model extends MY_Model{
    const TABLE ="asidurumu";
    public $id;
    public $ogretmenId;
    public $asiAdi;
    public function __construct(){
        parent::__construct();
    }
}