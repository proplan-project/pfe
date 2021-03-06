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
        $data['titre']='profil';
        $data['info'] = $this->profileInfo->get_info();
        $this->load->view('profil',$data);
    }
    var $ddd;
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
                $ddd= $params;
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
            $json = array( // hna ila kan ghalt  taybayan champ li ghalt bl 7mr
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

            // sinon ajouti social l base don
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
        if($result >0){
            $msg['success'] = true;
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($msg ));
    }
    public function showprofil(){
        $result = $this->profileInfo->showprofil();
        echo json_encode($result);
    }
    function passwordupdate(){
        $this->form_validation->set_rules('pass1', 'Mot De Pass', 'required');
        $this->form_validation->set_rules('pass', 'Mot De Pass', 'required');
        $this->form_validation->set_rules('pass2', 'Mot De Pass', 'required');

        if ($this->form_validation->run()) {
            $pass = $this->input->post('pass');
            $pass1 = $this->input->post('pass1');
            $pass2 = $this->input->post('pass2');
            $query = $this->db->get_where(array('db' =>  $this->session->userdata['info']['db'] ), array('id' =>  $this->session->userdata['info']['id'] ));
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach($result as $row)
                {
                   if (password_verify($pass, $row['password'])){
                       if ($pass1 == $pass2){
                           $params = array(
                               'password' => password_hash($pass1, PASSWORD_DEFAULT)
                           );

                           $this->profileInfo->edit($params);
                           $message = 'Le mot de pass a bien modiffie!';
                           $this->session->set_flashdata('res',$message);
                           redirect('profil');
                       }
                       else{
                           $result = 'les valeurs pas idententique !';
                           $this->session->set_flashdata('message',$result);
                           redirect('profil');
                       }
                   }else{
                       $result = 'Le mot de pass incorrect !!';
                       $this->session->set_flashdata('message',$result);
                       redirect('profil');
                   }
                }
            }
        }else{
            $result = 'tous les champs sans obligatoires';
            $this->session->set_flashdata('message',$result);
            redirect('profil');
        }
    }

}