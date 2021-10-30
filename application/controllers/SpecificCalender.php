<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SpecificCalender extends MY_Controller
{
    public $page = "SCalender";
    public function __construct(){
        parent::__construct();
        $this->load->model("SC_model");
    }
    public function SCalender(){
        $urls = [
            "Add"=>"SpecificCalender/SCalenderAdd",
            "Edit"=>"SpecificCalender/SCalenderEdit",
            "Delete"=>"SpecificCalender/SCalenderDelete"
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        $data["bilgiler"]= $this->SC_model->Read();
        $this->load->view("Pages/Main/belirligunler.php",$data);
    }
    public function SCalenderAdd(){
        $data=[
            "footerButtonText"=>"Kaydet",
            "location"=>"SpecificCalender/Add",
        ];
        $this->load->view("Pages/Add/belirligunlerEkle.php",$data);
    }
    public function SCalenderEdit(){
        $data=[
            "footerButtonText"=>"Kaydet",
            "location"=>"SpecificCalender/Edit"
        ];
        $d = $this->SC_model->ReadDetailSingle(["id"=>$this->param[0]]);
        $data["id"] = $d["id"];
        $data["ad"] = $d["ad"];
        $a = explode("/",$d["baslangic"]);
        $data["baslangicD"] = current($a);
        $data["baslangicM"] = next($a);
        $b = explode("/",$d["bitis"]);
        $data["bitisD"] = current($b);
        $data["bitisM"] = next($b);
        $this->load->view("Pages/Edit/belirligunlerDuzenle.php",$data);
    }
    public function SCalenderDelete(){
        $data=[
            "footerButtonText"=>"Sil",
            "location"=>"SpecificCalender/Delete",
            "param"=>$this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    protected function Add(){
        $this->param["baslangic"] = $this->param["baslangicD"]."/".$this->param["baslangicM"];
        $this->param["bitis"] = $this->param["bitisD"]."/".$this->param["bitisM"];
        $this->SC_model->Create(ExtractParameter($this->param,["ad","baslangic","bitis"],true));
    }
    protected function Edit(){
        $this->param["baslangic"] = $this->param["baslangicD"]."/".$this->param["baslangicM"];
        $this->param["bitis"] = $this->param["bitisD"]."/".$this->param["bitisM"];
        $this->SC_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,["ad","baslangic","bitis"],true));
    }
    protected function Delete(){
        $this->SC_model->Delete(["id"=>$this->param["id"]]);
    }
}
