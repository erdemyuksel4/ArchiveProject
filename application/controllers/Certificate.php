<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends MY_Controller
{
    public $page = "Certificate";
    public function __construct(){
        parent::__construct();
        $this->load->model("Certificate_model");
        $this->load->model("Teacher_model");
        $this->load->model("Image_model");
    }
    public function Certificate(){
        $urls = [
            "Add"=>"Certificate/CertificateAdd",
            "Edit"=>"Certificate/CertificateEdit",
            "Delete"=>"Certificate/CertificateDelete",
            "Detail"=>"Certificate/CertificateDetail",
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        if(isset($this->param[0])){
            $data = [
                "ogretmenId"=>$this->param[0]
            ];
            $data["bilgiler"] = $this->Certificate_model->ReadDetail(array("ogretmenId"=>$this->param[0]));
            foreach ($data["bilgiler"] as $key => $value) {
                
                $data["bilgiler"][$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetail(array("id"=>$value["ogretmenId"]))[0]["adSoyad"];
            }
        }else{
            $bilgiler = $this->Certificate_model->Read();
            foreach($bilgiler as $key => $bilgi){
                $bilgiler[$key]["ogretmenAdi"] = $this->Teacher_model->ReadDetail(array("id"=>$bilgi["ogretmenId"]))[0]["adSoyad"];
            }
            
            $data["bilgiler"] = $bilgiler;
        }
        $this->load->view("Pages/Main/sertifika.php",$data);
    }
    public function CertificateAdd(){
        $data = [
            "location"=>"Certificate/Add",
            "footerButtonText"=>"Kaydet",
            "ogretmenId" => $this->param[0]
        ];
        $this->load->view("Pages/Add/sertifikaEkle.php",$data);
    }
    public function CertificateEdit(){
        $data = [
            "location"=>"Certificate/Edit",
            "footerButtonText"=>"Kaydet",
        ];
        $detail = $this->Certificate_model->ReadDetail(array("id"=>$this->param[0]))[0];
        $detail["resimler"] = $this->Image_model->ImageChangeFormat($detail["resimler"]);
        $data = array_merge($data,$detail);
        $this->load->view("Pages/Edit/sertifikaDuzenle.php",$data);
    }
    public function CertificateDetail(){
        $data = [       
            "nosubmit"=>"true",
        ];
        $detail = $this->Certificate_model->ReadDetail(array("id"=>$this->param[0]))[0];
        $detail["resimler"] = $this->Image_model->ImageChangeFormat($detail["resimler"]);
        $data = array_merge($data,$detail);
        $this->load->view("Pages/Detail/sertifikaDetaylari.php",$data);
    }
    public function CertificateDelete(){
        $data = [
            "location"=>"Certificate/Delete",
            "footerButtonText"=>"Sil",
            "param"=>$this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    protected function Add(){
        $this->Certificate_model->ogretmenId = $this->param["ogretmenId"];
        $this->Certificate_model->no = $this->param["no"];
        $this->Certificate_model->ad = $this->param["ad"];
        $this->Certificate_model->tarih = $this->param["tarih"];
        $this->Certificate_model->kurum = $this->param["kurum"];
        $this->Certificate_model->sure = $this->param["sure"];
        $this->Certificate_model->aciklama = $this->param["aciklama"];
        $this->Certificate_model->resimler = $this->Image_model->ImageAdd($this->param["blobs"],$this->param["ad"],"certificate");
        $this->Certificate_model->Create();
    }
    protected function Edit(){
        $this->param["resimler"] = $this->Image_model->ImageEdit($this->param["blobs"],$this->param["ad"],"certificate");
        $id= $this->param["id"];
        unset($this->param["blobs"]);
        unset($this->param["deletedImg"]);
        unset($this->param["ogretmenId"]);
        unset($this->param["id"]);
        $this->Certificate_model->Update(array("id" => $id),$this->param);
    }
    protected function Delete(){
        $this->Certificate_model->Delete(array("id" => $this->param["id"]));
    }
}
