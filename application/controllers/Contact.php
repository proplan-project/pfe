<?php
class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
    }

    function index()
    {
        $data = array(
            'nom' => $this->input->post("nom"),
            'email' => $this->input->post("email"),
            'message' => $this->input->post("message"),
        );
        $this->Contact_model->insert($data);
    }
}