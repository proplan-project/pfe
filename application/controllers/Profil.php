<?php

class Profil extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('profileInfo');
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
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'email' => $this->input->post('email'),
                    'tel' => $this->input->post('tel'),
                    'genre' => $this->input->post('genre'),
                    'adresse' => $this->input->post('adresse'),
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


}