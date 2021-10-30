<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_model extends MY_Model{
    const TABLE ="ogrencidersprogrami";
    public $id;
    public $sinif;
    public $dersZamani;
    public $saat;
    public $platform;
}