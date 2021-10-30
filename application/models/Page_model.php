<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_model extends MY_Model{
    const TABLE = "yasaksayfalar";
    public $id;
    public $sayfaAdi;
    public $sayfaYol;
    public $yetkiId;    				
    public $altSayfalar;    				
}