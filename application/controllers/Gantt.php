<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gantt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gantt_model');
    }

    function index()
    {
        $data["fetch_data"] = $this->Gantt_model->fetch_data();
        $this->load->view('Gantt_view',$data);
    }
}

?>