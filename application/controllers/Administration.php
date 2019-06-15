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
        $data['admin'] = $this->Administration_model->make_query();
        $this->load->view('admin/administration',$data);
    }

    function action()
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post("prenom"),
                'email' => $this->input->post("email"),
                'password' => $this->input->post("password"),
                'tel' => $this->input->post("tel"),
                'genre' => $this->input->post("genre"),
                'id_createur' =>$this->session->userdata['info']['id'],
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Administration_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->Administration_model->update($data, $this->input->post('id_projet'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id'))
        {
            $data = $this->Administration_model->fetch_single_data($this->input->post('id'));
            foreach($data as $row)
            {
                $output['nom'] = $row['nom'];
                $output['prenom'] = $row['prenom'];
                $output['email'] = $row['email'];
                $output['password'] = $row['password'];
                $output['tel'] = $row['tel'];
                $output['genre'] = $row['genre'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
            $id= $this->input->post('id');
            $this->Administration_model->delete($id);
            redirect(administration);
    }
}