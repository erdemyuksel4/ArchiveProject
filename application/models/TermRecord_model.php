<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermRecord_model extends MY_Model{
    public const TABLE ="ogrencidonemleri";
    public $id;
    public $ogrenciId;
    public $donem;
}