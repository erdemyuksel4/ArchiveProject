<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledge_model extends MY_Model{
    public const TABLE ="bilgibeceriler";
    public $id;
    public $ogretmenId;
    public $bilgiBeceri;
    public $seviye;
    public $aciklama;
}