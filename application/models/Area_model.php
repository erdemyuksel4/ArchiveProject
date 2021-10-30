<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends MY_Model{
    public const TABLE = "gorevbolgeleri";
    public $id;
    public $bolgeAdi;
    public $resimler;
    public $genelBilgi;
    public $ogrenciProfili;
}