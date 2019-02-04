<?php
class Blokir extends CI_Controller{
    
    
    function index(){
        $this->load->view('auth/blokir_akses');
        sleep(5);
        redirect('auth');

    }
}