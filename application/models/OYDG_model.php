<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OYDG_model extends MY_Model{
    const TABLE = "oncekiyurtdisigorevbilgisi";
    public $id;
    public $ogretmenId;
    public $yil;
    public $ulke;
}