<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Chef_projet extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chef_projet_model');
        $this->load->model('profileInfo');
    }

    function index()
    {
        $data['titre']='Les chefs des projets';
        $data['nom'] = $this->profileInfo->get_info();
        $this->load->view('admin/chef_projet',$data);
    }

    function fetch_data()
    {
        $data = $this->Chef_projet_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Chef_projet_model->count_all_data()),
            'rows'   => $array
        );
        echo json_encode($output);
    }

    function action()
    {
        if($this->input->post('operation'))
        {
            $data = array(
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'genre' => $this->input->post('genre'),
            );
            if($this->input->post('operation') == 'Add')
            {
                $this->Chef_projet_model->insert($data);
                echo 'Data Inserted';
            }
            if($this->input->post('operation') == 'Edit')
            {
                $this->Chef_projet_model->update($data, $this->input->post('id'));
                echo 'Data Updated';
            }
        }
    }

    function fetch_single_data()
    {
        if($this->input->post('id'))
        {
            $data = $this->Chef_projet_model->fetch_single_data($this->input->post('id'));
            foreach($data as $row)
            {
                $output['nom'] = $row['nom'];
                $output['prenom'] = $row['prenom'];
                $output['email'] = $row['email'];
                $output['password'] = $row['password'];
                $output['genre'] = $row['genre'];
            }
            echo json_encode($output);
        }
    }

    function delete_data()
    {
        if($this->input->post('id'))
        {
            $this->Chef_projet_model->delete($this->input->post('id'));
            echo 'Data Deleted';
        }
    }
}