<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TOABOVT extends MY_Controller
{
    public $page = "OVT";
    public function __construct(){
        parent::__construct();
        $this->load->model("TOABOVT_model");
        $this->load->model("Area_model");
        $this->load->model("Place_model");
        $this->load->model("School_model");
    }
    public function OVT(){
        $urls = [
            "Add"=>"TOABOVT/OVT_Add",
            "Edit"=>"TOABOVT/OVT_Edit",
            "Delete"=>"TOABOVT/OVT_Delete",
            "Detail"=>"TOABOVT/OVT_Detail",
        ];
        if(isset($this->param[0])){
            $okulId = $this->param[0];
            $data["okulId"] = $okulId;
            $data["toab"] = $this->TOABOVT_model->ReadDetail(["okulId"=>$this->param[0]]);
            $data["urls"] = $this->PagePermControlList($urls);
            foreach ($data["toab"] as $key => $d){
                $school = $this->School_model->ReadDetailSingle(["id"=>$d["okulId"]]);
                $data["toab"][$key]["okul"] = $school;
            }
            $this->load->view("Pages/Main/toab.php",$data);
        }
    }
    public function OVT_Detail(){
        if($this->param){
            $data = $this->TOABOVT_model->ReadDetailSingle(["id"=>$this->param[0]]);
            if ($data) {
                $aList = $this->School_model->ReadDetailSingle(["id"=>$data["okulId"]]);
                if (isset($aList)) {
                    $school = $aList;
                    $data["okulAdi"] = $school["ad"];
                    $this->Place_model->id =$school["yerId"];
                    $yer =  $this->Place_model->ReadDetailSingle(["id"=>$school["yerId"]]);
                    
                    
                    $this->Area_model->id =$school["bolgeId"];
                    $bolge =  $this->Area_model->ReadDetailSingle(["id"=>$school["bolgeId"]]);
                    $data["yerAdi"] = $yer["yerAdi"];
                    $data["bolgeAdi"] = $bolge["bolgeAdi"];
                    
                } else
                {
                    $data["okulAdi"]="";
                    $data["yerAdi"] = "";
                    $data["bolgeAdi"] = "";
                    $data["meslek"] = "";
                    
                }
                $data = array_merge($data,["nosubmit"=>true]);
                
               
            $this->load->view("Pages/Detail/toabDetaylari.php",$data);
        }   
        }
    }
    public function OVTDetailWithSchool(){
        if($this->param){
            $urls = [
                "Add"=>"TOABOVT/OVT_Add",
                "Edit"=>"TOABOVT/OVT_Edit",
                "Delete"=>"TOABOVT/OVT_Delete",
                "Detail"=>"TOABOVT/OVT_Detail",
            ];
            $data["toab"] = $this->TOABOVT_model->ReadDetail(["okulId"=>$this->param[0]]);
            $data["okulId"] = $this->param[0];
            $data["urls"] = $this->PagePermControlList($urls);
            foreach ($data["toab"] as $key => $value) {
                $data["toab"][$key]["okul"] = $this->School_model->ReadDetailSingle(["id"=> $value["okulId"]]);
            }
            $this->load->view("Pages/Main/toab.php",$data);
        }
    }
    public function OVT_Add(){
        if(isset($this->param["param"])){
            $data["footerButtonText"] = "Kaydet";
            $data["location"] = $this->PagePermControl("TOABOVT/Add");
            $data["okulId"] = $this->param["param"];
            $this->load->view("Pages/Add/toabEkle.php",$data);
        }
    }
    public function OVT_Delete(){
        $this->param["footerButtonText"] = "Onayla";
        $this->param["location"] = "TOABOVT/Delete";
        $this->param["param"] = $this->param[0];
        $this->load->view("Modals/Body/DeleteAgree.php",$this->param);
    }
    public function OVT_Edit(){
        if($this->param){
            $data = $this->TOABOVT_model->ReadDetailSingle(["id"=>$this->param[0]]);
            $this->param["footerButtonText"] = "Kaydet";
            $this->param["location"] = "TOABOVT/Edit";

            
            $this->param = array_merge($data,$this->param);
            $this->load->view("Pages/Edit/toabDuzenle.php",$this->param);
        }
    }
    protected function Add(){
        $this->param["adSoyad"] = $this->param["ovtadSoyad"];
        $this->param["meslek"] = $this->param["ovtmeslek"];
        $this->param["gorev"] = $this->param["ovtgorev"];
        $this->param["telefon"] = $this->param["ovttelefonnumarasi"];
        $this->param["adres"] = $this->param["ovtadres"];
        $this->param["email"] = $this->param["ovtemailadresi"];
        $param = [
            "okulId",
            "adSoyad",
            "meslek",
            "gorev",
            "telefon",
            "adres",
            "email",
        ];
        $this->TOABOVT_model->Create(ExtractParameter($this->param,$param,true));
    }
    protected function Delete(){
        if(isset($this->param)){
            $this->TOABOVT_model->Delete(["id" => $this->param["id"]]);
        }
    }
    protected function Edit(){
        $this->TOABOVT_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,["okulId","adSoyad","meslek","gorev","telefon","adres","email"],true));

    }
}
