<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledge extends MY_Controller
{
    public $page = "Knowledge";
    public function __construct(){
        parent::__construct();
        $this->load->model("Knowledge_model");
        $this->load->model("Teacher_model");
    }
    public function Knowledge(){
        $urls = [
            "Add"=>"Knowledge/KnowledgeAdd",
            "Edit"=>"Knowledge/KnowledgeEdit",
            "Delete"=>"Knowledge/KnowledgeDelete",
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        if(isset($this->param[0])){
            $data = [
                "ogretmenId"=>$this->param[0]
            ];
            $data["bilgiler"] = $this->Knowledge_model->ReadDetail(array("ogretmenId"=>$this->param[0]));
            foreach ($data["bilgiler"] as $key => $value) {
                $data["bilgiler"][$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetailSingle(array("id"=>$value["ogretmenId"]))["adSoyad"];
            }
        }else{
            $bilgiler = $this->Knowledge_model->Read();
            foreach($bilgiler as $key => $bilgi){
                $bilgiler[$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetailSingle(array("id"=>$bilgi["ogretmenId"]))["adSoyad"];
            }
            $data["bilgiler"] = $bilgiler;
        }
        $this->load->view("Pages/Main/bilgibeceri.php", $data);
    }
    public function KnowledgeAdd(){
        $data=[
            "footerButtonText"=>"Kaydet",
            "location"=>"Knowledge/Add",
            "ogretmenId"=>$this->param[0]
        ];
        $this->load->view("Pages/Add/bilgiEkle.php",$data);
    }
    public function KnowledgeEdit(){
        $data=[
            "footerButtonText"=>"Kaydet",
            "location"=>"Knowledge/Edit",
            "id"=>$this->param[0]
        ];
        $data = array_merge($data,$this->Knowledge_model->ReadDetailSingle(["id"=>$this->param[0]]));
        $this->load->view("Pages/Edit/bilgiDuzenle.php",$data);
    }
    public function KnowledgeDelete(){
        $data=[
            "location"=>"Knowledge/Delete",
            "footerButtonText"=>"Sil",
            "param"=>$this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    protected function Add(){
        $this->Knowledge_model->Create(ExtractParameter($this->param,["ogretmenId","seviye","bilgiBeceri","aciklama"],true));
    }
    protected function Edit(){
        $this->Knowledge_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,["seviye","bilgiBeceri","aciklama"],true));
    }
    protected function Delete(){
        $this->Knowledge_model->Delete(["id"=>$this->param["id"]]);
    }
}
