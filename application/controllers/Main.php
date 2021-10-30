<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller
{
    public $page = "Main";
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Project_model');
        $this->load->model('Teacher_model');
        $this->load->model('Image_model');
    }
    public function Main(){
        $data=[];
        $k  =$this->session->userdata('Account');
        if($k["data"]["yetkiId"]==6){
            $urls = [
                "Profil"=>"Main/Profil",
                "Okul"=>"Schools",
                "Öğrenciler"=>"Students",
                "TOAB"=>"",
                "Sınıflar"=>"",
            ];
            $data["urls"]  =$this->PagePermControlList($urls);
            $this->load->view('Pages/Main/main.php',$data);
        }
    }
    public function Profil(){
        $k  =$this->session->userdata('Account');
        if($k["data"]["yetkiId"]==6){
            $t =$this->Teacher_model->ReadDetailSingle(["email"=>$k["data"]["email"]]);
            $data = [
                "kullanici"=>$k["data"],
                "meslek"=>"Öğretmen",
                "t"=>$t,
                "resim"=>$this->Image_model->ImageChangeFormat($k["data"]["resim"]),
                "p"=>$this->Project_model->ReadDetail(["ogretmenId"=>$t["id"]])
            ];
            $this->load->view('Pages/Main/profil.php',$data);
        }
    }
    public function PicAdd(){
        print_r($this->param);
        print_r($_FILES);
        /* $k  =$this->session->userdata('Account');
        if($k["data"]["yetkiId"]==6){
            $data = [
                "resim"=>$this->Image_model->ImageChangeFormat($k["data"]["resim"]),
            ];
        }
        $this->load->view('Pages/Add/profilresimEkle.php',$data); */
    }
    public function ProfilEdit(){
        $this->load->view('Pages/Edit/profilDuzenle.php');
    }
}
