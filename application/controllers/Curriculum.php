<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Curriculum extends MY_Controller
{
    public $page = "Curriculum";
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Curriculum_model");
        $this->load->model("Term_model");
    }
    public function BringCurriculum($sinifId)
    {
        return $this->Curriculum_model->ReadDetail(["sinifId" => $sinifId]);
    }
    public function Curriculum()
    {
        $data["sinifId"] = $this->param[0];
        $data["b"] = $this->BringCurriculum($this->param[0]);
        $urls = [
            "Add" => "Curriculum/CurrAdd",
            "Edit" => "Curriculum/CurrEdit",
            "Delete" => "Curriculum/CurrDelete"
        ];
        if (isset($this->engel)) {
            $urls["A"] = "Curriculum/Curriculum";
        }
        $data["urls"] = $this->PagePermControlList($urls);
        $this->load->view("Pages/Main/ogretimProgrami.php", $data);
    }
    public function CurrEdit()
    {
        $data = [
            "footerButtonText" => "Onayla",
            "location" => $this->PagePermControl("Curriculum/Edit")
        ];
        $data["b"] = $this->Curriculum_model->ReadDetailSingle(["id" => $this->param[0]]);
        $this->load->view("Pages/Edit/ogretimProgrami.php", $data);
    }
    public function CurrAdd()
    {
        $data = [
            "sinifId" => $this->param[0],
            "footerButtonText" => "Onayla",
            "location" => $this->PagePermControl("Curriculum/Add")
        ];
        $this->load->view("Pages/Add/ogretimProgrami.php", $data);
    }
    public function CurrDelete()
    {
        $this->load->view("Modals/Body/DeleteAgree.php", [
            "location" => $this->PagePermControl("Curriculum/Delete"),
            "footerButtonText" => "Onayla",
            "param" => $this->param[0]
        ]);
    }
    protected function Add()
    {
        $this->param["donemId"] = $this->Term_model->FindActiveTerm()["id"];
        $this->Curriculum_model->Create(ExtractParameter($this->param, ["konu", "hafta", "donemId", "sinifId"], true));
    }
    protected function Delete()
    {
        $this->Curriculum_model->Delete(ExtractParameter($this->param, ["id"], true));
    }
    protected function Edit()
    {
        $this->param["donemId"] = $this->Term_model->FindActiveTerm()["id"];
        $this->Curriculum_model->Update(["id" => $this->param["id"]], ExtractParameter($this->param, ["konu", "hafta"], true));
    }
}
