<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function LoadModel($t){
        foreach($t->load->getModelList() as $m){
            if($m != "Find_model"){
                $model = implode(explode("_model",$m));
                $this->$model = $t->$m;
            }
        }
        $this->param = $t->param;
    }
    function SubDir_Unique(Array $arr, String $s){
        $g = [];
        foreach ($arr as $key => $value) {
            $g[] = $value[$s];
        }
        $g = array_unique($g);
        $r = [];
        foreach ($g as $key => $value) {
            if(isset($arr[$value])){
                $r[$value] = $arr[$value];
            }
        }
        return $r;
    }
    public function FindStudentWithTeacher($filter = []) {
        $okullar = $this->Teacher->FindSchoolsOfTeacher($filter);
        $get= [];
        foreach($okullar as $okul){
            $get = array_merge($get,$this->Student->ReadDetail(["okulId"=>$okul]));
        }
        foreach ($get as $k => $v) {
            foreach ($filter as $key => $value) {
                if($v[$key]!=$value){
                    unset($get[$k]);
                }
            }
        }
        
        return $get;
    }
    public function FindStudentWithArea($filter = []) {
        $bolge = $this->Teacher->FindAreaWithTeacher();
        $okullar = $this->School->ReadDetail(["bolgeId"=>$bolge]);
        $get= [];
        foreach($okullar as $okul){
            $get = array_merge($get,$this->Student->ReadDetail(["okulId"=>$okul]));
        }
        foreach ($get as $k => $v) {
            foreach ($filter as $key => $value) {
                if($v[$key]!=$value){
                    unset($get[$k]);
                }
            }
        }
        
        return $get;
    }
    public function AllStudents($filter = []) {
        $get = $this->Student->ReadDetail($filter);
        return $get;
    }
    public function FindStudent($filter = []) {
        $get = $this->Student->ReadDetailSingle($filter);
        return $get;
    }
    public function FindAllStudentData($o){
        $get["okulB"] = $this->School->ReadDetailSingle(["id"=>$o["okulId"]]);
        $get["devamB"] = $this->Absence->ReadDetail(["ogrenciId"=>$o["id"]]);
        $get["notB"] = $this->Grade->ReadDetail(["ogrenciId"=>$o["id"]]);
        foreach($get["notB"] as $key => $not){
            $donem = $this->Term->ReadDetailSingle(["id"=>$get["notB"][$key]["donemId"]]);
            $get["notB"][$key]["yil"] = $donem["baslangicYil"]."-".$donem["bitisYil"];
        }
        $get["dersB"] = $this->Lesson->ReadDetail(["sinifId"=>$o["sinifId"]]);
        return $get;
    }
    public function GetStudentData($get){
        foreach ($get as $key => $o) {
            $get[$key]["okulB"] = $this->School->ReadDetailSingle(["id"=>$o["okulId"]]);
            $get[$key]["ebeveynB"] = $this->Parents->ReadDetail(["ogrenciId"=>$o["id"]]);
            $get[$key]["sinifB"] = $this->Class->ReadDetailSingle(["id"=>$o["sinifId"]]);
            $this->param["tarih"] = $this->param["tarih"]??date("Y-m-d",now());
            $devam = $this->Absence->ReadDetail(["ogrenciId"=>$o["id"],"tarih"=>$this->param["tarih"]]);
            if(count($devam)==0){
                $this->param["ogrenciId"] = $o["id"];
                $this->param["tarih"] = $this->param["tarih"];
                $this->param["durum"] = "";
                unset($dat);
                $dat["ogrenciId"] = $this->param["ogrenciId"];
                $dat["tarih"] = $this->param["tarih"];
                $dat["durum"] = $this->param["durum"];
                $this->Absence->Create($dat);
                $get[$key]["devamB"] = $this->Absence->ReadDetail(["ogrenciId"=>$o["id"],"tarih"=>$this->param["tarih"]]);
            }else{
                $get[$key]["devamB"] = $devam;
            }
            $t["ogrenciId"] = $o["id"];
            if(isset($this->param["donemId"])){
                $t["donemId"] = $this->param["donemId"]??$this->Term->FindActiveTerm()["id"];
            }
            if(isset($this->param["donem"])){
                $t["donem"] = $this->param["donem"];
            }
            $nots = $this->Grade->ReadDetail($t);
            if(count($nots)==0){
                $this->param["ogrenciNot"] = "";
                $this->param["ogrenciId"] = $o["id"];
                $this->param["dersAdi"] = "TTKD";
                $this->param["donemId"] = $this->param["donemId"]??$this->Term->FindActiveTerm()["id"];
                $this->param["donem"] = $this->param["donem"]??1;
                unset($dat);
                $dat["ogrenciId"] = $this->param["ogrenciId"];
                $dat["ogrenciNot"] = $this->param["ogrenciNot"];
                $dat["dersAdi"]= $this->param["dersAdi"];
                $dat["donemId"] = $this->param["donemId"];
                $dat["donem"] = $this->param["donem"];
                $this->Grade->Create($dat);
                $get[$key]["notB"][] = $this->Grade->ReadDetailSingle(["ogrenciId"=>$o["id"],"donemId"=>$this->param["donemId"],"donem"=>$this->param["donem"]]);
            }else{
                $get[$key]["notB"] = $nots;
            }
            if(is_array(current($get[$key]["notB"]))==true&&count($get[$key]["notB"])>0){
                foreach($get[$key]["notB"] as $key2 => $not){
                    $not["yil"] = $this->Term->GetTermYear($not["donemId"]);
                    $get[$key]["notB"][$key2] = $not;
                }
            }else{
                $notB_ = $get[$key]["notB"];
                $not["yil"] = $this->Term->GetTermYear($notB_["donemId"]);
                $get[$key]["notB"][] = $not;
            }
            $get[$key]["donemB"] = $this->Term->ReadDetailSingle(["id"=>$this->param["donemId"]??$this->Term->FindActiveTerm()["id"]]);
            if($get[$key]["donemB"]["id"]!=($this->param["donemId"]??$this->Term->FindActiveTerm()["id"])){
                unset($get[$key]);
            }
            $get[$key]["dersB"] = $this->Lesson->ReadDetail(["sinifId"=>$o["sinifId"]]);
        }
        return $get;
    }
    public function AllTeacherData(){
        $stu = $this->FindStudentWithTeacher();
        $tch = $this->Teacher->FindTeacher();
    }
    public function Find($want,$filter = [],$filter2 = []){
        $sess = $this->session->userdata("Account");
        $get=[];
        switch($sess["data"]["yetkiId"]){
            case 1://Super Admin
                switch ($want){
                    case "Class":
                        $get = $this->Class->ReadDetailSingle($filter);
                        break;
                    case "School":
                        $get = $this->School->ReadDetailSingle($filter);
                        break;
                    case "Schools":
                        $get = $this->School->ReadDetail($filter);
                        break;
                    case "Classes":
                        $get = $this->Class->ReadDetail($filter);
                        break;
                    case "Area":
                        $get = $this->GetArea();
                        break;
                    case "Place":
                        $get = $this->Place->ReadDetailSingle($filter);
                        break;
                    case "Places":
                        $get = $this->Place->ReadDetail($filter);
                        break;
                    case "Schools":
                        $get = $this->GetSchoolDetail($filter);
                        break;
                    case "School":
                        $get = $this->GetSchoolDetail($filter)[0];
                        break;
                    case "Teacher": 
                        $get = $this->Teacher->ReadDetailSingle($filter);
                        break;  
                    case "Teachers":
                        $get = $this->Teacher->ReadDetail($filter);
                        break;  
                    case "Students":
                        $get = $this->AllStudents($filter);
                        $get = $this->GetStudentData($get);
                        break;
                    case "Student":
                        $get = $this->AllStudents($filter);
                        $get = $this->GetStudentData($get)[0];
                        break;
                    case "Lessons":
                        $get = $this->getLessons($filter);
                        break;
                }
                break;
            case 6://Öğretmen
                switch ($want){
                    case "Classes":
                        $get = $this->Class->ReadDetail($filter);
                        $siniflar = explode(";",$this->Teacher->FindTeacher($filter2)["siniflar"]);
                        foreach ($get as $key => $value) {
                            if(in_array($value["id"],$siniflar)==false){
                                unset($get[$key]);
                            }
                        }
                        break;
                    case "Schools":// sıkıntılı
                        $okullar = $this->School->ReadDetail(["id"=>$this->Teacher->FindTeacher()["okulId"]]);
                        foreach(explode(";",$this->Teacher->FindTeacher()["gorevYaptigiOkullar"]) as $k => $v){
                            $okullar  = array_merge($okullar ,$this->School->ReadDetail(["id"=>$v]));
                        }
                        $get = $this->SubDir_Unique($okullar,"id");
                        break;
                    case "Class":
                        $get= $this->Class->ReadDetailSingle($filter);
                        break;
                    case "Area":
                        $get = $this->GetArea(["id"=>$this->Teacher->FindTeacher()["bolgeId"]]);
                        break;
                    case "Teacher":
                        $get = $this->Teacher->ReadDetailSingle($filter);
                        break;
                    case "Teachers":
                        $get = $this->Teacher->ReadDetail($filter);
                        break;
                    case "School":
                        $get = $this->FindSchools(array_merge($filter,["bolgeId"=>$this->Teacher->FindTeacher()["bolgeId"]]));
                        break;
                    case "Students":
                        $sinif = array_filter(explode(";",$this->Teacher->FindTeacher($filter2)["siniflar"]));
                        foreach ($sinif as $key => $value) {
                            $get = array_merge($get,$this->Student->ReadDetail(["sinifId"=>$value]));
                        }
                        foreach ($get as $key => $value) {
                            if(count($filter)>0){
                                if($value[key($filter)]!=($filter[key($filter)])){
                                    unset($get[$key]);
                                }
                            }
                        }

                        $get = $this->GetStudentData($get);
                        break;
                    case "Student":
                        $get = $this->FindStudent($filter);
                        $get = $this->GetStudentData($get)[0];
                        break;
                    case "Lessons":
                        $get = $this->getLessons($filter);
                        break;
                    case "Place":
                        $get = $this->Place->ReadDetailSingle($filter);
                        break;
                    case "Places":
                        $get = $this->Place->ReadDetail($filter);
                        break;
                }
                break;
            case 8://Koordinator
                switch ($want){
                    case "Place":
                        $get = $this->Place->ReadDetailSingle($filter);
                        break;
                    case "Places":
                        $get = $this->Place->ReadDetail($filter);
                        break;
                    case "Class":
                        $get= $this->Class->ReadDetailSingle($filter);
                        break;
                    case "Classes":
                        $get = $this->Class->ReadDetail($filter);
                        foreach ($get as $key => $value) {
                            $okul = $this->School->ReadDetailSingle(["id"=>$value["okulId"]]);
                            if($okul["bolgeId"]!=$this->Teacher->FindTeacher()["bolgeId"]){
                                unset($get[$key]);
                            }
                        }
                        unset($okul);
                        break;
                    case "Schools":
                        $get = $this->GetSchoolDetail(array_merge($filter,["bolgeId"=>$this->Teacher->FindTeacher()["bolgeId"]]));
                        break;
                    case "Class":
                        $get= $this->Class->ReadDetail($filter);
                        break;
                    case "Area":
                        $get = $this->GetArea(["id"=>$this->Teacher->FindTeacher()["bolgeId"]]);
                        break;
                    case "School":
                        $get = $this->FindSchools(array_merge($filter,["bolgeId"=>$this->Teacher->FindTeacher()["bolgeId"]]));
                        break;
                    case "Teacher":
                        $get = $this->Teacher->ReadDetailSingle(array_merge($filter,["bolgeId"=>$this->Teacher->FindTeacher()["bolgeId"]]));
                        break;
                    case "Teachers":
                        if($this->Teacher->FindTeacher()["bolgeId"] != null&&$this->Teacher->FindTeacher()["bolgeId"]!=0){
                            $get = $this->Teacher->ReadDetail(array_merge($filter,["bolgeId"=>($this->Teacher->FindTeacher()["bolgeId"]==0)??""]));
                        }
                        break;
                    case "Student":
                        $get = $this->GetStudents($filter);
                        $get = $this->GetStudentData($get)[0];
                        break;
                    case "Students":
                        if(isset($filter["yerId"])){
                            $okul = $this->School->ReadDetail(["yerId"=>$filter["yerId"]]);
                            foreach ($okul as $key => $value) {
                                $get =  array_merge($get,$this->GetStudents(array_merge($filter,["okulId"=>$value["id"]])));
                            }
                            $get = $this->GetStudentData($get);
                        }else if(isset($filter["okulId"])){
                            $get =  array_merge($get,$this->GetStudents(array_merge($filter,["okulId"=>$filter["okulId"]])));                            
                            $get = $this->GetStudentData($get);
                        }else if(isset($filter["sinifId"])){
                            $get = $this->Student->ReadDetail(["sinifId"=>$filter["sinifId"]]);
                            $get = $this->GetStudentData($get);
                        }else if(isset($filter["ogrenciId"])){
                            $get =  array_merge($get,$this->GetStudents(array_merge($filter,["ogrenciId"=>$filter["ogrenciId"]])));                            
                            $get = $this->GetStudentData($get);
                        }else{
                            $okul = $this->School->ReadDetail(["bolgeId"=>$this->Teacher->FindTeacher()["bolgeId"]]);
                            foreach ($okul as $key => $value) {
                                $get =  array_merge($get,$this->GetStudents(array_merge($filter,["okulId"=>$value["id"]])));
                            }
                            $get = $this->GetStudentData($get);
                        }
                        break;
                    case "Lessons":
                        $get = $this->getLessons($filter);
                        break;
                }
                break;
            case 7://Musaviri
                switch ($want){
                    case "Place":
                        $get = $this->Place->ReadDetailSingle($filter);
                        break;
                    case "Places":
                        $get = $this->Place->ReadDetail($filter);
                        break;
                    case "Class":
                        $get = $this->Class->ReadDetailSingle($filter);
                        break;
                    case "Classes":
                        $get = $this->Class->ReadDetail($filter);
                        break;
                    case "Area":
                        $get = $this->GetArea();
                        break;
                    case "Schools":
                        $get = $this->GetSchoolDetail($filter);
                        break;
                    case "School":
                        $get = $this->GetSchoolDetail($filter)[0];
                        break;
                    case "Teacher": 
                        $get = $this->Teacher->ReadDetailSingle($filter);
                        break;  
                    case "Teachers":
                        $get = $this->Teacher->ReadDetail($filter);
                        break;
                    case "Students":
                        $get = $this->AllStudents($filter);
                        $get = $this->GetStudentData($get);
                        break;
                    case "Student":
                        $get = $this->AllStudents($filter);
                        $get = $this->GetStudentData($get)[0];
                        break;
                    case "Lessons":
                        $get = $this->getLessons($filter);
                        break;
                }
                break;
            }
        return $get;
    }
    
    public function GetSchoolDetail($filter){
        $get = $this->FindSchools($filter);
        foreach ($get as $key => $value) {
            $get[$key]["bolgeAdi"] = $this->Area->ReadDetailSingle(["id"=>$get[$key]["bolgeId"]])["bolgeAdi"];
            $get[$key]["yerAdi"] = $this->Place->ReadDetailSingle(["id"=>$get[$key]["yerId"]])["yerAdi"];
            
            $get[$key]["okulTuru"] = $this->School->FindSchoolType()[0]["turAdi"]??"";
    
            $get[$key]["ttkds"] = $this->Class->ReadDetail(["okulId"=>$get[$key]["id"]]);
    
            $get[$key]["toab"] = isset($this->TOAB->ReadDetailWithSchool($value["id"])[0])?$this->TOAB->ReadDetailWithSchool($value["id"])[0]:array("kendiYeri"=>"","telefon"=>"","adres"=>"","binaozellikleri"=>"");
    
            $get[$key]["ovt"] = $this->TOABOVT->ReadDetailWithSchool();
            $get[$key]["resimler"] = $this->Image->ImageChangeFormat($get[$key]["resimler"]); 
        }
        return $get;
    }
    public function FindSchools($filter = []){
        $get = $this->School->ReadDetail($filter);
        foreach ($get as $k => $v) {
            foreach ($filter as $key => $value) {
                if($v[$key]!=$value){
                    unset($get[$k]);
                }
            }
        }
        return $get;
    }
    public function GetArea(Array $filter = []){
        return $this->Area->ReadDetail($filter);
    }
    public function GetStudents($filter = []){
        return $this->Student->ReadDetail($filter);
    }
    public function GetTeacherData($filter = []){
        return $this->Teacher->ReadDetail($filter);
    }
    public function getLessons($filter = []){
        return $this->Lesson->ReadDetail($filter);
    }
}