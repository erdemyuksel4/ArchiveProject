<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{
    public $page = "Users";
    public function __construct(){
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Teacher_model");
        $this->load->model("Permission_model");
    }
    public function Users(){
        $data["users"] = $this->User_model->Read();
        foreach ($data["users"] as $key=>$user){
            $data["users"][$key]["yetkiAdi"] = $this->Permission_model->ReadDetailSingle(["id"=>$user["yetkiId"]])["yetkiAdi"];
        }
        $this->load->view("Pages/Main/kullanicilar.php",$data);
    }
    public function UserAdd(){
        $data["footerButtonText"] = "Kaydet";
        $data["location"] = "Users/Add";
        $data["perms"] = $this->Permission_model->Read();
        $this->load->view("Pages/Add/kullaniciEkle.php",$data);
    }
    public function UserEdit(){
        if(isset($this->param[0])){
            $data = $this->User_model->ReadDetailSingle(["id"=>$this->param[0]]);
            $data["footerButtonText"] = "Kaydet";
            $data["location"] = "Users/Edit";
            switch ($data["yetkiId"]) {
                case 6:
                    $t = $this->Teacher_model->FindTeacher(["kullaniciId"=>$data["id"]]);
                    $data["locationA"] = "Teachers/TeacherEdit/".$t["id"];
                    $data["locationAText"] = "Öğretmen Düzenle";
                    break;
                
                case 8:
                    $t = $this->Teacher_model->FindTeacher(["kullaniciId"=>$data["id"]]);
                    $data["locationA"] = "Teachers/TeacherEdit/".$t["id"];
                    $data["locationAText"] = "Öğretmen Düzenle";
                    break;
                
            }
            $data["perms"] = $this->Permission_model->Read();
            $this->load->view("Pages/Edit/kullaniciDuzenle.php",$data);
        }
    }
    public function UserDelete(){
        $data = [
            "footerButtonText"=>"Sil",
            "location"=>"Users/Delete",
            "param"=>$this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    public function UserDetail(){
        $this->load->view("Pages/Detail/kullaniciDetaylari.php");
    }
    protected function Add(){
        $this->User_model->Create(ExtractParameter($this->param,["sifre","telefon","email","adSoyad","yetkiId","kullaniciAdi"],true));
    }
    protected function Edit(){
        if($this->param["id"]){
            $list = ["telefon","email","adSoyad","yetkiId","kullaniciAdi"];
            strlen(trim($this->param["sifre"]))>0?$list[]="sifre":null;
            $this->User_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,$list,true));
        }
    }
    protected function Delete(){
        if(isset($this->param["id"])){
            $b = $this->Teacher_model->ReadDetail(["kullaniciId"=>$this->param["id"]]);
            if(isset($b[0])){
                $b = $this->Teacher_model->Delete(["id"=>$b[0]["id"]]);
            }
            $this->User_model->Delete(["id"=>$this->param["id"]]);
        }
    }
    protected function UserPass(){
        $id = @$this->param[0];
        if(isset($id)){
            redirect(base_url("Account/PassControl/$id"));
        }
    }
}
