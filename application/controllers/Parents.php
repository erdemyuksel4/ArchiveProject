<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends MY_Controller
{
    public $page = "Parent";
    public function __construct(){
        parent::__construct();
        $this->load->model("Parents_model");
        $this->load->model("Student_model");
    }
    public function Parent(){
        $urls = [
            "Add"=>"Parents/ParentAdd",
            "Edit"=>"Parents/ParentEdit",
            "Delete"=>"Parents/ParentDelete",
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        if(isset($this->param[0])){
            $data = [
                "ogrenciId"=>$this->param[0]
            ];
            $data["bilgiler"] = $this->Parents_model->ReadDetail(array("ogrenciId"=>$this->param[0]));
            foreach ($data["bilgiler"] as $key => $value) {
                
                $data["bilgiler"][$key]["ogrenciAdi"] = $this->Student_model->ReadDetail(array("id"=>$value["ogrenciId"]))[0]["adSoyad"];
            }
        }else{
            $bilgiler = $this->Student_model->Read();
            foreach($bilgiler as $key => $bilgi){
                $bilgiler[$key]["ogrenciAdi"] = $this->Parents_model->ReadDetail(array("ogrenciId"=>$bilgi["ogrenciId"]))[0]["adSoyad"];
            }
            $data["bilgiler"] = $bilgiler;
        }
        $this->load->view("Pages/Main/ebeveyn.php", $data);
    }
    public function ParentAdd(){
        $data = [
            "footerButtonText"=>"Kaydet",
            "location"=> "Parents/Add",
            "ogrenciId" => $this->param[0]

        ];
        $this->load->view("Pages/Add/ebeveynEkle.php",$data);
    }
    public function ParentEdit(){
        $data = [
            "footerButtonText"=>"Kaydet",
            "location"=> "Parents/Edit",
            "id" => $this->param[0]
        ];
        $data = array_merge($data,$this->Parents_model->ReadDetail(["id"=>$this->param[0]])[0]);
        $this->load->view("Pages/Edit/ebeveynDuzenle.php",$data);
    }
    public function ParentDelete(){
        $data = [
            "footerButtonText"=>"Sil",
            "location"=> "Parents/Delete",
            "param" => $this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    protected function Add(){
        $this->Parents_model->Create(ExtractParameter($this->param,["meslek","ogrenciId","dogumYeri","ebeveyn"],true));
    }
    protected function Edit(){
        $this->Parents_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,["id"]));
    }
    protected function Delete(){
        $this->Parents_model->Delete(["id"=>$this->param["id"]]);
    }
}
