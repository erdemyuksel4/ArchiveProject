<?php 
defined('BASEPATH') or exit('No direct script access allowed');
interface ICreate{
    public function Create($data);
}
interface IRead{
    public function Read();
}
interface IReadDetail{
    public function ReadDetail(Array $columns);
}
interface IUpdate{
    public function Update(Array $column,Array $row);
}
interface IDelete{
    public function Delete(Array $columns);
}

abstract class MY_Model extends CI_model implements ICreate, IRead, IReadDetail, IUpdate, IDelete{
    private $class;
    
    public function __construct(){
        parent::__construct();
        $this->class = get_called_class();
    }

    public function Filter($arr){
        $sess = $this->session->userdata('Account');
        if($sess["data"]["yetkiId"]==6){

        }
    }
    
    public function getEmptyData() {

        $arr = array();
        
        foreach ($this as $key => $aColumn) {
            $arr[$key] = "";
        }


        return $arr;
    }

    public function Create($data = null){
        if(is_null($data)){
            $this->db->insert($this->class::TABLE,$this);
        }else{
            $this->db->insert($this->class::TABLE,$data);
        }
        return $this->db->insert_id();
    }

    public function Read(){
        return $this->db->get($this->class::TABLE)->result_array();
    }

    public function GetAll(Array $columns = null) {
        if (is_null($columns)) 
            return $this->db->get($this->class::TABLE)->result_array();
        else {
            $arr = $this->db->get_where($this->class::TABLE,$columns)->result_array();
            return $arr;
        }
    }

    public function Get(Array $columns) {
        $arr = $this->db->get_where($this->class::TABLE,$columns)->result_array();
        if (count($arr) == 0) 
            return $this->getEmptyData();
        return $arr[0];
    }

    public function ReadDetailSingle(Array $columns){
        $arr = $this->db->get_where($this->class::TABLE,$columns)->result_array();
        if (count($arr) == 0):
            return $this->getEmptyData();
        endif;
        return $arr[0];      
    }

    public function ReadDetail(Array $columns){
        $arr = $this->db->get_where($this->class::TABLE,$columns)->result_array();
        return $arr;
    }

    public function Update(Array $column, Array $row){
        if(is_null($row)){
            $this->db->insert($this->class::TABLE,$this);
        }else{
            $this->db->where($column);
            $this->db->update($this->class::TABLE,$row);
        }
    }

    public function Delete($columns){
        $this->db->delete($this->class::TABLE,$columns);
    }
    public function ControlEmpty($arr=null){
        if (count($arr) == 0):
            return $this->getEmptyData();
        endif;
        return $arr;
    }
}