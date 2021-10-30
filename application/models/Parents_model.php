<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents_model extends MY_Model{
    const TABLE ="ebeveynbilgileri";
    public $id;
    public $ogrenciId;
    public $meslek;
    public $dogumYeri;
    public $ebeveyn;
}