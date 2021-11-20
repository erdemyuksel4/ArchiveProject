<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends MY_Controller
{
    public $page = "Grade";
    public function __construct(){
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->model('School_model');
        $this->load->model('Lesson_model');
        $this->load->model('Parents_model');
        $this->load->model('Class_model');
        $this->load->model('Grade_model');
        $this->load->model('Absence_model');
        $this->load->model('Teacher_model');
        $this->load->model('Term_model');
        $this->load->model('Find_model');
    }
    function BringStudent(){
        $ses = $this->session->userdata("Account");
        $this->param["donemId"] = $this->param["donemId"]??$this->Term_model->FindActiveTerm()["id"];
        $this->param["donem"] = $this->param["donem"]??1;
        $this->param["ogrenciId"] = $this->param["ogrenciId"]??null;
        $this->param["sinif"] = $this->param["sinif"]??null;
        $this->param["okulId"] = $this->param["okulId"]??null;
        $this->param["yerId"] = $this->param["yerId"]??null;
        $this->param["bolgeId"] = $this->param["bolgeId"]??null;
        
        $this->session->set_userdata("param",$this->param);
        $this->Find_model->LoadModel($this);
        
        if(!is_null($this->param["ogrenciId"])&&""!=trim($this->param["ogrenciId"])){
            $get = $this->Find_model->Find("Students",["id"=>$this->param["ogrenciId"]],["kullaniciId"=>$ses["data"]["id"]]);
        }else if(!is_null($this->param["sinif"])&&""!=trim($this->param["sinif"])){
            $get = $this->Find_model->Find("Students",["sinifId"=>$this->param["sinif"]],["kullaniciId"=>$ses["data"]["id"]]);
        }else if (!is_null($this->param["okulId"])&&""!=trim($this->param["okulId"])){
            $get = $this->Find_model->Find("Students",["okulId"=>$this->param["okulId"]],["kullaniciId"=>$ses["data"]["id"]]);
        }else if (!is_null($this->param["yerId"])&&""!=trim($this->param["yerId"])){
            $okul = $this->School_model->ReadDetail(["yerId"=>$this->param["yerId"]]);
            $get = [];
            foreach ($okul as $key => $value) {
                $get =  array_merge($get,$this->Find_model->Find("Students",["okulId"=>$value["id"]],["kullaniciId"=>$ses["data"]["id"]]));
            }
        }else if (!is_null($this->param["bolgeId"])&&""!=trim($this->param["bolgeId"])){
            $okul = $this->School_model->ReadDetail(["bolgeId"=>$this->param["bolgeId"]]);
            $get= [];
            foreach ($okul as $key => $value) {
                $get =  array_merge($get,$this->Find_model->Find("Students",["okulId"=>$value["id"]],["kullaniciId"=>$ses["data"]["id"]]));
            }
        }else{
            $get = $this->Find_model->Find("Students",[],["kullaniciId"=>$ses["data"]["id"]]);
        }
        return $get;
    }
    public function Grade(){
        $sess = $this->session->userdata("Account");
        $urls = [
            "Edit"=>"Grade/GradeEdit",
        ];
        $this->param["donemId"] = $this->param["donemId"]??$this->Term_model->FindActiveTerm()["id"];
        $this->param["donem"] = $this->param["donem"]??1;
        $data["bilgiler"] = $this->BringStudent();
        $this->load->view("Find/findStudent.php",["donemler"=>$this->Term_model->Read(),"location"=>"Grade/Grade","filtre"=>$this->param]);
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Main/notBilgisi.php",$data);
    }
    public function GradeDetail(){
        $sess = $this->session->userdata("Account");
        $this->Find_model->LoadModel($this);
        $urls = [
            "Edit"=>"Grade/GradeEdit",
        ];
        $this->param["donemId"] = $this->param["donemId"]??$this->Term_model->FindActiveTerm()["id"];
        $this->param["donem"] = $this->param["donem"]??1;
        $get = $this->Find_model->Find("Student",["id"=>$this->param[0]]);
        $data["bilgiler"] = $get;
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Detail/notBilgisi.php",$data);
    }
    public function GradeDetailEdit(){
        $this->Edit();
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function GradeEdit(){
        $this->Edit();
        redirect(base_url("Grade"));
    }
    public function Edit(){
        if($this->param["notId"]){
            for ($i=0; $i < count($this->param["notId"]); $i++) {
                $this->Grade_model->Update(["id"=>$this->param["notId"][$i]],["ogrenciNot"=>$this->param["ogrenciNot"][$i]]);
            }
        }
    }
}
