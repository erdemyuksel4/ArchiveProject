<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons extends MY_Controller
{
    public $page = "Lesson";
    public function __construct(){
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->model('Absence_model');
        $this->load->model('School_model');
        $this->load->model('Grade_model');
        $this->load->model('Teacher_model');
        $this->load->model('Parents_model');
        $this->load->model('Class_model');
        $this->load->model('Term_model');
        $this->load->model('Find_model');
        $this->load->model('Lesson_model');
    }
    function BringLesson(){
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
        
        if(!is_null($this->param["ogrenciId"])&&trim($this->param["ogrenciId"])!=""){
            $get = $this->Find_model->Find("Classes",["id"=>$this->param["ogrenciId"]],["kullaniciId"=>$ses["data"]["id"]]);
        }else if(!is_null($this->param["sinif"])&&trim($this->param["sinif"])!=""){
            $get = $this->Find_model->Find("Classes",["sinifId"=>$this->param["sinif"]],["kullaniciId"=>$ses["data"]["id"]]);
        }else if (!is_null($this->param["okulId"])&&trim($this->param["okulId"])!=""){
            $get = $this->Find_model->Find("Classes",["okulId"=>$this->param["okulId"]],["kullaniciId"=>$ses["data"]["id"]]);
        }else if (!is_null($this->param["yerId"])&&trim($this->param["yerId"])!=""){
            $okul = $this->School_model->ReadDetail(["yerId"=>$this->param["yerId"]]);
            $get = [];
            foreach ($okul as $key => $value) {
                $get =  array_merge($get,$this->Find_model->Find("Classes",["okulId"=>$value["id"]],["kullaniciId"=>$ses["data"]["id"]]));
            }
        }else if (!is_null($this->param["bolgeId"])&&trim($this->param["bolgeId"])!=""){
            $okul = $this->School_model->ReadDetail(["bolgeId"=>$this->param["bolgeId"]]);
            $get= [];
            foreach ($okul as $key => $value) {
                $get =  array_merge($get,$this->Find_model->Find("Classes",["okulId"=>$value["id"]],["kullaniciId"=>$ses["data"]["id"]]));
            }
        }else{
            $get = $this->Find_model->Find("Classes",[],["kullaniciId"=>$ses["data"]["id"]]);
        }

        return $get;
    }

    public function Lesson(){
        $sess = $this->session->userdata("Account");
        $urls = [
            "Detail"=>"Lessons/LessonDetail",
        ];
        $data["bilgiler"] = $this->BringLesson();
        $this->load->view("Find/findSinif.php",["donemler"=>$this->Term_model->Read(),"location"=>"Lessons/Lesson","filtre"=>$this->param]);
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Main/dersler.php",$data);
    }
    public function LessonAdd(){
        $data = [
            "location"=>"Lessons/Add",
            "footerButtonText"=>"Kaydet",
            "sinif"=>$this->param[0]
        ];
        $this->load->view("Pages/Add/dersEkle.php",$data);
    }
    public function LessonDetail(){
        if(isset($this->param[0])){
            $urls = [
                "Add"=>"Lessons/LessonAdd",
                "Edit"=>"Lessons/LessonEdit",
                "Delete"=>"Lessons/LessonDelete",
                "Back"=> "Lessons"
            ];
            $data["sinifB"]= $this->Class_model->ReadDetailSingle(["id"=>$this->param[0]]);
            $data["bilgiler"] = $this->Lesson_model->ReadDetail(array("sinifId"=>$this->param[0]));
            $data["urls"] = $this->PagePermControlList($urls);
            $this->load->view("Pages/Detail/dersler.php",$data);
        }else{
            echo "<div class='text-center alert alert-primary'>Bu öğrencinin sınıfı bulunmamaktadır</div>";
        }
    }
    public function LessonEdit(){
        $data = [
            "location"=>"Lessons/Edit",
            "footerButtonText"=>"Kaydet",
        ];
        $data = array_merge($data,$this->Lesson_model->ReadDetailSingle(["id"=>$this->param[0]]));
        $this->load->view("Pages/Edit/dersDuzenle.php",$data);
    }
    public function LessonDelete(){
        
        $this->load->view("Modals/Body/DeleteAgree.php",[
            "param"=>$this->param[0],
            "location"=>"Lessons/Delete",
            "footerButtonText"=>"Sil"
        ]);

    }
    protected function Add(){
        $this->Lesson_model->Create(ExtractParameter($this->param,["platform","sinifId","dersZamani","saat"],true));
    }
    protected function Edit(){
        $this->Lesson_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,["platform","dersZamani","saat"],true));
    }
    protected function Delete(){
        $this->Lesson_model->Delete(["id"=>$this->param["id"]]);
    }
}
