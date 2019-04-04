<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Evaluasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Evaluasi_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','evaluasi/tbl_evaluasi_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Evaluasi_model->json();
    }

    public function read($id) 
    {
        $row = $this->Evaluasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_evaluasi' => $row->id_evaluasi,
		'id_tahun_eva' => $row->id_tahun_eva,
		'tahun_eva' => $row->tahun_eva,
		'evaluasi' => $row->evaluasi,
		'analisa' => $row->analisa,
		'id_samut_eva' => $row->id_samut_eva,
		'sasaran_mutu_eva' => $row->sasaran_mutu_eva,
		'target_eva' => $row->target_eva,
		'deadline_eva' => $row->deadline_eva,
		'pic_eva' => $row->pic_eva,
		'keterangan_eva' => $row->keterangan_eva,
	    );
            $this->template->load('template','evaluasi/tbl_evaluasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('evaluasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('evaluasi/create_action'),
	    'id_evaluasi' => set_value('id_evaluasi'),
	    'id_tahun_eva' => set_value('id_tahun_eva'),
	    'tahun_eva' => set_value('tahun_eva'),
	    'evaluasi' => set_value('evaluasi'),
	    'analisa' => set_value('analisa'),
	    'id_samut_eva' => set_value('id_samut_eva'),
	    'sasaran_mutu_eva' => set_value('sasaran_mutu_eva'),
	    'target_eva' => set_value('target_eva'),
	    'deadline_eva' => set_value('deadline_eva'),
	    'pic_eva' => set_value('pic_eva'),
	    'keterangan_eva' => set_value('keterangan_eva'),
	);
        $this->template->load('template','evaluasi/tbl_evaluasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tahun_eva' => $this->input->post('id_tahun_eva',TRUE),
		'tahun_eva' => $this->input->post('tahun_eva',TRUE),
		'evaluasi' => $this->input->post('evaluasi',TRUE),
		'analisa' => $this->input->post('analisa',TRUE),
		'id_samut_eva' => $this->input->post('id_samut_eva',TRUE),
		'sasaran_mutu_eva' => $this->input->post('sasaran_mutu_eva',TRUE),
		'target_eva' => $this->input->post('target_eva',TRUE),
		'deadline_eva' => $this->input->post('deadline_eva',TRUE),
		'pic_eva' => $this->input->post('pic_eva',TRUE),
		'keterangan_eva' => $this->input->post('keterangan_eva',TRUE),
	    );

            $this->Evaluasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('evaluasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Evaluasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('evaluasi/update_action'),
		'id_evaluasi' => set_value('id_evaluasi', $row->id_evaluasi),
		'id_tahun_eva' => set_value('id_tahun_eva', $row->id_tahun_eva),
		'tahun_eva' => set_value('tahun_eva', $row->tahun_eva),
		'evaluasi' => set_value('evaluasi', $row->evaluasi),
		'analisa' => set_value('analisa', $row->analisa),
		'id_samut_eva' => set_value('id_samut_eva', $row->id_samut_eva),
		'sasaran_mutu_eva' => set_value('sasaran_mutu_eva', $row->sasaran_mutu_eva),
		'target_eva' => set_value('target_eva', $row->target_eva),
		'deadline_eva' => set_value('deadline_eva', $row->deadline_eva),
		'pic_eva' => set_value('pic_eva', $row->pic_eva),
		'keterangan_eva' => set_value('keterangan_eva', $row->keterangan_eva),
	    );
            $this->template->load('template','evaluasi/tbl_evaluasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('evaluasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_evaluasi', TRUE));
        } else {
            $data = array(
		'id_tahun_eva' => $this->input->post('id_tahun_eva',TRUE),
		'tahun_eva' => $this->input->post('tahun_eva',TRUE),
		'evaluasi' => $this->input->post('evaluasi',TRUE),
		'analisa' => $this->input->post('analisa',TRUE),
		'id_samut_eva' => $this->input->post('id_samut_eva',TRUE),
		'sasaran_mutu_eva' => $this->input->post('sasaran_mutu_eva',TRUE),
		'target_eva' => $this->input->post('target_eva',TRUE),
		'deadline_eva' => $this->input->post('deadline_eva',TRUE),
		'pic_eva' => $this->input->post('pic_eva',TRUE),
		'keterangan_eva' => $this->input->post('keterangan_eva',TRUE),
	    );

            $this->Evaluasi_model->update($this->input->post('id_evaluasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('evaluasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Evaluasi_model->get_by_id($id);

        if ($row) {
            $this->Evaluasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('evaluasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('evaluasi'));
        }
    }

    public function _rules() 
    {
	// $this->form_validation->set_rules('id_tahun_eva', 'id tahun eva', 'trim|required');
	$this->form_validation->set_rules('tahun_eva', 'tahun eva', 'trim|required');
	$this->form_validation->set_rules('evaluasi', 'evaluasi', 'trim|required');
	$this->form_validation->set_rules('analisa', 'analisa', 'trim|required');
	// $this->form_validation->set_rules('id_samut_eva', 'id samut eva', 'trim|required');
	// $this->form_validation->set_rules('sasaran_mutu_eva', 'sasaran mutu eva', 'trim|required');
	$this->form_validation->set_rules('target_eva', 'target eva', 'trim|required');
	$this->form_validation->set_rules('deadline_eva', 'deadline eva', 'trim|required');
	$this->form_validation->set_rules('pic_eva', 'pic eva', 'trim|required');
	$this->form_validation->set_rules('keterangan_eva', 'keterangan eva', 'trim|required');

	$this->form_validation->set_rules('id_evaluasi', 'id_evaluasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


    public function fetch_samut(){
        if($this->input->post('id_tahun'))
  {
   echo $this->Evaluasi_model->fetch_samut($this->input->post('id_tahun'));
  }
    }

}

/* End of file Evaluasi.php */
/* Location: ./application/controllers/Evaluasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-02-28 07:28:37 */
/* http://harviacode.com */