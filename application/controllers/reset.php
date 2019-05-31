<?php
/**
 * Created by PhpStorm.
 * User: FatimaZahra
 * Date: 29/05/2019
 * Time: 22:14
 */
require 'vendor/autoload.php';
use Mailgun\Mailgun;
class reset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('resetpass');
        $this->load->library('form_validation');
    }

     function index(){
        $this->load->view('login');
     }

     function resetuser(){
         $data['db'] = array(
             'db'=>'utilisateur'
         );
         $this->load->view('reset',$data);
     }

     function resetpassword(){
         $this->form_validation->set_rules('user_email', 'Address Email', 'required|trim|valid_email');
         if($this->form_validation->run()) {

             $db = $this->input->post('db');
             $email = $this->input->post('user_email');

             $result = $this->resetpass->resetpassword($db, $email);

             foreach ($result as $row) {
                 echo $row['nom'];
             }
         }else{
             echo 'no';
         }
     }
}