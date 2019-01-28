<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class All_samut extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('All_samut_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','all_samut/tbl_samutdep_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->All_samut_model->json();
    }

    public function read($id) 
    {
        $row = $this->All_samut_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_samutdept' => $row->id_samutdept,
		'pihak_kepentingan' => $row->pihak_kepentingan,
		'kbthn_hrpn' => $row->kbthn_hrpn,
		'peluang_ancaman' => $row->peluang_ancaman,
		'main_proses' => $row->main_proses,
		'sub_proses' => $row->sub_proses,
		'sub_sub_proses' => $row->sub_sub_proses,
		'input' => $row->input,
		'proses_pdca' => $row->proses_pdca,
		'quality_assurance' => $row->quality_assurance,
		'quality_control' => $row->quality_control,
		'output' => $row->output,
		'penerima_output' => $row->penerima_output,
		'samut' => $row->samut,
		'kpi' => $row->kpi,
		'pic' => $row->pic,
		'jan' => $row->jan,
		'feb' => $row->feb,
		'mar' => $row->mar,
		'apr' => $row->apr,
		'may' => $row->may,
		'jun' => $row->jun,
		'jul' => $row->jul,
		'aug' => $row->aug,
		'sep' => $row->sep,
		'oct' => $row->oct,
		'nov' => $row->nov,
		'dec' => $row->dec,
		'rata_rata' => $row->rata_rata,
		'created_date' => $row->created_date,
		'created_by' => $row->created_by,
		'modify_date' => $row->modify_date,
		'modify_by' => $row->modify_by,
		'department' => $row->department,
		'tahun_samut' => $row->tahun_samut,
	    );
            $this->template->load('template','all_samut/tbl_samutdep_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('all_samut'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('all_samut/create_action'),
	    'id_samutdept' => set_value('id_samutdept'),
	    'pihak_kepentingan' => set_value('pihak_kepentingan'),
	    'kbthn_hrpn' => set_value('kbthn_hrpn'),
	    'peluang_ancaman' => set_value('peluang_ancaman'),
	    'main_proses' => set_value('main_proses'),
	    'sub_proses' => set_value('sub_proses'),
	    'sub_sub_proses' => set_value('sub_sub_proses'),
	    'input' => set_value('input'),
	    'proses_pdca' => set_value('proses_pdca'),
	    'quality_assurance' => set_value('quality_assurance'),
	    'quality_control' => set_value('quality_control'),
	    'output' => set_value('output'),
	    'penerima_output' => set_value('penerima_output'),
	    'samut' => set_value('samut'),
	    'kpi' => set_value('kpi'),
	    'pic' => set_value('pic'),
	    'jan' => set_value('jan'),
	    'feb' => set_value('feb'),
	    'mar' => set_value('mar'),
	    'apr' => set_value('apr'),
	    'may' => set_value('may'),
	    'jun' => set_value('jun'),
	    'jul' => set_value('jul'),
	    'aug' => set_value('aug'),
	    'sep' => set_value('sep'),
	    'oct' => set_value('oct'),
	    'nov' => set_value('nov'),
	    'dec' => set_value('dec'),
	    'rata_rata' => set_value('rata_rata'),
	    'created_date' => set_value('created_date'),
	    'created_by' => set_value('created_by'),
	    'modify_date' => set_value('modify_date'),
	    'modify_by' => set_value('modify_by'),
	    'department' => set_value('department'),
	    'tahun_samut' => set_value('tahun_samut'),
	);
        $this->template->load('template','all_samut/tbl_samutdep_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pihak_kepentingan' => $this->input->post('pihak_kepentingan',TRUE),
		'kbthn_hrpn' => $this->input->post('kbthn_hrpn',TRUE),
		'peluang_ancaman' => $this->input->post('peluang_ancaman',TRUE),
		'main_proses' => $this->input->post('main_proses',TRUE),
		'sub_proses' => $this->input->post('sub_proses',TRUE),
		'sub_sub_proses' => $this->input->post('sub_sub_proses',TRUE),
		'input' => $this->input->post('input',TRUE),
		'proses_pdca' => $this->input->post('proses_pdca',TRUE),
		'quality_assurance' => $this->input->post('quality_assurance',TRUE),
		'quality_control' => $this->input->post('quality_control',TRUE),
		'output' => $this->input->post('output',TRUE),
		'penerima_output' => $this->input->post('penerima_output',TRUE),
		'samut' => $this->input->post('samut',TRUE),
		'kpi' => $this->input->post('kpi',TRUE),
		'pic' => $this->input->post('pic',TRUE),
		'jan' => $this->input->post('jan',TRUE),
		'feb' => $this->input->post('feb',TRUE),
		'mar' => $this->input->post('mar',TRUE),
		'apr' => $this->input->post('apr',TRUE),
		'may' => $this->input->post('may',TRUE),
		'jun' => $this->input->post('jun',TRUE),
		'jul' => $this->input->post('jul',TRUE),
		'aug' => $this->input->post('aug',TRUE),
		'sep' => $this->input->post('sep',TRUE),
		'oct' => $this->input->post('oct',TRUE),
		'nov' => $this->input->post('nov',TRUE),
		'dec' => $this->input->post('dec',TRUE),
		'rata_rata' => $this->input->post('rata_rata',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'modify_date' => $this->input->post('modify_date',TRUE),
		'modify_by' => $this->input->post('modify_by',TRUE),
		'department' => $this->input->post('department',TRUE),
		'tahun_samut' => $this->input->post('tahun_samut',TRUE),
	    );

            $this->All_samut_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('all_samut'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->All_samut_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('all_samut/update_action'),
		'id_samutdept' => set_value('id_samutdept', $row->id_samutdept),
		'pihak_kepentingan' => set_value('pihak_kepentingan', $row->pihak_kepentingan),
		'kbthn_hrpn' => set_value('kbthn_hrpn', $row->kbthn_hrpn),
		'peluang_ancaman' => set_value('peluang_ancaman', $row->peluang_ancaman),
		'main_proses' => set_value('main_proses', $row->main_proses),
		'sub_proses' => set_value('sub_proses', $row->sub_proses),
		'sub_sub_proses' => set_value('sub_sub_proses', $row->sub_sub_proses),
		'input' => set_value('input', $row->input),
		'proses_pdca' => set_value('proses_pdca', $row->proses_pdca),
		'quality_assurance' => set_value('quality_assurance', $row->quality_assurance),
		'quality_control' => set_value('quality_control', $row->quality_control),
		'output' => set_value('output', $row->output),
		'penerima_output' => set_value('penerima_output', $row->penerima_output),
		'samut' => set_value('samut', $row->samut),
		'kpi' => set_value('kpi', $row->kpi),
		'pic' => set_value('pic', $row->pic),
		'jan' => set_value('jan', $row->jan),
		'feb' => set_value('feb', $row->feb),
		'mar' => set_value('mar', $row->mar),
		'apr' => set_value('apr', $row->apr),
		'may' => set_value('may', $row->may),
		'jun' => set_value('jun', $row->jun),
		'jul' => set_value('jul', $row->jul),
		'aug' => set_value('aug', $row->aug),
		'sep' => set_value('sep', $row->sep),
		'oct' => set_value('oct', $row->oct),
		'nov' => set_value('nov', $row->nov),
		'dec' => set_value('dec', $row->dec),
		'rata_rata' => set_value('rata_rata', $row->rata_rata),
		'created_date' => set_value('created_date', $row->created_date),
		'created_by' => set_value('created_by', $row->created_by),
		'modify_date' => set_value('modify_date', $row->modify_date),
		'modify_by' => set_value('modify_by', $row->modify_by),
		'department' => set_value('department', $row->department),
		'tahun_samut' => set_value('tahun_samut', $row->tahun_samut),
	    );
            $this->template->load('template','all_samut/tbl_samutdep_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('all_samut'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_samutdept', TRUE));
        } else {
            $data = array(
		'pihak_kepentingan' => $this->input->post('pihak_kepentingan',TRUE),
		'kbthn_hrpn' => $this->input->post('kbthn_hrpn',TRUE),
		'peluang_ancaman' => $this->input->post('peluang_ancaman',TRUE),
		'main_proses' => $this->input->post('main_proses',TRUE),
		'sub_proses' => $this->input->post('sub_proses',TRUE),
		'sub_sub_proses' => $this->input->post('sub_sub_proses',TRUE),
		'input' => $this->input->post('input',TRUE),
		'proses_pdca' => $this->input->post('proses_pdca',TRUE),
		'quality_assurance' => $this->input->post('quality_assurance',TRUE),
		'quality_control' => $this->input->post('quality_control',TRUE),
		'output' => $this->input->post('output',TRUE),
		'penerima_output' => $this->input->post('penerima_output',TRUE),
		'samut' => $this->input->post('samut',TRUE),
		'kpi' => $this->input->post('kpi',TRUE),
		'pic' => $this->input->post('pic',TRUE),
		'jan' => $this->input->post('jan',TRUE),
		'feb' => $this->input->post('feb',TRUE),
		'mar' => $this->input->post('mar',TRUE),
		'apr' => $this->input->post('apr',TRUE),
		'may' => $this->input->post('may',TRUE),
		'jun' => $this->input->post('jun',TRUE),
		'jul' => $this->input->post('jul',TRUE),
		'aug' => $this->input->post('aug',TRUE),
		'sep' => $this->input->post('sep',TRUE),
		'oct' => $this->input->post('oct',TRUE),
		'nov' => $this->input->post('nov',TRUE),
		'dec' => $this->input->post('dec',TRUE),
		'rata_rata' => $this->input->post('rata_rata',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'modify_date' => $this->input->post('modify_date',TRUE),
		'modify_by' => $this->input->post('modify_by',TRUE),
		'department' => $this->input->post('department',TRUE),
		'tahun_samut' => $this->input->post('tahun_samut',TRUE),
	    );

            $this->All_samut_model->update($this->input->post('id_samutdept', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('all_samut'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->All_samut_model->get_by_id($id);

        if ($row) {
            $this->All_samut_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('all_samut'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('all_samut'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pihak_kepentingan', 'pihak kepentingan', 'trim|required');
	$this->form_validation->set_rules('kbthn_hrpn', 'kbthn hrpn', 'trim|required');
	$this->form_validation->set_rules('peluang_ancaman', 'peluang ancaman', 'trim|required');
	$this->form_validation->set_rules('main_proses', 'main proses', 'trim|required');
	$this->form_validation->set_rules('sub_proses', 'sub proses', 'trim|required');
	$this->form_validation->set_rules('sub_sub_proses', 'sub sub proses', 'trim|required');
	$this->form_validation->set_rules('input', 'input', 'trim|required');
	$this->form_validation->set_rules('proses_pdca', 'proses pdca', 'trim|required');
	$this->form_validation->set_rules('quality_assurance', 'quality assurance', 'trim|required');
	$this->form_validation->set_rules('quality_control', 'quality control', 'trim|required');
	$this->form_validation->set_rules('output', 'output', 'trim|required');
	$this->form_validation->set_rules('penerima_output', 'penerima output', 'trim|required');
	$this->form_validation->set_rules('samut', 'samut', 'trim|required');
	$this->form_validation->set_rules('kpi', 'kpi', 'trim|required');
	$this->form_validation->set_rules('pic', 'pic', 'trim|required');
	$this->form_validation->set_rules('jan', 'jan', 'trim|required');
	$this->form_validation->set_rules('feb', 'feb', 'trim|required');
	$this->form_validation->set_rules('mar', 'mar', 'trim|required');
	$this->form_validation->set_rules('apr', 'apr', 'trim|required');
	$this->form_validation->set_rules('may', 'may', 'trim|required');
	$this->form_validation->set_rules('jun', 'jun', 'trim|required');
	$this->form_validation->set_rules('jul', 'jul', 'trim|required');
	$this->form_validation->set_rules('aug', 'aug', 'trim|required');
	$this->form_validation->set_rules('sep', 'sep', 'trim|required');
	$this->form_validation->set_rules('oct', 'oct', 'trim|required');
	$this->form_validation->set_rules('nov', 'nov', 'trim|required');
	$this->form_validation->set_rules('dec', 'dec', 'trim|required');
	$this->form_validation->set_rules('rata_rata', 'rata rata', 'trim|required');
	$this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('modify_date', 'modify date', 'trim|required');
	$this->form_validation->set_rules('modify_by', 'modify by', 'trim|required');
	$this->form_validation->set_rules('department', 'department', 'trim|required');
	$this->form_validation->set_rules('tahun_samut', 'tahun samut', 'trim|required');

	$this->form_validation->set_rules('id_samutdept', 'id_samutdept', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file All_samut.php */
/* Location: ./application/controllers/All_samut.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-28 03:07:16 */
/* http://harviacode.com */