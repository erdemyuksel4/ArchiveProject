<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $param;
    public $page;
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Page_model");
        $this->load->library("session");
        $this->load->helper("url");
        $this->load->helper("myuri");
        $this->load->helper('date');
        $this->load->helper("param");
        $this->load->helper("image");
        if (empty($this->session->userdata('Account'))) {
            redirect(base_url("Account"));
        } else {
            $this->PermControl();
        }

    }

    
    public function _remap($page, $param)
    {
        if (method_exists($this, $page)) {
            $this->page = $page;
        } else {
            if (isset($page) && strlen($page) > 0 && $page != "index") {
                $param = [$page];
            } else {
                $param = [];
            }
        }
        $this->param = extJSONParam(array_merge($this->input->get(),$this->input->post(), $param));
        
        $this->Load($this->page);
    }
    public function getHistory()
    {
        $h = $_SESSION["History"] ?? null;
        if ($h == null || !(count($h)>2)) {
            $this->setHistory();
        } else {
            return $h;
        }
        return $this->getHistory();
    }
    public function setHistory($hist = null)
    {
        if ($hist == null) {
            $_SESSION["History"][] =  getCurrentUrl();
        } else {
            if($this->indexHistory()!=$hist){
                $_SESSION["History"][] = $hist;
            }
        }
    }
    public function delHistory($id){
        unset($_SESSION["History"][$id]);
    }
    public function indexHistory(int $a = 0)
    {
        switch ($a) {
            case 0: //current
                $b = $this->getHistory();
                $b = end($b);
                break;
            case 1: //pre
                $b = $this->getHistory();
                end($b);
                $b = prev($b);
                break;
            case 2: //pre unique
                $b = $this->getHistory();
                $b = array_unique($b);
                end($b);
                $b = prev($b);
                break;
            default: //current
                $b = $this->getHistory();
                $b = end($b);
                break;
        }
        return $b;
    }
    public function Load($page = "")
    {
        if (isset($this->param["modal"])) {
            $this->Load_Modal($page);
        } else if (isset($this->param["page"])) {
            unset($this->param["page"]);
            $this->engel = "";
            $this->Load_Page();
        } else {
            if(!isset($this->param["Back"])){
                $this->setHistory(getCurrentUrl());
            }else{
                $this->delHistory(array_key_last($this->getHistory()));
            }
            $this->Load_Page_Header();
            $this->Load_Page($page);
            $this->Load_Page_Footer();
        }
    }
    public function Load_Page()
    {
        $page = $this->page;
        $this->$page($this->param);
    }
    /* Modal yükler*/
    public function Load_Modal($page)
    {
        $this->Load_Modal_Header();
        $this->$page();
        $this->Load_Modal_Footer();
    }
    /* Sayfa için header yükler */
    public function Load_Page_Header()
    {
        $back = $this->UrlExp($this->indexHistory(1));
        $data["urls"] = [
            "Back" => $back["Path"],
        ];
        $data["urls"] = $this->PagePermControlList($data["urls"]);
        $this->load->view("dependencies/header.php", array_merge($data,$this->param??[]));
    }
    /* Sayfa için footer yükler*/
    public function Load_Page_Footer()
    {
        $this->load->view("dependencies/footer.php", $this->param);
    }
    /* Modal için header yükler */
    public function Load_Modal_Header()
    {

        $this->load->view("Modals/Header.php", $this->param);
    }
    /* Modal için footerı yükler */
    public function Load_Modal_Footer()
    {
        $this->load->view("Modals/Footer.php", $this->param);
    }
    /* Kullanıcı oturum verilerini alır */
    public function GetUserData()
    {
        return $this->session->userdata("Account")["data"];
    }
    /* Ana ve alt Sayfalara erişim kontrolü yapar*/
    public function ControlSubPages(array $sayfa, $url, bool $redirect = false)
    {
        $yasak = $this->UrlExp($sayfa["sayfaYol"]);
        $url = $this->UrlExp($url);
        if ($sayfa["altSayfalar"] == 1) {
            if ($url["Controller"] == $yasak["Controller"]) {
                if ($url["Function"] == null || trim($url["Function"]) == "") {
                    return true;
                } else {
                    if($redirect==true){
                        redirect(base_url($url["Controller"]));
                    }else{
                        return false;
                    }
                }
            } else {
                return true;
            }
        } else {
            if ($url["Controller"] == $yasak["Controller"]) {
                if (trim($yasak["Function"]) != "" && $url["Function"] != $yasak["Function"]) {
                    return true;
                }
            } else {
                return true;
            }
        }
        if ($redirect == true) {
            
            redirect(base_url());
        } else {
            return false;
        }
    }
    /* Urlyi bileşenlerine ayırır */
    public function UrlExp($sayfa)
    {
        $base_url = array_filter(explode("/", parse_url(base_url())["path"]));
        $sayfa = array_filter(explode("/", parse_url($sayfa)["path"]));
        foreach ($sayfa as $d=>$s) {
            foreach ($base_url as $k => $v){
                if($v==$s){
                    unset($sayfa[$d]);
                }
            }
        }
        return [
            "Controller" => $this->doNULL(current($sayfa)),
            "Function" => $this->doNULL(next($sayfa)),
            "Query" => $this->doNULL(next($sayfa)),
            "Path"=> $this->doNULL(implode("/",$sayfa))
        ];
    }
    /* Değer boş geliyorsa null veri tipine dönüştürürür */
    public function doNULL($val){
        if(!isset($val)||trim($val)==null||trim($val)==""||$val==null){
            return null;
        }else{
            return $val;
        }
    }
    /* İzin kontrolü yapar*/
    public function PermControl()
    {
        $s = $this->Page_model->ReadDetail(["yetkiId" => $this->session->userdata("Account")["data"]["yetkiId"]]);
        $this->session->set_userdata("fpages", $s);
        $curr =  base_url($this->uri->uri_string());
        foreach ($s as $sayfa) {
            $url =  base_url($sayfa["sayfaYol"]);
            if ($url == base_url()) {
                exit();
            }
            $this->ControlSubPages($sayfa, $curr, true);
        }
    }
    /* Tek url üzerinde izin kontrolü yapar */
    public function PagePermControl($url)
    {
        $s = $this->session->userdata("fpages");
        foreach ($s as $sayfa) {
            if ($sayfa["altSayfalar"] == 0) {
                if ($url == base_url($sayfa["sayfaYol"])) {
                    return false;
                }
            } else {
                if ($this->ControlSubPages($sayfa, $url, false) == false) {
                    return false;
                }
            }
        }
        return $url;
    }
    /* Liste halinde verilen urllerin üzerinde izin kontrolü yapar */
    public function PagePermControlList($urls)
    {
        $w = [];
        foreach ($urls as $k => $url) {
            $u = $this->PagePermControl(base_url($url));
            if ($u !== false) {
                $w[$k] = $url;
            }
        }
        return $w;
    }
}
