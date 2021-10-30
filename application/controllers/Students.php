<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends MY_Controller
{
    public $page = "Student";
    public function __construct(){
        parent::__construct();
        $this->load->model('Absence_model');
        $this->load->model('Grade_model');
        $this->load->model('Student_model');
        $this->load->model('Class_model');
        $this->load->model('Lesson_model');
        $this->load->model('Teacher_model');
        $this->load->model('Parents_model');
        $this->load->model('Find_model');
        $this->load->model('Area_model');
        $this->load->model('Place_model');
        $this->load->model('TOAB_model');
        $this->load->model('TOABOVT_model');
        $this->load->model('Image_model');
        $this->load->model('School_model');
        $this->load->model('Term_model');
        $this->load->model('TermRecord_model');
        $this->yetkiId =$this->session->userdata("Account")["data"]["yetkiId"];
    }
    public function FindTermNames($search){
        $donemler = $this->TermRecord_model->ReadDetail($search);
        foreach ($donemler as $key => $value) {
            $donemler[$key]["donemAdi"] = $this->FindTermName($value["donem"]);
        }
        return $donemler;
    }
    public function FindTermName($termId){
        $donem = $this->Term_model->ReadDetailSingle(["id"=>$termId]);
        return $donem["baslangicYil"]."-".$donem["bitisYil"];
    }
    public function StudentList(){
        if($this->param){
            $og = $this->Student_model->ReadDetail($this->param);
        }
        echo json_encode($og);
    }
    public function BringStudent(){
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
    public function Student(){
        $sess = $this->session->userdata("Account");
        $urls = [
            "Add"=>"Students/StudentAdd",
            "Edit"=>"Students/StudentEdit",
            "Delete"=>"Students/StudentDelete",
            "Detail"=>"Students/StudentDetail",
        ];
        $this->param["donemId"] = $this->param["donemId"]??$this->Term_model->FindActiveTerm()["id"];
        $this->param["donem"] = $this->param["donem"]??1;
        $data["ogrenciler"] = $this->BringStudent();
        $this->load->view("Find/findStudent.php",["donemler"=>$this->Term_model->Read(),"location"=>"Students/Student","filtre"=>$this->param]);
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Main/ogrenciler.php",$data);
    }
    public function StudentAdd(){
        $this->Find_model->LoadModel($this);
        $data["okullar"] = $this->Find_model->Find("Schools");
        $this->load->view("Pages/Add/ogrenciEkle.php",$data);
    }
    public function StudentEdit(){
        $this->Find_model->LoadModel($this);
        $data = $this->Find_model->Find("Student",["id"=>$this->param[0]]);
        $data["okullar"] = $this->Find_model->Find("Schools");       
        $this->load->view("Pages/Edit/ogrenciDuzenle.php",$data);
    }
    public function StudentDelete(){
        $data=[
            "location"=>"Students/Delete",
            "footerButtonText"=>"Sil",
            "param"=>$this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    public function StudentDetail(){
        $urls = [
            "Edit"=>"Students/StudentEdit",
        ];
        $this->Find_model->LoadModel($this);
        $data = $this->Find_model->Find("Student",["id"=>$this->param[0]]);
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Detail/ogrenciDetaylari.php",$data);
    }
    protected function Add(){
        $this->param["okulId"] = $this->param["okulId"];
        $this->param["adSoyad"] = $this->param["adSoyad"];
        $this->param["cinsiyet"] = $this->param["cinsiyet"];
        $this->param["dogumTarihi"] = $this->param["dogumTarihi"];
        $this->param["ebaId"] = $this->param["ebaId"];
        $this->param["Mezun"] = "";
        $this->param["dogumYeri"] = $this->param["dogumYeri"];
        $this->param["ttkdKatilimFormu"] = $this->param["ttkdKatilim"];
        $this->param["katilimBelgesiNo"] = ($this->param["katilimBelgesiNo"]);
        $this->param["devamDurumu"] = (isset($this->param["devamsizOnay"])&&$this->param["devamsizOnay"]=="on")?$this->param["DevamDurumu"]:"";
        $this->param["donemId"] = $this->Term_model->FindActiveTerm()["id"];
        $id = $this->Student_model->Create(ExtractParameter($this->param,["katilimBelgesiNo","adSoyad","cinsiyet","dogumTarihi","dogumYeri","okulId","sinifId","ttkdKatilimFormu","ebaId","devamDurumu","Mezun","donemId"],true));
        $this->TermRecord_model->Create(["ogrenciId"=>$id,"donem"=>$this->Term_model->FindActiveTerm()["id"]]);
        if($id != null){
            $stu = $this->Student_model->ReadDetailSingle(["id"=>$id]);
            $sinifAd = (($this->param["sinif"])??"")."-".(($this->param["sube"])??"");
            $sinifId = $this->Class_model->ClassControl(["sinifAdi"=>$sinifAd,"okulId"=>$this->param["okulId"],"donemId"=>$stu["donemId"]]);
            $this->Student_model->Update(["id"=>$id],["sinifId"=>$sinifId]);
        }
        redirect(base_url("Students/StudentEdit/".$id));
    }
    protected function Edit(){
       
        $sinifAd = (($this->param["sinif"])??"")."-".(($this->param["sube"])??"");
        $stu = $this->Student_model->ReadDetailSingle(["id"=>$this->param["id"]]);
        $this->param["sinifId"] = $this->Class_model->ClassControl(["sinifAdi"=>$sinifAd,"okulId"=>$this->param["okulId"],"donemId"=>$stu["donemId"]]);
        $this->param["devamDurumu"] = (isset($this->param["devamsizOnay"])&&$this->param["devamsizOnay"]=="on")?$this->param["devamDurumu"]:null;
        $this->Student_model->Update(["id"=>$this->param["id"]],ExtractParameter($this->param,["katilimBelgesiNo","adSoyad","cinsiyet","dogumTarihi","dogumYeri","okulId","sinifId","ttkdKatilimFormu","ebaId","devamDurumu","Mezun"],true));
        redirect(base_url("Students/"));
    }
    protected function Delete(){
        $this->Student_model->Delete(["id"=>$this->param["id"]]);
    }
}