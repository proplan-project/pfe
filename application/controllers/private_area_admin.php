<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class private_area_admin extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profileInfo');
        $this->load->model('Private_area_model');
        $this->load->helper('cookie');
        if(!$this->session->userdata['info']['id'])
        {
            redirect('Admin');
        }
    }
    function index()
    {
        $data['titre']='Acceuil';
        $data['nom'] = $this->profileInfo->get_info();
        $this->load->view('admin/home_admin',$data);
    }

    function logout()
    {
        $data = $this->session->all_userdata();
        foreach($data as $row => $rows_value)
        {
            $this->session->unset_userdata($row);
        }
        redirect('Admin');
    }
}