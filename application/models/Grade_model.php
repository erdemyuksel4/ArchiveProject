<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade_model extends MY_Model{
    public const TABLE ="notbilgisi";
    public $id;
    public $ogrenciId;
    public $donemId;
    public $donem;
    public $dersAdi;
    public $ogrenciNot;
}
