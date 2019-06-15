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

    function fetch_data()
    {
        $data = $this->Contact_model->make_query();
        $array = array();
        foreach($data as $row)
        {
            $array[] = $row;
        }
        $output = array(
            'current'  => intval($_POST["current"]),
            'rowCount'  => 10,
            'total'   => intval($this->Contact_model->count_all_data()),
            'rows'   => $array
        );
        echo json_encode($output);
    }

    function fetch_single_data()
    {
        if($this->input->post('id'))
        {
            $data = $this->Contact_model->fetch_single_data($this->input->post('id'));
            foreach($data as $row)
            {
                $output['nom'] = $row['nom'];
                $output['email'] = $row['email'];
                $output['message'] = $row['message'];
            }
            echo json_encode($output);
        }
    }

    function insert(){
        $data = array(
            'nom' => $this->input->post('nom'),
            'email' => $this->input->post("email"),
            'message' => $this->input->post("message"),
        );
        $this->Contact_model->insert($data);
        redirect(base_url());
    }
    function delete_data()
    {
        if($this->input->post('id'))
        {
            $this->Contact_model->delete($this->input->post('id'));
            echo 'Data Deleted';
        }
    }
}