<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tahun_qhse extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tahun_qhse_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tahun_qhse/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tahun_qhse/index/';
            $config['first_url'] = base_url() . 'index.php/tahun_qhse/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tahun_qhse_model->total_rows($q);
        $tahun_qhse = $this->Tahun_qhse_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tahun_qhse_data' => $tahun_qhse,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tahun_qhse/tbl_tahun_qhse_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tahun_qhse_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_thn' => $row->id_thn,
		'Tahun' => $row->Tahun,
		'created_date' => $row->created_date,
		'created_by' => $row->created_by,
		'created_id' => $row->created_id,
	    );
            $this->template->load('template','tahun_qhse/tbl_tahun_qhse_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahun_qhse'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tahun_qhse/create_action'),
	    'id_thn' => set_value('id_thn'),
	    'Tahun' => set_value('Tahun'),
	    'created_date' => set_value('created_date'),
	    'created_by' => set_value('created_by'),
	    'created_id' => set_value('created_id'),
	);
        $this->template->load('template','tahun_qhse/tbl_tahun_qhse_form', $data);
    }
    
    public function create_action() 
    {
        date_default_timezone_set('Asia/Jakarta');
		$now = date('y-m-d H:i:s');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tahun' => $this->input->post('tahun',TRUE),
		'created_date' => $now,
		'created_by' => $this->session->userdata('full_name',TRUE),
		'created_id' => $this->session->userdata('id_users',TRUE),
	    );

            $this->Tahun_qhse_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tahun_qhse'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tahun_qhse_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tahun_qhse/update_action'),
		'id_thn' => set_value('id_thn', $row->id_thn),
		'tahun' => set_value('tahun', $row->Tahun),
		'created_date' => set_value('created_date', $row->created_date),
		'created_by' => set_value('created_by', $row->created_by),
		'created_id' => set_value('created_id', $row->created_id),
	    );
            $this->template->load('template','tahun_qhse/tbl_tahun_qhse_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahun_qhse'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_thn', TRUE));
        } else {
            $data = array(
		'tahun' => $this->input->post('Tahun',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'created_id' => $this->input->post('created_id',TRUE),
	    );

            $this->Tahun_qhse_model->update($this->input->post('id_thn', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tahun_qhse'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tahun_qhse_model->get_by_id($id);

        if ($row) {
            $this->Tahun_qhse_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tahun_qhse'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tahun_qhse'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

	$this->form_validation->set_rules('id_thn', 'id_thn', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tahun_qhse.php */
/* Location: ./application/controllers/Tahun_qhse.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-22 07:47:37 */
/* http://harviacode.com */