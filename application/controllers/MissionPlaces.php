<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MissionPlaces extends MY_Controller
{
    public $page = "Place";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Area_model");
        $this->load->model("Place_model");
        $this->load->model("Image_model");
    }
    public function PlaceList(){
        echo json_encode($this->Place_model->ReadDetail($this->param));
    }
    public function Place()
    {
        $urls = [
            "Add"=>"MissionPlaces/PlaceAdd",
            "Edit"=>"MissionPlaces/PlaceEdit",
            "Delete"=>"MissionPlaces/PlaceDelete",
            "Detail"=>"MissionPlaces/PlaceDetail",
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        $data["yerler"] = $this->Place_model->Read();
        foreach ($data["yerler"] as $k => $v) {
            $this->Area_model->id = $v["bolgeId"];
            $bolge = $this->Area_model->ReadDetailSingle(["id"=>$v["bolgeId"]]);
            $data["yerler"][$k]["bolgeAdi"] = $bolge["bolgeAdi"];
            $data["yerler"][$k]["resimler"] = $this->Image_model->ImageChangeFormat($v["resimler"]);
        }
        $this->load->view("Pages/Main/gorevYerleri.php",$data);
    }
    public function PlaceAdd()
    {
        $data = $this->Area_model->Read();
        $this->load->view("Pages/Add/gorevYeriEkle.php", ["bolgeler" => $data]);
    }
    public function PlaceEdit()
    {
        if(isset($this->param)){
            $this->Place_model->id = $this->param[0];
            $data = $this->Place_model->ReadDetailSingle(["id"=>$this->param[0]]);
            $bolgeList = $this->Area_model->Read();
            foreach($bolgeList as $bolge){
                $data["bolgeler"][] = ["bolgeAdi"=> $bolge["bolgeAdi"],"id"=> $bolge["id"]];
            }
            $data["resimler"] = $this->Image_model->ImageChangeFormat($data["resimler"]);
            $this->load->view("Pages/Edit/gorevYeriDuzenle.php",$data);
        }
    }
    public function PlaceDetail()
    {
        if(isset($this->param)){
            $this->Place_model->id = $this->param[0];
            $data = $this->Place_model->ReadDetailSingle(["id"=>$this->param[0]]);
            $this->Area_model->id = $data["bolgeId"];
            $this->Area_model->ReadDetailSingle(["id"=>$data["bolgeId"]]);
            $data["bolgeAdi"] = $this->Area_model->bolgeAdi; 
            $data["resimler"] = $this->Image_model->ImageChangeFormat($data["resimler"]);
            $this->load->view("Pages/Detail/gorevYeriDetaylari.php",$data);
        }
    }
    protected function Add()
    {
        if (isset($this->param)) {
            $this->Place_model->bolgeId = $this->param["bolgeId"];
            $this->Place_model->yerAdi = $this->param["yerAdi"];
            $this->Place_model->aciklama = $this->param["aciklama"];
            $this->Place_model->resimler = $this->Image_model->ImageAdd($this->param["blobs"],$this->Place_model->yerAdi,"missionplace");
            $this->Place_model->Create();
            redirect(base_url("MissionPlaces"));
        }
    }
    protected function Edit()
    {
        if (isset($this->param)) {
            $this->param["resimler"] = $this->Image_model->ImageEdit($this->param["blobs"],$this->Place_model->yerAdi,"missionplace");
            $this->Place_model->Update(["id" => $this->param["id"]],ExtractParameter($this->param,["bolgeId","yerAdi","aciklama","resimler"],true));
            redirect(base_url("MissionPlaces"));
        }
    }
    public function PlaceDelete(){
        $this->param["location"] = "MissionPlaces/Delete";
        $this->param["footerButtonText"] = "Sil";
        $this->param["param"] = $this->param[0];
        $this->load->view("Modals/Body/DeleteAgree.php",$this->param);
    }
    protected function Delete(){
        if(isset($this->param)){
            $this->Place_model->Delete(["id"=>$this->param["id"]]);
            redirect(base_url("MissionPlaces"));

        }

    }
}   