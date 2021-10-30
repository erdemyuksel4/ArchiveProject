<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller
{
    public $page = "Report";
    public function __construct(){
        parent::__construct();
        $this->load->model("Teacher_model");
        $this->load->model("Place_model");
        $this->load->model("School_model");
        $this->load->model("Absence_model");
        $this->load->model("User_model");
        $this->load->model("Find_model");
        $this->load->model("Grade_model");
        $this->load->model("Term_model");
        $this->load->model("TermRecord_model");
        $this->load->model("Student_model");
        
        exit("Hazır Değil");
    }
    public function Report(){
        $sess = $this->session->userdata("Account");
        $this->param["donemId"] = $this->param["donemId"]??$this->Term_model->FindActiveTerm()["id"];
        $this->param["donem"] = $this->param["donem"]??1;
        $data["bilgiler"] = $this->BringStudent();
        if($sess["data"]["yetkiId"]==6){
            $this->load->view("Find/find.php",["donemler"=>$this->Term_model->Read(),"location"=>"Reports/InterimSchoolReport","filtre"=>$this->param]);
        }else if ($sess["data"]["yetkiId"]==1){
            $this->load->view("Find/find.php",["donemler"=>$this->Term_model->Read(),"location"=>"Reports/InterimSchoolReport","filtre"=>$this->param]);
        }
        return $data;
    }
    public function SchoolReport(){
        
        /* $s = $this->session->userdata("Account")["data"];
        $this->load->view("Find/find.php",["donemler"=>$this->Term_model->Read(),"location"=>"Reports/SchoolReport"]);
        if($s["yetkiId"]==6){
            $this->load->view("Pages/Reports/schoolReport.php",["data"=>$this->SchoolReportData()]);
        } */
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
        
        if(!is_null($this->param["ogrenciId"])){
            $get = $this->Find_model->Find("Student",["id"=>$this->param["ogrenciId"]]);
        }else if(!is_null($this->param["sinif"])){
            $get = $this->Find_model->Find("Student",["sinif"=>$this->param["sinif"]]);
        }else if (!is_null($this->param["okulId"])){
            $get = $this->Find_model->Find("Student",["okulId"=>$this->param["okulId"]]);
        }else if (!is_null($this->param["yerId"])){
            $okul = $this->School_model->ReadDetail(["yerId"=>$this->param["yerId"]]);
            $get = [];
            foreach ($okul as $key => $value) {
                $get =  array_merge($get,$this->Find_model->Find("Student",["okulId"=>$value["id"]]));
            }
        }else if (!is_null($this->param["bolgeId"])){
            $okul = $this->School_model->ReadDetail(["bolgeId"=>$this->param["bolgeId"]]);
            $get= [];
            foreach ($okul as $key => $value) {
                $get =  array_merge($get,$this->Find_model->Find("Student",["okulId"=>$value["id"]]));
            }
        }else{
            $get = $this->Find_model->Find("Student");
        }

        return $get;
    }
    public function InterimSchoolReport(){
        $this->load->view("Pages/Reports/arakarne.php",$this->Report());
    }
    public function CertificateOfParticipiant(){
        $this->load->view("Pages/Reports/certif.html");
    }
    public function Permit(){
        $this->load->view("Pages/Reports/permit.html");
    }
    public function StudentForm(){
        $this->load->view("Pages/Reports/ogrencikayit.php",$this->Report());
    }
    public function ThreeMonthReport(){
        $this->load->view("Pages/Reports/rapor3aylik.html");
    }
    public function YearEndReport(){
        $this->load->view("Pages/Reports/senesonu.html");
    }
    public function TravelAllowance(){
        $this->load->view("Pages/Reports/yolluk.html");
    }
    public function AcademicCalender(){
        $this->load->view("Pages/Reports/akademiktakvim.html");
    }
    public function Projects(){
        $this->load->view("Pages/Reports/projeler.html");
    }
    public function Attache(){
        $this->load->view("Pages/Reports/atasebilgiformu.html");
    }
    public function RecordLesson(){
        $this->load->view("Pages/Reports/derskayit.html");
    }
    public function StudentStatics(){
        $this->load->view("Pages/Reports/ogrenciistatik.php",["data"=>$this->StudentStatData()]);
    }
    public function AttendanceList(){
        $this->load->view("Pages/Reports/yoklama.php",$this->Report());
    }
    public function AnnualTextbook(){
        $this->load->view("Pages/Reports/yillik.html");
    }

}
