<?php

class Insert extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('member');
    }
    function index(){
        $this->member->insert();
    }

    function fetch(){
        $res =  $this->member->fetch();
        echo json_encode($res);
    }


}