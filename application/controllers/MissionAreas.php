<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MissionAreas extends MY_Controller
{
    public $page = "Area";
    public function __construct(){
        parent::__construct();
        $this->load->model("Area_model");
        $this->load->model("Teacher_model");
        $this->load->model("Place_model");
        $this->load->model("Image_model");
        $this->load->model("Find_model");
    }
    public function AreaList(){
        $this->Find_model->LoadModel($this);
        echo json_encode($this->Find_model->Find("Area"));
    }
    public function Area(){
        $urls = [
            "Add"=>"MissionAreas/AreaAdd",
            "Edit"=>"MissionAreas/AreaEdit",
            "Delete"=>"MissionAreas/AreaDelete",
            "Detail"=>"MissionAreas/AreaDetail",
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        $data["data"] = $this->Area_model->Read();
        foreach ($data["data"] as $key => $value) {
            $data["data"][$key]["resimler"]=$this->Image_model->ImageChangeFormat($value["resimler"]);
        }
        $this->load->view("Pages/Main/gorevBolgeleri.php",$data);
    }
    public function AreaAdd(){
        
        $this->load->view("Pages/Add/gorevBolgesiEkle.php");
    }
    public function AreaEdit(){
        if(isset($this->param)){
            $data = $this->Area_model->ReadDetailSingle(["id"=>$this->param[0]]);
            $resimler = $this->Image_model->ImageChangeFormat($data["resimler"]);
            $data["resimler"] =$resimler;
            $this->load->view("Pages/Edit/gorevBolgesiDuzenle.php",$data);
        }
    }
    public function AreaDelete(){
        $data["location"] = "MissionAreas/Delete";
        $data["footerButtonText"] = "Sil";
        $data["param"] = $this->param[0];
        $this->load->view("Modals/Body/missionAreas/Delete.php",$data);
    }
    public function AreaDetail(){
        $urls = [
            "Edit"=>"MissionAreas/AreaEdit",
            "Edit2"=>"MissionPlaces/PlaceEdit",
            "Delete"=>"MissionPlaces/PlaceDelete",
            "Detail"=>"MissionPlaces/PlaceDetail",
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        if(isset($this->param)){
            $this->Area_model->id = $this->param[0];
            $this->Place_model->bolgeId = $this->param[0];
            $data["data"] = $this->Area_model->ReadDetailSingle(["id"=>$this->param[0]]);
            $data["data"]["resimler"] = $this->Image_model->ImageChangeFormat($data["data"]["resimler"]);
            $data["data_place"] = $this->Place_model->ReadDetailWithArea();
            $this->load->view("Pages/Detail/gorevBolgesiDetaylari.php",$data);
        }
    }
    protected function Add(){
        
        if(isset($this->param)){
            $bolgeAdi = $this->param["bolgeAdi"];
            $genelBilgi = $this->param["genelBilgi"];
            $ogrenciProfili = $this->param["ogrenciProfili"];
            $this->Area_model->resimler=$this->Image_model->ImageAdd($this->param["blobs"] ,$bolgeAdi,"missionarea");
            $this->Area_model->bolgeAdi = $bolgeAdi;
            $this->Area_model->genelBilgi = $genelBilgi;
            $this->Area_model->ogrenciProfili = $ogrenciProfili;
            $this->Area_model->Create();
            redirect(base_url("MissionAreas"),"location");
        } 
    }
    protected function Delete(){
        if(isset($this->param)){
            $this->Area_model->Delete(["id"=>$this->param["id"]]);
            redirect(base_url("MissionAreas"));
        }

    }
    protected function Edit(){
        if(isset($this->param)){
          
            $this->Area_model->id = $this->param["id"];
            $this->Area_model->bolgeAdi = $this->param["bolgeAdi"];
            $this->Area_model->genelBilgi = $this->param["genelBilgi"];
            $this->Area_model->ogrenciProfili = $this->param["ogrenciProfili"];

            $this->Area_model->resimler = $this->Image_model->ImageEdit($this->param["blobs"],$this->param["bolgeAdi"],"missionarea");
            $this->param["resimler"] =$this->Area_model->resimler;
            $param = ExtractParameter($this->param,[
                "bolgeAdi","genelBilgi","ogrenciProfili","resimler"
            ],true);
            $this->Area_model->Update(["id"=>$this->Area_model->id],$param);

            redirect(base_url("MissionAreas"));
        }

    }
}
