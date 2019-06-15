<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administration extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Administration_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Espace contact';
        $data['nom'] = $this->profileInfo->get_info();
        $this->load->view('admin/administration',$data);
    }
}