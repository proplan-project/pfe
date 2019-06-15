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
                     'subject' => 'réinitialiser votre mot de passe ici',
                     'html'    => "Salut ".$row['nom']."
                                     Ceci est un courrier électronique de mot de pass oublie , envoyé par le système ProPlan.
                                    Pour compléter le processus et vous connecter au système. D'abord, vous voulez vérifier votre courrier en cliquant dessus 
                                  <a href='".base_url()."reset/verify_password/".$row[verification_key]."'>lien</a>.</p>
                                  <p>Merci .</p>"
                 ));

                 if($result)
                 {
                     $message = 'vous avez reçu un message dans votre boîte';
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
            $data['key'] =  $this->uri->segment(3);
            $this->load->view('userforget',$data);

         }
     }

     function modifier(){
        if ($_POST){
            $this->form_validation->set_rules('pass1', 'Mot De Pass', 'required');
            $this->form_validation->set_rules('pass2', 'Mot De Pass', 'required');
            $pass1 = $this->input->post('pass1');
            $pass2 = $this->input->post('pass2' );
            $data['key']   = $this->input->post('hidden' );
            if($this->form_validation->run()) {
                if ($pass1 == $pass2){
                    $this->resetpass->modifier($pass1,$this->input->post('hidden' ));
                    $this->load->view('userforget',$data);
                    $messagepass = 'le mot de pass bien modifie';
                    $this->session->set_flashdata('messagepass',$messagepass);
                }else{
                    $message = 'les mots de pass pas identique';
                    $this->session->set_flashdata('message',$message);
                    $this->load->view('userforget',$data);
                }
            }else{
                $this->load->view('userforget',$data);
            }
        }
     }
}
