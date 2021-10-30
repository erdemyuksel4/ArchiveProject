<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TGOK_model extends MY_Model{
    const TABLE = "turkiyedegorevlioldugukurum";
    public $id;
    public $ogretmenId;
    public $telefon;
    public $email;
    public $website;
    public $adres;

}