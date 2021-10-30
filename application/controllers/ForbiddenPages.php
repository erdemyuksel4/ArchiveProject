<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForbiddenPages extends MY_Controller
{
    public $page = "ForbiddenPages";
    public function __construct(){
        parent::__construct();
        $this->load->model("Page_model");
        $this->load->model("Permission_model");
    }
    public function ForbiddenPages(){
        $data["bilgiler"] = $this->Page_model->Read();
        foreach ($data["bilgiler"] as $key => $bilgiler){
            $data["bilgiler"][$key]["yetkiAdi"] = $this->Permission_model->ReadDetailSingle(["id"=>$bilgiler["yetkiId"]])["yetkiAdi"];
        }
        $this->load->view("Pages/Main/sayfalar.php",$data);
    }
    public function PageAdd(){
        $data["yetkiler"] = $this->Permission_model->Read();
        $data["location"] = "ForbiddenPages/Add";
        $data["footerButtonText"] = "Kaydet";
        $this->load->view("Pages/Add/sayfalar.php",$data);
    }
    public function PageEdit(){
        $data = $this->Page_model->ReadDetailSingle(["id"=>$this->param[0]]);
        $data["yetkiler"] = $this->Permission_model->Read();
        $data["location"] = "ForbiddenPages/Edit";
        $data["footerButtonText"] = "Kaydet";
        $this->load->view("Pages/Edit/sayfalar.php",$data);
        
    }
    public function PageDelete(){
        $data["location"] = "ForbiddenPages/Delete";
        $data["footerButtonText"] = "Sil";
        $data["param"] = $this->param[0];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
        
    }
    protected function Delete(){
        $this->Page_model->Delete(["id"=>$this->param["id"]]);
    }
    protected function Edit(){
        $this->param["altSayfalar"]= isset($this->param["altSayfalar"])?1:0;
        $this->Page_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,["altSayfalar","yetkiId","sayfaYol","sayfaAdi"],true));
        
    }
    protected function Add(){
        $y = $this->param["yetkiId"];
        $this->param["altSayfalar"]= isset($this->param["altSayfalar"])?1:0;
        foreach ($y as $key => $value) {
            $this->param["yetkiId"] = $value;
            $this->Page_model->Create(ExtractParameter($this->param,["altSayfalar","yetkiId","sayfaYol","sayfaAdi"],true));
        }
    }
}
