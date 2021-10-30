<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Teacher_model");
    }
    public function Verify(){
        $id = $this->param[0];
        $s = $this->User_model->ReadDetailSingle(["id"=>$id]);
        $data = [
            "adSoyad"=> $s["adSoyad"],
            "email" => $s["email"],
            "telefon" =>$s["telefon"],
            "kullaniciId"=>$s["id"]
        ];
        if($s["yetkiId"]==6){
            $this->Teacher_model->Create($data);
            $this->User_model->Update(["id"=>$id],["onay"=>1]);
        }else if($s["yetkiId"]==8){
            $this->Teacher_model->Create($data);
            $this->User_model->Update(["id"=>$id],["onay"=>1]);
        }else if($s["yetkiId"]==1){
            $this->User_model->Update(["id"=>$id],["onay"=>1]);
        }else if($s["yetkiId"]==7){
            $this->Teacher_model->Create($data);
            $this->User_model->Update(["id"=>$id],["onay"=>1]);
        }else if($s["yetkiId"]==9){
            $this->Teacher_model->Create($data);
            $this->User_model->Update(["id"=>$id],["onay"=>1]);
        }
    }
}