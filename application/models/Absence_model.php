<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absence_model extends MY_Model{
    public const TABLE = "devamsizlik";
    public $id;
    public $ogrenciId;
    public $tarih;
    public $durum;
}