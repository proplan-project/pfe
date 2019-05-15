<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gantt extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tache_model');
    }

    function index()
    {
        $this->load->view('Gantt_view');
    }
}

?>