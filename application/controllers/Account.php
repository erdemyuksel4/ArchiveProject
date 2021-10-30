<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper("url");
        $this->load->helper('form');
        $this->load->model("User_model");
    }
    public function Index(){
        if( !class_exists('CI_Session') ) $this->load->library('session');
        if( $this->session->userdata('log')=="on" )
        {
            $data['Account'] = $this->session->userdata('Account');
            redirect(base_url());
        }
        else
        {
            redirect(base_url('Account/LogIn'));
        }
    }
    private function setUserData($userDataList){
        $this->session->set_userdata("log","on");
        $this->session->set_userdata("Account",[
            "email"=>$userDataList["email"],
            "password"=>$userDataList["sifre"],
            "data"=> $userDataList,
        ]);
    }
    public function SignIn(){
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $a = $this->User_model->ReadDetail(["email"=>$email,"sifre"=>$pass]);
        $b = $this->User_model->ReadDetail(["kullaniciAdi"=>$email,"sifre"=>$pass]);
        if(count($a)>0||count($b)>0){
            if(isset($a)&&(count($a)>0)&&strlen($a[0]["email"])>0){
                $this->setUserData($a[0]);
            }else if(isset($b)&&(count($b)>0)&&strlen($b[0]["email"])>0){
                $this->setUserData($b[0]);
            }
        }else{
            $this->session->set_userdata("Error","Yanlış Kullanıcı Adı veya Şifre"); 
        }
        redirect(base_url("Account"));
        
    }
    public function LogIn(){
        $this->load->view("AccountPages/sign.php");
    }
    public function LogOut(){
        $this->session->unset_userdata("log");
        $this->session->unset_userdata("Account");
        redirect(base_url(""));
    }
    private function PassingAccount($id=null){
        if(isset($id)){
            $this->setUserData($this->User_model->ReadDetailSingle(["id"=>$id]));
        }
    }
    public function PassControl($id=null){
        if(($this->session->userdata("log"))=="on"):
            $m = $this->session->userdata("Account")["data"];
            if(isset($id)){
                $user = $this->User_model->ReadDetailSingle(["id"=>$m["id"]]);
                if(isset($user)){
                    if($user["yetkiId"]==1){
                        $this->PassingAccount($id);
                    }
                }
            }
        endif;
        redirect(base_url(""));
    }
    
}
