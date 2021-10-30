<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Schools extends MY_Controller
{
    public $page = "School";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Area_model");
        $this->load->model("Place_model");
        $this->load->model("Class_model");
        $this->load->model("Image_model");
        $this->load->model("School_model");
        $this->load->model("Teacher_model");
        $this->load->model("Student_model");
        $this->load->model("Find_model");
        $this->load->model("TOAB_model");
        $this->load->model("TOABOVT_model");
    }
    public function SchoolList()
    {
        $this->Find_model->LoadModel($this);
        if (isset($this->param)) {
            $data = $this->Find_model->Find("Schools", $this->param);
        }
        echo json_encode($data);
    }

    public function SchoolListWithArea()
    {
        if ($this->param["data"]) {
            $data = $this->School_model->ReadDetail(["bolgeId" => $this->param["data"]]);
        } else {
            $data = $this->School_model->Read();
        }
        foreach ($data as $key => $value) {
            $this->School_model->tur = $value["tur"];
            $data[$key]["tur"] = $this->School_model->FindSchoolType()[0] ?? "";
        }
        echo json_encode($data);
    }
    public function School()
    {
        $urls = [
            "Add" => "Schools/SchoolAdd",
            "Edit" => "Schools/SchoolEdit",
            "Delete" => "Schools/SchoolDelete",
            "Detail" => "Schools/SchoolDetail",
            "OVT" => "TOABOVT/OVT",
        ];
        $data["urls"] = $this->PagePermControlList($urls);
        $this->Find_model->LoadModel($this);
        $data["okullar"] = $this->Find_model->Find("Schools");
        foreach ($data["okullar"] as $key => $value) {
            $this->School_model->tur = $value["tur"];
            $data["okullar"][$key]["tur"] = $this->School_model->FindSchoolType()[0] ?? "";
        }
        $this->load->view("Find/findSinif.php",["donemler"=>$this->Term_model->Read(),"location"=>"Schools/School","filtre"=>$this->param]);
        $this->load->view("Pages/Main/okullar.php", $data);
    }
    public function SchoolAdd()
    {
        $data = $this->Area_model->Read();
        $okulTurleri = $this->School_model->ReadSchoolTypes();
        $this->load->view("Pages/Add/okulEkle.php", ["bolgeler" => $data, "okulTurleri" => $okulTurleri]);
    }
    public function SchoolEdit()
    {
        /*  $data = $this->School_model->ReadDetailSingle(["id"=>$this->param[0]]);

       $data["resimler"] = $this->Image_model->ImageChangeFormat($data["resimler"]);
       
       $this->TOAB_model->okulId = $data["id"];
       $toab = @$this->TOAB_model->ReadDetailWithSchool()[0];
       $data["toab"] = ($toab !==null)?$toab:array("kendiYeri"=>"","telefon"=>"","adres"=>"","binaOzellikleri"=>"");
       
       $this->TOABOVT_model->okulId = $data["id"];
       $data["ovt"] = $this->TOABOVT_model->ReadDetailWithSchool();
       
       $data["ttkds"] = $this->Student_model->FindClass($this->param[0]);
       */
        $this->Find_model->LoadModel($this);
        $data = $this->Find_model->Find("School",["id"=>$this->param[0]]);

        $data["bolgeler"] = $this->Area_model->Read();
        $data["okulTurleri"] = $this->School_model->ReadSchoolTypes();
/*         echo "<pre>";
        print_r($data);
        echo "</pre>"; */
       $this->load->view("Pages/Edit/okulDuzenle.php", $data);
    }
    public function SchoolDelete()
    {
        $data = [
            "param" => $this->param[0],
            "footerButtonText" => "Sil",
            "location" => "Schools/Delete"
        ];
        $this->load->view("Modals/Body/DeleteAgree.php", $data);
    }
    public function SchoolDetail()
    {
        $urls = [
            "Back" => "Schools",
            "Edit" => "Schools/SchoolEdit",
        ];
        $this->Find_model->LoadModel($this);
        $data = $this->Find_model->Find("School", ["id" => $this->param[0]]);
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Detail/okulDetaylari.php", $data);
    }
    protected function Edit()
    {
        if (isset($this->param["id"])) {
            $okulId =  $this->param["id"];
            $this->param["resimler"] = $this->Image_model->ImageEdit($this->param["blobs"], $this->param["okulAdi"], "school");
            $this->param["ad"] = $this->param["okulAdi"];
            $this->param["tur"] = $this->param["okulTuru"];
            $this->param["telefon"] = $this->param["telefonNumarasi"];
            $this->param["email"] = $this->param["emailAdresi"];
            $this->param["okulVeliTemsilcisi"] = $this->param["ovt"];
            $this->param["okulVeliTemsilcisiTelefon"] = $this->param["ovtTelefonNumarasi"];
            $this->param["okulVeliTemsilcisiEmail"] = $this->param["ovtEmailAdresi"];

            $this->School_model->Update(["id" => $okulId], ExtractParameter($this->param, [
                "resimler",
                "ad", "tur", "bolgeId", "yerId", "genelBilgi", "adres", "telefon", "email", "website", "okulMuduru", "okulSekreteri", "okulVeliTemsilcisi", "okulVeliTemsilcisiTelefon", "okulVeliTemsilcisiEmail"
            ], true));

            
            $toab["kendiYeri"] = ($this->param["toabKendiYeri"] == null) ? "Hayır" : $this->param["toabKendiYeri"];
            $toab["telefon"] = $this->param["toabTelefonNumarasi"];
            $toab["adres"] = $this->param["toabAdres"];
            if (isset($this->param["ozellikler"]) && is_array($this->param["ozellikler"])) {
                if (count($this->param["ozellikler"]) > 0) {
                    foreach ($this->param["ozellikler"] as $key => $value) {
                        $toab["binaOzellikleri"] .= $value . ";";
                    }
                } else {
                    $toab["binaOzellikleri"] = " ";
                }
            } else {
                $toab["binaOzellikleri"] = " ";
            }
            $this->TOAB_model->Update(["okulId"=>$okulId],$toab);
            redirect(base_url("Schools/SchoolDetail/".$okulId));
        }else{
            redirect(base_url($this->PagePermControl($this->UrlExp($this->indexHistory(1)))["Path"]));
        }
    }
    protected function Add()
    {
        if (isset($this->param)) {
            $this->School_model->ad = $this->param["okulAdi"];
            $this->School_model->resimler = $this->Image_model->ImageAdd($this->param["blobs"], $this->School_model->ad, "school");
            $this->School_model->tur = $this->param["okulTuru"] ?? "";
            $this->School_model->bolgeId = $this->param["bolgeId"];
            $this->School_model->yerId = $this->param["yerId"];
            $this->School_model->genelBilgi = $this->param["genelBilgi"];
            $this->School_model->adres = $this->param["adres"];
            $this->School_model->telefon = $this->param["telefonNumarasi"];
            $this->School_model->email = $this->param["emailAdresi"];
            $this->School_model->website = $this->param["webSitesi"];
            $this->School_model->okulMuduru = $this->param["okulMuduru"];
            $this->School_model->okulSekreteri = $this->param["okulSekreteri"];
            $this->School_model->okulVeliTemsilcisi = $this->param["ovt"];
            $this->School_model->okulVeliTemsilcisiTelefon = $this->param["ovtTelefonNumarasi"];
            $this->School_model->okulVeliTemsilcisiEmail = $this->param["ovtEmailAdresi"];
            $okulId = $this->School_model->Create();

            $this->TOAB_model->okulId = $okulId;
            $this->TOAB_model->kendiYeri = $this->param["toabKendiYeri"];
            $this->TOAB_model->telefon = $this->param["toabTelefonNumarasi"];
            $this->TOAB_model->adres = $this->param["toabAdres"];
            if (isset($this->param["ozellikler"]) and is_array($this->param["ozellikler"])) {
                if (count($this->param["ozellikler"]) > 0) {
                    foreach ($this->param["ozellikler"] as $key => $value) {
                        $this->TOAB_model->binaOzellikleri .= $value . ";";
                    }
                } else {
                    $this->TOAB_model->binaOzellikleri = " ";
                }
            } else {
                $this->TOAB_model->binaOzellikleri = " ";
            }
            $this->TOAB_model->Create();

            redirect(base_url("Schools"));
        }
    }
    protected function Delete()
    {
        $this->School_model->Delete(["id" => $this->param["id"]]);
    }
}
