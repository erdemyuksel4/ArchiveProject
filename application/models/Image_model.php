<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends MY_Model{
    public const TABLE = "resimler";
    public $id;
    public $yol;    

    public function __construct(){
        parent::__construct();
        $this->load->helper('file');
    }
    public function ImageUpload($img){
        
    }
    public function ImageAdd($blobs,$name,$dir){
        $resimler = json_decode($blobs);
        $url = $this->CreateImage($resimler, $name, $dir);
        $resimler="";
        foreach ($url as $key => $res) {
            $this->Image_model->yol = $res;
            $resimler .= $this->Image_model->Create() . ";";
        }
        return $resimler;
    }
    public function CreateImage($resimler,$ad,$klasor){
        $url = [];
        foreach ($resimler as $key => $resim) {
            if (isset($resim->blob)) {
                $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $resim->blob));
                $urltemp = "./uploadedimg/images/".$klasor."/".$ad."-".md5(uniqid(mt_rand(0,100))).".jpeg";
                $img = write_file($urltemp , $data);
                $url[] = $urltemp;
            }
            
            
        }
        return $url;
    }
    public function ImageEdit($blobs,$name,$dir){
        $r = $this->ImageAdd($blobs,$name,$dir);
        if(isset($this->param["deletedImg"])){
            $r .=$this->ImageDelete($this->param["deletedImg"]);
        }
        return $r;
    }
    public function ImageChangeFormat($res){
        $resimler = [];
        if(strlen(trim($res))>0){
            foreach (array_filter(explode(";",$res)) as $key => $resim) {
                $this->id = $resim;
                $detail = $this->ReadDetail(array("id"=>$this->id));
                if(count($detail)>0){

                    $this->yol = $detail[0]["yol"];
                    $resimler[] = ["id"=>$this->id,"yol"=>$this->yol];
                }
            }
        }
        return $resimler;
    }
    public function ImageDelete($res){
        $r = "";
        foreach($res as $k => $img){
            if($img == "1"){
                $r  .= $k.";";
            }else if($img == "0"){
                $this->id = $k;
                $detail = $this->ReadDetail(array("id"=>$this->id));
                if(count($detail)>0){
                    $this->yol = $detail[0]["yol"];
                    if(is_link($this->yol)){
                        if(unlink($this->yol)){
                            $this->Delete(array("id"=>$this->id));
                        }else{
                            $r  .= $k.";";
                        }
                    }
                }
            }
        }
        return $r;
    }
}