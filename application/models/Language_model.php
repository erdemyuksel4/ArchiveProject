<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Language_model extends MY_Model{
    const TABLE ="yabancidilbilgisi";
    public $id;
    public $ogretmenId;
    public $dil;
    public $seviye;
    public function __construct(){
        parent::__construct();
    }
}