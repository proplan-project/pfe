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
        $this->load->view('reset');
     }

     function resetpassword(){
         $this->form_validation->set_rules('user_email', 'Address Email', 'required|trim|valid_email');
         $email = $this->input->post('user_email');
         $this->session->set_userdata('emailuser', $email);
         if($this->form_validation->run()) {
             $result = $this->resetpass->resetpassword($email);
             foreach ($result as $row) {
                 echo $row['nom'];
                 $mg = Mailgun::create('key-61da27ef9ce66a35d52647281b7b961f');
                 $result = $mg->messages()->send('golaxi.com', array(
                     'from'    => 'proplan@golaxi.com',
                     'to'      => $this->input->post('user_email'),
                     'subject' => 'hhhh tnsaalik mot de pass',
                     'text'    => "Salut ".$row['nom']."
                                     Ceci est un courrier électronique de mot de pass oublie , envoyé par le système ProPlan.
                                    Pour compléter le processus et vous connecter au système. D'abord, vous voulez vérifier votre courrier en cliquant dessus 
                                  <a href='".base_url()."reset/verify_password/".$row[verification_key]."'>lien</a>.</p>
                                  <p>Merci ./p>"
                 ));

                 if($result)
                 {
                     $message = 'xof email dyalk';
                     $this->session->set_flashdata('message', $message);
                     redirect('reset');
                 }else{

                     $message =  $this->email->print_debugger();
                     $this->session->set_flashdata('message', $message);
                     redirect('reset');
                 }
             }
         }else{
             $this->index();
         }
     }

     function verify_password(){
         if($this->uri->segment(3))
         {
            $key =  $this->uri->segment(3);
            $this->load->view('userforget');

         }
     }

     function submit(){
        if ($_POST){
            $pass1 = $this->input->post('pass1');
            $pass2 = $this->input->post('pass2');

           if ($pass2 == $pass1){
               echo $this->session->flashdata("emailuser");
           }
           else{

           }

            //$this->resetpass->submit($email,$pass1);
        }
     }
}
