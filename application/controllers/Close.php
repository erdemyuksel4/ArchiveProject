<?php
defined('BASEPATH') OR exit('No direct script access allowed');
cxgggfgfghgfhgfhgf
class Close extends MY_Controller
{
    public $page = "Close";
    public function __construct(){
        parent::__construct();
        $this->load->model("Close_model");
        $this->load->model("Teacher_model");
        $this->load->model("Vaccine_model");
    }
    public function Close(){
        $urls = [
            "Add"=>"Close/CloseAdd",
            "Edit"=>"Close/CloseEdit",
            "Delete"=>"Close/CloseDelete",
            "Detail"=>"Close/CloseDetail",
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        if(isset($this->param[0])){
            $data = [
                "ogretmenId"=>$this->param[0]
            ];
            $data["bilgiler"] = $this->Close_model->ReadDetail(array("ogretmenId"=>$this->param[0]));
            foreach ($data["bilgiler"] as $key => $value) {
                $data["bilgiler"][$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetail(array("id"=>$value["ogretmenId"]))[0]["adSoyad"];
            }
        }else{
            $bilgiler = $this->Close_model->Read();
            foreach($bilgiler as $key => $bilgi){
                $bilgiler[$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetail(array("id"=>$bilgi["ogretmenId"]))[0]["adSoyad"];
            }
            $data["bilgiler"] = $bilgiler;
        }
        $this->load->view("Pages/Main/yakin.php",$data);
    }
    public function CloseAdd(){
        $data = [
            "location"=>"Close/Add",
            "footerButtonText"=>"Kaydet",
            "ogretmenId" => $this->param[0]
        ];
        $this->load->view("Pages/Add/yakinEkle.php",$data);
    }
    public function CloseEdit(){
        $data = [
            "location"=>"Close/Edit",
            "footerButtonText"=>"Kaydet",
        ];
        $detail = $this->Close_model->ReadDetail(array("id"=>$this->param[0]))[0];
        if (count(array_filter(explode(";",$detail["asi"])))>0):
            foreach (array_filter(explode(";",$detail["asi"]))as $key => $value){
                if(strlen($value)>0):
                    $v = $this->Vaccine_model->ReadDetail(array("id"=>$value))[0];
                    $d[$v["id"]] = $v["asiAdi"];
                endif;
            }
        else:
            $d = [];
        endif;
        $detail["asi"] = $d;
        $data = array_merge($data,$detail);
        $this->load->view("Pages/Edit/yakinDuzenle.php",$data);
    }
    public function CloseDetail(){
        $data = [
            "nosubmit"=>"true",
        ];
        $detail = $this->Close_model->ReadDetail(array("id"=>$this->param[0]))[0];
        $d = [];
        foreach (array_filter(explode(";",$detail["asi"]))as $key => $value){
            $d[] = $this->Vaccine_model->ReadDetail(array("id"=>$value))[0]["asiAdi"];
        }
        $detail["asi"] = $d;
        $data = array_merge($data,$detail);
        $this->load->view("Pages/Detail/yakinDetaylari.php",$data);
    }
    public function CloseDelete(){
        $data = [
            "location"=>"Close/Delete",
            "footerButtonText"=>"Sil",
            "param"=>$this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    protected function Add(){
        $this->Close_model->ogretmenId = $this->param["ogretmenId"];
        $this->Close_model->adSoyad = $this->param["adSoyad"];
        $this->Close_model->derece = $this->param["derece"];
        $this->Close_model->email = $this->param["email"];
        $this->Close_model->tckn = $this->param["tckn"];
        $this->Close_model->dogumTarihi = $this->param["dogumTarihi"];
        $this->Close_model->dogumYeri = $this->param["dogumYeri"];
        if(isset($this->param["asi"])){
            foreach ($this->param["asi"] as $key => $value) {
                $this->Close_model->asi .= $value.";"; 
            }
        }else{
            $this->Close_model->asi = "";
        }
        $this->Close_model->telefon = $this->param["telefon"];
        $this->Close_model->Create();
        
    }
    protected function Edit(){
        foreach($this->param["asi"] as $key => $value){
            $this->Vaccine_model->asiAdi = $value;
            $this->Vaccine_model->ogretmenId = 0;
            $c.= $this->Vaccine_model->Create().";";
        }
        if(isset($this->param["deletedasi"])):
            foreach($this->param["deletedasi"] as $key => $value){
                if($value=="1"){
                    $c .= $key.";";
                }else if($value=="0"){
                    $this->Vaccine_model->Delete(array("id" =>$key));
                }
            }
        endif;
        $this->param["asi"] = $c;
        $id= $this->param["id"];
        unset($this->param["deletedasi"]);
        unset($this->param["ogretmenId"]);
        unset($this->param["id"]);
        $this->Close_model->Update(array("id" => $id),$this->param);
    }
    protected function Delete(){
        $detail = $this->Close_model->ReadDetail(array("id"=>$this->param["id"]))[0];
        foreach (array_filter(explode(";",$detail["asi"]))as $key => $value){
            $this->Vaccine_model->Delete(array("id"=>$value));
        }
        $this->Close_model->Delete(array("id" => $this->param["id"]));
    }
}
