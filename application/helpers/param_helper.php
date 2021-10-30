<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * ExtractParameter
 * Extract unwanted parameters
 *
 * @param array $params Your Parameter Array
 * @param array $rm Parameters To Extract
 * @param bool $reverse 
 * @return array $newparams Remaining Array
 * 
 **/
function ExtractParameter(Array $params,Array $rm,bool $reverse=false){
    try {
        if($reverse==false){
            foreach ($rm as $key => $value) {
                unset($params[$value]);
            }
        }else{
            foreach ($params as $key => $value) {
                if(!in_array($key,$rm)){
                    unset($params[$key]);
                }
                
            }
        }
    } catch (Throwable $th) {
        throw $th;
    }
    return $params;
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
function extJSONParam(Array $params){
    $newParams = [];
    foreach($params as $key => $value){
        if(isset($value["key"])&&isset($value["value"])){
            $newParams[$value["key"]] = $value["value"];
        }else{
            $newParams[$key] = $value;
        }
    }
    return $newParams;
}