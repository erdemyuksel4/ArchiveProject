<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Classes extends MY_Controller
{
    public $page = 'Class';
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Class_model");
        $this->load->model("Term_model");
        $this->load->model("Find_model");
        $this->load->model("Student_model");
        $this->load->model("School_model");
        $this->load->model("Parents_model");
        $this->load->model("Absence_model");
        $this->load->model("Grade_model");
        $this->load->model("Lesson_model");
        $this->load->model("Area_model");
        $this->load->model("Place_model");
        $this->load->model("TOAB_model");
        $this->load->model("TOABOVT_model");
        $this->load->model("Image_model");
        $this->load->model("Teacher_model");
    }
    public function BringClass()
    {
        $ses = $this->session->userdata("Account");
        $this->param["donemId"] = $this->param["donemId"] ?? $this->Term_model->FindActiveTerm()["id"];
        $this->param["sinif"] = $this->param["sinif"] ?? null;
        $this->param["okulId"] = $this->param["okulId"] ?? null;
        $this->param["yerId"] = $this->param["yerId"] ?? null;
        $this->param["bolgeId"] = $this->param["bolgeId"] ?? null;

        $this->session->set_userdata("param", $this->param);
        $this->Find_model->LoadModel($this);

        if (!is_null($this->param["sinif"]) && "" != trim($this->param["sinif"])) {
            $get = $this->Find_model->Find("Classes", ["id" => $this->param["sinif"]], ["kullaniciId" => $ses["data"]["id"]]);
        } else if (!is_null($this->param["okulId"]) && "" != trim($this->param["okulId"])) {
            $get = $this->Find_model->Find("Classes", ["okulId" => $this->param["okulId"]], ["kullaniciId" => $ses["data"]["id"]]);
        } else if (!is_null($this->param["yerId"]) && "" != trim($this->param["yerId"])) {
            $okul = $this->School_model->ReadDetail(["yerId" => $this->param["yerId"]]);
            $get = [];
            foreach ($okul as $key => $value) {
                $get =  array_merge($get, $this->Find_model->Find("Classes", ["okulId" => $value["id"]], ["kullaniciId" => $ses["data"]["id"]]));
            }
        } else if (!is_null($this->param["bolgeId"]) && "" != trim($this->param["bolgeId"])) {
            $okul = $this->School_model->ReadDetail(["bolgeId" => $this->param["bolgeId"]]);
            $get = [];
            foreach ($okul as $key => $value) {
                $get =  array_merge($get, $this->Find_model->Find("Classes", ["okulId" => $value["id"]], ["kullaniciId" => $ses["data"]["id"]]));
            }
        } else {
            $get = $this->Find_model->Find("Classes", [], ["kullaniciId" => $ses["data"]["id"]]);
        }
        return $get;
    }
    public function TeacherClassAdd()
    {
        $t = $this->Teacher_model->ReadDetailSingle(["id" => $this->param[0]]);

        $siniflar = [];
        $okullar  = array_unique(array_merge(array_filter(explode(";", $t["gorevYaptigiOkullar"])), [$t["okulId"]]));
        foreach ($okullar as $key => $value) {
            $siniflar = array_merge($siniflar, $this->Class_model->ReadDetail(["okulId" => $value]));
        }
        foreach ($siniflar as $key => $value) {
            $siniflar[$key]["okul"] = $this->School_model->ReadDetailSingle(["id" => $value["okulId"]]);
        }
        $data = [
            "footerButtonText" => "Kaydet",
            "location" => "Classes/TeacherAdd",
            "siniflar" => $siniflar,
            "ogretmen" => $t
        ];
        $this->load->view("Pages/Add/ogretmensinif.php", $data);
    }
    protected function TeacherAdd()
    {
        if ($this->param["sinifId"] && $this->param["ogretmenId"]) {
            $ys = $this->param["sinifId"];
            $ogretmenId = $this->param["ogretmenId"];
            $siniflar = array_filter(array_unique(explode(";", $this->Teacher_model->ReadDetailSingle(["id" => $ogretmenId])["siniflar"])));
            if (in_array($ys, $siniflar) == false) {
                $siniflar[] = $ys;
                $this->Teacher_model->Update(["id" => $ogretmenId], ["siniflar" => implode(";", $siniflar)]);
            }
        }
    }
    public function TeacherClass()
    {
        $urls = [
            "Add" => "Classes/TeacherClassAdd",
            "Detail" => "Classes/ClassDetail",
            "Delete" => "Classes/TeacherClassDelete"
        ];
        $this->Find_model->LoadModel($this);
        $data["ogretmen"] = $this->Find_model->Find("Teacher", ["id" => $this->param[0]]);
        $siniflar = @array_filter(explode(";", $data["ogretmen"]["siniflar"]));
        if (is_array($siniflar) && count($siniflar) > 0) {
            foreach ($siniflar as $key => $value) {
                $siniflar[$key] = $this->Find_model->Find("Class", ["id" => $value]);
            }
        }
        $data["ogretmen"]["siniflar"]  = $siniflar;
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Main/ogretmensinif.php", $data);
    }
    public function Class()
    {
        $sess = $this->session->userdata("Account");
        $urls = [
            "Add" => "Classes/ClassAdd",
            "Edit" => "Classes/ClassEdit",
            "Delete" => "Classes/ClassDelete",
            "Detail" => "Classes/ClassDetail",
        ];
        $this->param["donemId"] = $this->param["donemId"] ?? $this->Term_model->FindActiveTerm()["id"];
        $this->param["donem"] = $this->param["donem"] ?? 1;
        $data["siniflar"] = $this->BringClass();
        $this->load->view("Find/findSinif.php", ["donemler" => $this->Term_model->Read(), "location" => "Classes/Class", "filtre" => $this->param]);
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Main/sinif.php", $data);
    }
    public function ClassList()
    {
        $ses = $this->session->userdata("Account");
        $this->Find_model->LoadModel($this);
        if ($this->param) {
            $filtre = [];
            if (!is_array($this->param)) {
                foreach (json_decode($this->param) as $key => $value) {
                    $filtre[$value->key] = $value->value;
                }
            } else {
                $a = $this->param;
                $filtre  =array_merge($filtre,$a);
            }
            echo json_encode($this->Find_model->Find("Classes", $filtre, ["kullaniciId" => $ses["data"]["id"]]));
        }
    }
    public function ClassDetail()
    {
        $this->Find_model->LoadModel($this);
        $p = [
            "Detail" => "Students/StudentDetail",
            "Back" => "Classes",
            "Add" => "Lessons/LessonDetail"
        ];
        $data["sinifB"] = $this->Find_model->Find("Class", ["id" => $this->param[0]]);
        $data["ogrenciler"] = $this->Find_model->Find("Students", ["sinifId" => $this->param[0]]);
        $data["dersler"] = $this->Find_model->Find("Lessons", ["sinifId" => $this->param[0]]);
        $data["urls"] = $this->PagePermControlList($p);
        $this->load->view("Pages/Detail/sinif.php", $data);
    }
    public function TeacherClassDelete()
    {
        if ($this->param[0]) {
            $data = [
                "location" => "Classes/TeacherDelete",
                "footerButtonText" => "Sil",
                "param" => $this->param[0]
            ];
            $this->load->view("Modals/Body/DeleteAgree.php", $data);
        }
    }
    protected function TeacherDelete()
    {
        if ($this->param["id"]) {
            $a = explode("-", $this->param["id"]);
            $siniflar = array_filter(array_unique(explode(";", $this->Teacher_model->ReadDetailSingle(["id" => $a[0]])["siniflar"])));
            foreach ($siniflar as $key => $sinif) {
                if ($a[1] == $sinif) {
                    unset($siniflar[$key]);
                }
            }
            $this->Teacher_model->Update(["id" => $a[0]], ["siniflar" => implode(";", $siniflar)]);
        }
    }
}
