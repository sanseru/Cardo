<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_sasaran_mutu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Admin_sasaran_mutu_model');
        $this->load->library('encrypt');
        // $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {

		// $this->template->load('template','sasaranmutu_department/tbl_samutdep_list');
        $this->template->load('template','admin_sasaran_mutu/search_tahun');
		
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Admin_sasaran_mutu_model->json();
	}
    
    public function view_tahunnya(){

		$data = array(
			'id'=>$this->uri->segment(3),
			);
        // $this->template->load('template','Admin_sasaran_mutu/list_tahun',$data);
		$this->template->load('template','Admin_sasaran_mutu/search_tahun',$data);
        

	}
	public function json_2($id) {

            header('Content-Type: application/json');
            echo $this->Admin_sasaran_mutu_model->json_2($id);

	}
	// public function json_3() {

    //     header('Content-Type: application/json');
    //     echo $this->SasaranMutu_department_model->json_3();
    // }

	public function view_samutdep(){

		$data = array(
			'id'=>$this->uri->segment(3),
			);
		$this->template->load('template','sasaranmutu_department/search_tahun',$data);
		// $this->template->load('template','sasaranmutu_department/tbl_samutdep_list',$data);\

    }
    
    public function searching(){
        // alert($this->input->post('id_thn'));
		$data = array(
            'id_thn'=>$this->input->post('id_thn'),
			'id_users'=>$this->input->post('id_users'),
            
			);
		$this->template->load('template','Admin_sasaran_mutu/searching',$data);
		// $this->template->load('template','sasaranmutu_department/tbl_samutdep_list',$data);\

        // header('Content-Type: application/json');
        // echo $this->Admin_sasaran_mutu_model->json_3();

    }
    
    public function json_3() {

        header('Content-Type: application/json');
        echo $this->Admin_sasaran_mutu_model->json_3();

    }
}

/* End of file SasaranMutu_department.php */
/* Location: ./application/controllers/SasaranMutu_department.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 04:14:14 */
/* http://harviacode.com */