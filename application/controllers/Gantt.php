<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gantt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gantt_model');
        $this->load->model('projet_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Gantt';
        $data['nom'] = $this->profileInfo->get_info();
        $data["fetch_data"] = $this->Gantt_model->fetch_data();
        $data['all_projet'] = $this->projet_model->all_projet();
        $this->load->view('gantt',$data);
    }
}

?>