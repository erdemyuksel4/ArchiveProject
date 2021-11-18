<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competition extends MY_Controller
{
    public $page = "Competition";
    public function __construct(){
        parent::__construct();
        $this->load->model('Competition_model');
        $this->load->model('Student_model');
        $this->load->model('Image_model');
    }
    public function Competition(){
        $urls = [
            "Add"=>"Competition/CompetitionAdd",
            "Edit"=>"Competition/CompetitionEdit",
            "Delete"=>"Competition/CompetitionDelete",
            "Detail"=>"Competition/CompetitionDetail",
        ];
        if(isset($this->param[0])){
            $data = [
                "ogrenciId"=>$this->param[0]
            ];
            $data["bilgiler"] = $this->Competition_model->ReadDetail(array("ogrenciId"=>$this->param[0]));
            foreach ($data["bilgiler"] as $key => $value) {
                $data["bilgiler"][$key]["ogrenciAdi"] = $this->Student_model->ReadDetail(array("id"=>$value["ogrenciId"]))[0]["adSoyad"];
            }
        }else{
            $bilgiler = $this->Competition_model->Read();
            foreach($bilgiler as $key => $bilgi){
                $bilgiler[$key]["ogrenciAdi"] = $this->Student_model->ReadDetail(array("id"=>$bilgi["ogrenciId"]))[0]["adSoyad"];
            }
            $data["bilgiler"] = $bilgiler;
        }
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Main/yarisma.php",$data);
    }
    public function CompetitionAdd(){
        $data = [
            "footerButtonText"=>"Kaydet",
            "location"=>"Competition/Add",
            "ogrenciId"=> $this->param[0]
        ];
        $this->load->view("Pages/Add/yarismaEkle.php",$data);
    }
    public function CompetitionDetail(){
        $data = $this->Competition_model->ReadDetail(["id"=>$this->param[0]])[0];
        $data["resimler"] = $this->Image_model->ImageChangeFormat($data["resimler"]);
        $data["nosubmit"]="true";
        $this->load->view("Pages/Detail/yarismaDetaylari.php",$data);
    }
    public function CompetitionEdit(){
        $data = [
            "footerButtonText"=>"Kaydet",
            "location"=>"Competition/Edit",
            "id"=> $this->param[0]
        ];
        $data = array_merge($data,$this->Competition_model->ReadDetail(["id"=>$this->param[0]])[0]);
        $data["resimler"] = $this->Image_model->ImageChangeFormat($data["resimler"]);
        $this->load->view("Pages/Edit/yarismaDuzenle.php",$data);
    }
    public function CompetitionDelete(){
        $data = [
            "footerButtonText"=>"Sil",
            "location"=>"Competition/Delete",
            "param"=> $this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    protected function Add(){
        $this->param["resimler"] = $this->Image_model->ImageAdd($this->param["blobs"],$this->param["yarismaAdi"],"competition");
        $this->Competition_model->Create(ExtractParameter($this->param,["resimler","ogrenciId","kurum","tarih","odul","aciklama","yarismaAdi"],true));
    }
    protected function Edit(){
        $this->param["resimler"] = $this->Image_model->ImageEdit($this->param["blobs"],$this->param["ad"],"competition");
        $this->Competition_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,["resimler","ogrenciId","kurum","tarih","odul","aciklama","yarismaAdi"],true));
    }
    protected function Delete(){
        $this->Competition_model->Delete(["id"=>$this->param["id"]]);
    }
}