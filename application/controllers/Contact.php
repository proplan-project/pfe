<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Espace contact';
        $data['nom'] = $this->profileInfo->get_info();
        $this->load->view('admin/contact',$data);
    }
}