<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Education_model extends MY_Model{
    const TABLE ="egitimdurumu";
    public $id;
    public $ogretmenId;
    public $duzey;
    public $kurumAdi;
    public $tezAdi;

    public function __construct(){
        parent::__construct();
    }
}