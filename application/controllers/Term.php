<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Term extends MY_Controller
{
    public $page = "Term";
    public function __construct(){
        parent::__construct();
        $this->load->model('Grade_model');
        $this->load->model('Term_model');
        $this->load->model('TermRecord_model');
    }

    public function Term(){
        $urls = [
            "Add"=>"Term/TermAdd",
            "Edit"=>"Term/TermEdit",
            "Delete"=>"Term/TermDelete",
        ];
        $data = $this->Term_model->Read();
        foreach ($data as $key => $value) {
            $data[$key]["donem"] = $value["baslangicYil"]."-".$value["bitisYil"];
        }
        $this->load->view('Pages/Main/term.php',["data"=>$data,"urls"=>$this->PagePermControlList($urls)]);
    }
    public function TermAdd(){
        $data  =[
            "footerButtonText"=>"Kaydet",
            "location"=>"Term/Add"
        ];
        $this->load->view('Pages/Add/term.php',$data);
    }
    public function TermEdit(){
        $data  =[
            "footerButtonText"=>"Kaydet",
            "location"=>"Term/Edit",
            "id"=>$this->param[0]
        ];
        $data = array_merge($data,$this->Term_model->ReadDetail(["id"=>$this->param[0]])[0]);
        $this->load->view('Pages/Edit/term.php',$data);
    }
    public function TermDelete(){
        $aktif= $this->Term_model->ReadDetail(["id"=>$this->param[0]])[0]["aktifDonem"];
        $notVar = $this->Grade_model->ReadDetail(["donemId"=>$this->param[0]]);
        if($aktif==1){
            $data  =[
                "nosubmit"=>"on",
            ];
            
            $this->load->view('Modals/Body/term/term.php',$data);
            
        }elseif(count($notVar)>0){
            $data  =[
                "nosubmit"=>"on",
            ];
            
            $this->load->view('Modals/Body/term/termGrade.php',$data);

        }else{
            $data  =[
                "footerButtonText"=>"Sil",
                "location"=>"Term/Delete",
                "param"=>$this->param[0]
            ];
            $this->load->view('Modals/Body/DeleteAgree.php',$data);
        }
    }
    protected function Add(){
        $this->Term_model->Create(ExtractParameter($this->param,["baslangicYil","bitisYil"],true));
    }
    protected function Edit(){
        if($this->param["aktifDonem"] == "on"){
            $this->Term_model->Update(["aktifDonem"=>"1"],["aktifDonem"=>"0"]);
            $this->param["aktifDonem"] = "1";
        }
        $this->Term_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,["baslangicYil","bitisYil","aktifDonem"],true));
    }
    protected function Delete(){
        if($_SERVER["HTTP_REFERER"]==base_url("Term")){
            $this->Term_model->Delete(["id"=>$this->param["id"]]);
        }
    }
}
