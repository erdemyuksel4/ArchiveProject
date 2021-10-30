<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Education extends MY_Controller
{
    public $page = "Education";
    public function __construct(){
        parent::__construct();
        $this->load->model("Education_model");
        $this->load->model("Teacher_model");
    }
    public function Education(){
        $urls = [
            "Add"=>"Education/EducationAdd",
            "Edit"=>"Education/EducationEdit",
            "Delete"=>"Education/EducationDelete",
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        if(isset($this->param[0])){
            $data = [
                "ogretmenId"=>$this->param[0]
            ];
            $data["bilgiler"] = $this->Education_model->ReadDetail(array("ogretmenId"=>$this->param[0]));
            foreach ($data["bilgiler"] as $key => $value) {
                
                $data["bilgiler"][$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetail(array("id"=>$value["ogretmenId"]))[0]["adSoyad"];
            }
        }else{
            $bilgiler = $this->Education_model->Read();
            foreach($bilgiler as $key => $bilgi){
                $bilgiler[$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetail(array("id"=>$bilgi["ogretmenId"]))[0]["adSoyad"];
            }
            
            $data["bilgiler"] = $bilgiler;
        }
        $this->load->view("Pages/Main/egitimDurumu.php",$data);
    }
    public function EducationAdd(){
        $data = [
            "location"=>"Education/Add",
            "footerButtonText"=>"Kaydet",
            "ogretmenId" => $this->param[0]
        ];
        $this->load->view("Pages/Add/egitimEkle.php",$data);
    }
    public function EducationEdit(){
        $data = [
            "location"=>"Education/Edit",
            "footerButtonText"=>"Kaydet",
        ];
        $detail = $this->Education_model->ReadDetail(array("id"=>$this->param[0]))[0];
        $data = array_merge($data,$detail);
        $this->load->view("Pages/Edit/egitimDuzenle.php",$data);
    }
    public function EducationDelete(){
        $data = [
            "location"=>"Education/Delete",
            "footerButtonText"=>"Sil",
            "param"=>$this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    protected function Add(){
        $this->Education_model->ogretmenId = $this->param["ogretmenId"];
        $this->Education_model->duzey = $this->param["duzey"];
        $this->Education_model->kurumAdi = $this->param["kurumAdi"];
        $this->Education_model->tezAdi = $this->param["tezAdi"];
        $this->Education_model->Create($this->param);
    }
    protected function Edit(){
        $this->Education_model->duzey = $this->param["duzey"];
        $this->Education_model->kurumAdi = $this->param["kurumAdi"];
        $this->Education_model->tezAdi = $this->param["tezAdi"];
        $this->Education_model->Update(array("id" => $this->param["id"]),$this->param);
    }
    protected function Delete(){
        $this->Education_model->Delete(array("id" => $this->param["id"]));
    }
}
