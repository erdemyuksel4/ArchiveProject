<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission_model extends MY_Model{
    const TABLE ="yetkiler";
    public function __construct(){
        parent::__construct();
    }
}