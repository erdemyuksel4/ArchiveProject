<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TOAB extends MY_Controller
{
    public $page = "TOAB";
    public function __construct(){
        parent::__construct();
        $this->load->model("TOAB_model");
    }
}
