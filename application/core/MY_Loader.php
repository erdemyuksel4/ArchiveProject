<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader {
    public function __construct(){
        parent::__construct();
        $CI =&get_instance();
        $CI->load = $this;
    }
    public function getModelList() {
        return $this->_ci_models;
    }
}