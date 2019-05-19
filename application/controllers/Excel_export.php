<?php
defined('BASEPATH') OR exit('No direct scipt access allowed');

class Excel_export extends CI_Controller{
    function index(){
        $this->load->model("excel_export_model");
        $data["employee_data"] = $this->excel_export_model->fetch_data();
        $this->load->view("excel_export_view",$data);
    }
}