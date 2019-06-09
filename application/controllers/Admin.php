<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('login_admin_model');
    }

    function index()
    {
        $this->load->view('login_admin');
    }

    function validation()
    {
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run())
        {
            $result = $this->login_admin_model->can_login($this->input->post('email'), $this->input->post('password'), $this->input->post('hidden'));
            if($result == '')
            {
                redirect('private_area_admin');
            }
            else
            {
                $this->session->set_flashdata('message',$result);
                redirect('login_admin');
            }
        }
        else
        {
            $this->index();
        }
    }
}