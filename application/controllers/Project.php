<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller
{
    public $page = "Project";
    public function __construct(){
        parent::__construct();
        $this->load->model("Project_model");
        $this->load->model("Teacher_model");
        $this->load->model("Image_model");
    }
    public function Project(){
        $urls = [
            "Add"=>"Project/ProjectAdd",
            "Edit"=>"Project/ProjectEdit",
            "Delete"=>"Project/ProjectDelete",
            "Detail"=>"Project/ProjectDetail",
        ];
        if(isset($this->param[0])){
            $data = [
                "ogretmenId"=>$this->param[0]
            ];
            $data["bilgiler"] = $this->Project_model->ReadDetail(array("ogretmenId"=>$this->param[0]));
            foreach ($data["bilgiler"] as $key => $value) {
                $data["bilgiler"][$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetail(array("id"=>$value["ogretmenId"]))[0]["adSoyad"];
            }
        }else{
            $bilgiler = $this->Project_model->Read();
            foreach($bilgiler as $key => $bilgi){
                $bilgiler[$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetail(array("id"=>$bilgi["ogretmenId"]))[0]["adSoyad"];
            }
            $data["bilgiler"] = $bilgiler;
        }
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Main/proje.php",$data);
    }
    public function ProjectAdd(){
        $data = [
            "location"=>"Project/Add",
            "footerButtonText"=>"Kaydet",
            "ogretmenId" => $this->param[0]
        ];
        $this->load->view("Pages/Add/projeEkle.php",$data);
    }
    public function ProjectEdit(){
        $data = [
            "location"=>"Project/Edit",
            "footerButtonText"=>"Kaydet",
        ];
        $detail = $this->Project_model->ReadDetail(array("id"=>$this->param[0]))[0];
        $detail["resimler"] = $this->Image_model->ImageChangeFormat($detail["resimler"]);
        $data = array_merge($data,$detail);
        $this->load->view("Pages/Edit/projeDuzenle.php",$data);
    }
    public function ProjectDetail(){
        $data = [
            "nosubmit"=>"true",
        ];
        $detail = $this->Project_model->ReadDetail(array("id"=>$this->param[0]))[0];
        $detail["resimler"] = $this->Image_model->ImageChangeFormat($detail["resimler"]);
        $data = array_merge($data,$detail);
        $this->load->view("Pages/Detail/projeDetaylari.php",$data);
    }
    public function ProjectDelete(){
        $data = [
            "location"=>"Project/Delete",
            "footerButtonText"=>"Sil",
            "param"=>$this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    protected function Add(){
        $this->Project_model->ogretmenId = $this->param["ogretmenId"];
        $this->Project_model->ad = $this->param["ad"];
        $this->Project_model->butce = $this->param["butce"];
        $this->Project_model->sure = $this->param["sure"];
        $this->Project_model->aciklama = $this->param["aciklama"];
        $this->Project_model->resimler = $this->Image_model->ImageAdd($this->param["blobs"],$this->param["ad"],"project");
        $this->Project_model->Create();
    }
    protected function Edit(){
        $this->param["resimler"] = $this->Image_model->ImageEdit($this->param["blobs"],$this->param["ad"],"project");
        $id= $this->param["id"];
        unset($this->param["blobs"]);
        unset($this->param["deletedImg"]);
        unset($this->param["ogretmenId"]);
        unset($this->param["id"]);
        $this->Project_model->Update(array("id" => $id),$this->param);
    }
    protected function Delete(){
        $this->Project_model->Delete(array("id" => $this->param["id"]));
    }
}
