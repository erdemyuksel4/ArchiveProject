<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curriculum_model extends MY_Model{
    const TABLE = "ogretimprogrami";
    public $id;
    public $sinifId;
    public $konu;
    public $donemId;
    public $hafta;
    public function __construct(){
        parent::__construct();
    }
}
