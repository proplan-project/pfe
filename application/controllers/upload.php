<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class upload extends CI_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('upload_model');
    }

    function ajax_upload()
    {
        if(isset($_FILES["image_file"]["name"]))
        {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|psd|ai|pdf|ppt|doc|mp3|mp4';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('image_file'))
            {
                echo 'error';
            }
            else
            {
                $data = $this->upload->data();
                $res = array(
                    'nom' => $data["file_name"],
                    'size' => $data["file_size"],
                    'type' => $data["file_type"],
                    'telecharge_par' => $this->session->userdata['info']['id'],
                    'id_projet' => $this->input->post('projet')
                );
                $this->upload_model->insert($res);
                echo '<img src="'.base_url().'uploads/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
                echo var_dump($data);
            }
        }
    }
}