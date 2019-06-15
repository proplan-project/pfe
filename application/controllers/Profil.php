<?php

class Profil extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata['info']['id'])
        {
            redirect('login');
        }
        $this->load->model('profileInfo');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['info'] = $this->profileInfo->get_info();
        $this->load->view('profil',$data);
    }
    function edit()
    {
        $data['info'] = $this->profileInfo->get_info();

        if(isset($data['info']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'Facebook' => $this->input->post('facebook'),
                    'Google' => $this->input->post('google'),
                    'Skype' => $this->input->post('skype'),
                    'Twitter' => $this->input->post('twitter'),
                    'LinkedIn' => $this->input->post('linkedin'),
                    'github' => $this->input->post('github')
                );

                $this->profileInfo->edit($params);
                redirect('profil');
            }
            else
            {
                $data['_view'] = 'utilisateur/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The utilisateur you are trying to edit does not exist.');
    }
    function validations()
    {
        $json = array();

        $this->form_validation->set_rules('facebook', 'Facebook champs', 'valid_url|required');
        $this->form_validation->set_rules('google', 'Google ', 'valid_url|required');
        $this->form_validation->set_rules('skype', 'Nom', 'valid_url|required');
        $this->form_validation->set_rules('twitter', 'Telephone', 'valid_url|required');
        $this->form_validation->set_rules('linkedin', 'Genre', 'valid_url|required');
        $this->form_validation->set_rules('github', 'Adresse', 'valid_url|required');

        $this->form_validation->set_message('required', 'You missed the input {field}!');

        if (!$this->form_validation->run()) {
            $json = array(
                'facebook' => form_error('facebook', '<p class="mt-3 text-danger">', '</p>'),
                'google' => form_error('google', '<p class="mt-3 text-danger">', '</p>'),
                'skype' => form_error('skype', '<p class="mt-3 text-danger">', '</p>'),
                'twitter' => form_error('twitter', '<p class="mt-3 text-danger">', '</p>'),
                'linkedin' => form_error('linkedin', '<p class="mt-3 text-danger">', '</p>'),
                'github' => form_error('github', '<p class="mt-3 text-danger">', '</p>'),
            );
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($json));
        }else{
            $this->addsocial();
        }
    }
    function editinfo()
    {
        $data['info'] = $this->profileInfo->get_info();

        if(isset($data['info']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'email' => $this->input->post('email'),
                    'tel' => $this->input->post('tel'),
                    'genre' => $this->input->post('genre'),
                    'adresse' => $this->input->post('adresse')
                );

                $this->profileInfo->edit($params);
                redirect('profil');
            }
            else
            {
                echo 'error';
            }
        }
        else
            show_error('The utilisateur you are trying to edit does not exist.');
    }
    function validation()
    {

        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
        $this->form_validation->set_rules('prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        $this->form_validation->set_rules('tel', 'Telephone', 'required');
        $this->form_validation->set_rules('genre', 'Genre', 'required');
        $this->form_validation->set_rules('adresse', 'Adresse', 'required');
        if($this->form_validation->run())
        {
           $this->editinfo();
        }
        else
        {
            $this->index();
        }
    }
    function addsocial(){
        $result = $this->profileInfo->addsocial();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
    public function showprofil(){
        $result = $this->profileInfo->showprofil();
        echo json_encode($result);
    }

}