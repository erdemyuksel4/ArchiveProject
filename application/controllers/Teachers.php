<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teachers extends MY_Controller
{
    public $page = "Teacher";
    public function __construct(){
        parent::__construct();
        $this->load->model('Teacher_model');
        $this->load->model('School_model');
        $this->load->model('Area_model');
        $this->load->model('Place_model');
        $this->load->model('Knowledge_model');
        $this->load->model('Vaccine_model');
        $this->load->model('Language_model');
        $this->load->model('Certificate_model');
        $this->load->model('Find_model');
        $this->load->model('TGOK_model');
        $this->load->model('OYDG_model');
    }
    public function TeacherList(){
        $ses = $this->session->userdata("Account");
        $this->Find_model->LoadModel($this);
        if (isset($this->param)) {
            $data = $this->Find_model->Find("Teachers",$this->param,["kullaniciId"=>$ses["data"]["id"]]);
        }
        echo json_encode($data);
    }
    public function BringTeacher(){
        $ses = $this->session->userdata("Account");
        $this->param["ogretmenId"] = $this->param["ogretmenId"]??null;
        $this->param["okulId"] = $this->param["okulId"]??null;
        $this->param["bolgeId"] = $this->param["bolgeId"]??null;
        
        $this->session->set_userdata("param",$this->param);
        $this->Find_model->LoadModel($this);
        
        if(!is_null($this->param["ogretmenId"])&&""!=trim($this->param["ogretmenId"])){
            $get = $this->Find_model->Find("Teachers",["id"=>$this->param["ogretmenId"]],["kullaniciId"=>$ses["data"]["id"]]);
        }else if (!is_null($this->param["okulId"])&&""!=trim($this->param["okulId"])){
            $get = $this->Find_model->Find("Teachers",["okulId"=>$this->param["okulId"]],["kullaniciId"=>$ses["data"]["id"]]);
        }else if (!is_null($this->param["bolgeId"])&&""!=trim($this->param["bolgeId"])){
            $get = $this->Find_model->Find("Teachers",["bolgeId"=>$this->param["bolgeId"]],["kullaniciId"=>$ses["data"]["id"]]);
        }else{
            $get = $this->Find_model->Find("Teachers",[],["kullaniciId"=>$ses["data"]["id"]]);
        }
        return $get;
    }
    public function Teacher(){
        $sess = $this->session->userdata("Account");
        $urls = [
            "Add"=>"Teachers/TeacherAdd",
            "Edit"=>"Teachers/TeacherEdit",
            "Delete"=>"Teachers/TeacherDelete",
            "Detail"=>"Teachers/TeacherDetail",
        ];
        $data["ogretmenler"] = $this->BringTeacher();
        $this->load->view("Find/findTeacher.php",["location"=>"Teachers/Teacher","filtre"=>$this->param]);
        foreach ($data["ogretmenler"] as $key => $value) {
            
            $okul = $this->School_model->ReadDetailSingle(array("id" => $value["okulId"]));
            $data["ogretmenler"][$key]["okulAdi"] = $okul["ad"];
            
            $bolge = $this->Area_model->ReadDetailSingle(["id"=>$value["bolgeId"]]);
            $data["ogretmenler"][$key]["gorevBolgesi"] = $bolge["bolgeAdi"];
        }
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Main/ogretmenler.php", $data );
    }
    public function TeacherAdd(){
        $data["bolgeler"] = $this->Area_model->Read();
        $this->load->view("Pages/Add/ogretmenEkle.php",$data);
    }
    public function TeacherEdit(){
        if(isset($this->param[0])){
            $data = $this->Teacher_model->ReadDetailSingle(array("id"=>$this->param[0]));
            $data["bolgeler"] = $this->Area_model->Read();
            $data["GorevliOlduguKurumlar"] = array_filter(explode(";",$this->Teacher_model->ReadDetailSingle(array("id"=>$this->param[0]))["gorevYaptigiOkullar"]));
            $data["OYDG"] = $this->OYDG_model->ReadDetail(array("ogretmenId"=>$this->param[0]));
            $data["TGOK"] = $this->TGOK_model->ReadDetailSingle(array("ogretmenId"=>$this->param[0]));
            $data["Vaccine"] = $this->Vaccine_model->ReadDetail(array("ogretmenId"=>$this->param[0]));
            $data["Lang"] = $this->Language_model->ReadDetail(array("ogretmenId"=>$this->param[0]));
            $this->load->view("Pages/Edit/ogretmenDuzenle.php",$data);
        }
    }
    public function TeacherDetail(){
        $this->Teacher_model->id = $this->param[0];
        $data = $this->Teacher_model->ReadDetailSingle(array("id"=>$this->Teacher_model->id));

        $this->School_model->id= $data["okulId"];
        $data["okulAdi"] = $this->School_model->ReadDetailSingle(array("id"=>$this->School_model->id))["ad"];

        $this->Area_model->id= $data["bolgeId"];
        $data["bolgeAdi"] = $this->Area_model->ReadDetailSingle(["id"=>$data["bolgeId"]])["bolgeAdi"];

        $this->Place_model->id= $data["yerId"];
        $data["yerAdi"] = $this->Place_model->ReadDetailSingle(["id"=>$data["yerId"]])["yerAdi"];
        $ad = [];
        if(strlen($data["gorevYaptigiOkullar"])>2){
            foreach (array_filter(explode(";",$data["gorevYaptigiOkullar"])) as $value){
                $ad[] = $this->School_model->ReadDetailSingle(array('id' =>$value))["ad"];
            }
        }
        $data["gorevYaptigiOkullar"] = $ad;
        $data["TGOK"] = $this->TGOK_model->ReadDetailSingle(array('ogretmenId' =>$this->param[0]));
        $data["OYDG"] = $this->OYDG_model->ReadDetail(array('ogretmenId' =>$this->param[0]));
        $data["Vaccine"] = $this->Vaccine_model->ReadDetail(array('ogretmenId' =>$this->param[0]));
        $data["Lang"] = $this->Language_model->ReadDetail(array('ogretmenId' =>$this->param[0]));

        $this->load->view("Pages/Detail/ogretmenDetaylari.php",$data);
    }
    public function TeacherDelete(){
        $data = [
            "footerButtonText"=>"Sil",
            "location"=>"Teachers/Delete",
            "param"=>$this->param[0]
        ];
        $this->load->view("Modals/Body/DeleteAgree.php",$data);
    }
    protected function Add(){

        $this->Teacher_model->bolgeId = $this->param["bolgeId"];
        $this->Teacher_model->olusturulmaTarihi = now();
        $this->Teacher_model->yerId = $this->param["yerId"];
        $this->Teacher_model->okulId = $this->param["okulId"];
        $this->Teacher_model->adSoyad = $this->param["adSoyad"];
        $this->Teacher_model->tckn = $this->param["tckn"];
        $this->Teacher_model->website = $this->param["website"];
        $this->Teacher_model->email = $this->param["email"];
        $this->Teacher_model->dogumTarihi = $this->param["dogumTarihi"];
        $this->Teacher_model->dogumYeri = $this->param["dogumYeri"];
        $this->Teacher_model->telefon = $this->param["telefon"];
        $this->Teacher_model->yurtDisiGorevBaslangic = $this->param["yurtDisiGorevBaslangic"];
        $this->Teacher_model->gorevde = $this->param["gorevde"];
        $this->Teacher_model->yolluk = $this->param["yolluk"];
        $this->Teacher_model->genelBilgi = $this->param["genelBilgi"];
        $this->Teacher_model->almanyaIkametgah = $this->param["almanyaIkametgah"];
        $this->Teacher_model->turkiyeIkametgah = $this->param["turkiyeIkametgah"];
        $this->Teacher_model->gorevYaptigiOkullar = "";
        
        
        $id = $this->Teacher_model->Create();
        redirect(base_url("Teachers/TeacherEdit/$id")); 
    }
    protected function Edit(){
        if(isset($this->param["GorevliOlduguOkullar"])):
            foreach ($this->param["GorevliOlduguOkullar"] as $key => $value) {
                $this->Teacher_model->gorevYaptigiOkullar .= $value.";";
            }
            $this->param["gorevYaptigiOkullar"] = $this->Teacher_model->gorevYaptigiOkullar;
        else:
            $this->param["gorevYaptigiOkullar"] = "";
        endif;

        $this->TGOK_model->Delete(array("ogretmenId"=>$this->param[0]));    
        $this->param["TGOK"]["ogretmenId"] =$this->param[0];
        $this->param["TGOK"]["telefon"] =$this->param["TGOKTelefon"];
        $this->param["TGOK"]["email"] =$this->param["TGOKEmail"];
        $this->param["TGOK"]["adres"] =$this->param["TGOKAdres"];
        $this->param["TGOK"]["website"] =$this->param["TGOKWebsite"];
        unset($this->param[0]);
        $this->TGOK_model->Create(ExtractParameter($this->param["TGOK"], ["ogretmenId","telefon","email","adres","website"],true));
        $this->param[0] = $this->param["TGOK"]["ogretmenId"];
        //Önceki Yurt Dışı görev bilgisi temizle ve yenilerini kaydet
        $this->OYDG_model->Delete(array("ogretmenId"=>$this->param[0]));
        
        if (isset($this->param["OYDG"])) {
        
            $l = @array_chunk($this->param["OYDG"],2);
            $this->OYDG_model->ogretmenId = $this->param[0];
            if(count($l) > 0){

                foreach ($l as $key => $value) {
                    $this->OYDG_model->yil = $value[1];
                    $this->OYDG_model->ulke = $value[0];
                    $this->OYDG_model->Create(); 
                }
            }

        }

        //Aşı bilgileri kaydet
        $this->Vaccine_model->Delete(array("ogretmenId"=>$this->param[0]));

        if (isset($this->param["Asi"])) {

            $this->Vaccine_model->ogretmenId = $this->param[0];
            foreach (($this->param["Asi"]) as $key => $value) {
                $this->Vaccine_model->asiAdi = $value;
                $this->Vaccine_model->Create(); 
            }
            $this->Language_model->Delete(array("ogretmenId"=>$this->param[0]));
            $this->Language_model->ogretmenId = $this->param[0];
            if(isset($this->param["dil"])){
               $c = array_chunk($this->param["dil"],2);
               foreach ($c as $key => $value) {
                   $this->Language_model->dil = $value[0];
                   $this->Language_model->seviye = $value[1];
                   $this->Language_model->Create();
               }
            }
        }
        $this->Teacher_model->Update(
            array("id"=>$this->param[0]),
            ExtractParameter($this->param,[
                    "gorevYaptigiOkullar",
                    "bolgeId",
                    "yerId",
                    "okulId",
                    "adSoyad",
                    "tckn",
                    "website",
                    "email",
                    "dogumTarihi",
                    "dogumYeri",
                    "telefon",
                    "yurtDisiGorevBaslangic",
                    "gorevde",
                    "yolluk",
                    "genelBilgi",
                    "almanyaIkametgah",
                    "turkiyeIkametgah",
                    "turkiyeEhliyeti",
                    "almanyaEhliyeti"],true));
        redirect(base_url("Teachers/"));
    }
    protected function Delete(){
        $this->Teacher_model->Delete(["id"=>$this->param["id"]]);
    }
}
