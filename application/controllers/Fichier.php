<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fichier extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fichier_model');
    }

    function index()
    {
        $this->load->view('Fichier_view');
    }

    function upload()
    {
        sleep(3);
        if($_FILES["files"]["name"] != '')
        {
            $output = '';
            $config["upload_path"] = './upload/';
            $config["allowed_types"] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
            {
                $_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
                $_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
                $_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
                $_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
                $_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
                if($this->upload->do_upload('file'))
                {
                    $data = $this->upload->data();
                    $output .= '
     <div class="col-md-3">
      <img src="'.base_url().'upload/'.$data["file_name"].'" class="img-responsive img-thumbnail" />
     </div>
     ';
                }
            }
            echo $output;
        }
    }
}
