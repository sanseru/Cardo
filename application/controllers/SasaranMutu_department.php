<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SasaranMutu_department extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('SasaranMutu_department_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {

        $this->template->load('template','sasaranmutu_department/tbl_samutdep_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->SasaranMutu_department_model->json();
	}
	
	public function json_2($id) {

        header('Content-Type: application/json');
        echo $this->SasaranMutu_department_model->json_2($id);
    }

    public function read($id) 
    {
        $row = $this->SasaranMutu_department_model->get_by_id($id);
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
		'id'=>$this->uri->segment(3),
	    );
            $this->template->load('template','sasaranmutu_department/tbl_samutdep_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sasaranmutu_department'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sasaranmutu_department/create_action'),
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
	);
        $this->template->load('template','sasaranmutu_department/tbl_samutdep_form', $data);
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
		'created_date' =>$now,
		'created_by' => $this->session->userdata('full_name',TRUE),
		'department' => $this->session->userdata('id_users',TRUE),
		'tahun_samut' => $this->input->post('tahun',TRUE),

	    );

            $this->SasaranMutu_department_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('sasaranmutu_department'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->SasaranMutu_department_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sasaranmutu_department/update_action'),
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
		'modify_date' => set_value('modify_date', $row->modify_date),
		'modify_by' => set_value('modify_by', $row->modify_by),
		'tahun' => set_value('tahun_samut', $row->tahun_samut),

	    );
            $this->template->load('template','sasaranmutu_department/tbl_samutdep_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sasaranmutu_department'));
        }
    }
    
    public function update_action() 
    {
		date_default_timezone_set('Asia/Jakarta');
		$now = date('y-m-d H:i:s');
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
		// 'jan' => $this->input->post('jan',TRUE),
		// 'feb' => $this->input->post('feb',TRUE),
		// 'mar' => $this->input->post('mar',TRUE),
		// 'apr' => $this->input->post('apr',TRUE),
		// 'may' => $this->input->post('may',TRUE),
		// 'jun' => $this->input->post('jun',TRUE),
		// 'jul' => $this->input->post('jul',TRUE),
		// 'aug' => $this->input->post('agug',TRUE),
		// 'sep' => $this->input->post('sep',TRUE),
		// 'oct' => $this->input->post('oct',TRUE),
		// 'nov' => $this->input->post('nov',TRUE),
		// 'dec' => $this->input->post('dec',TRUE),
		// 'rata_rata' => $this->input->post('rata_rata',TRUE),
		'modify_date' => $now,
		'modify_by' => $this->session->userdata('full_name',TRUE),
		'department' => $this->session->userdata('id_users',TRUE),
		'tahun_samut' => $this->input->post('tahun',TRUE),

	    );

            $this->SasaranMutu_department_model->update($this->input->post('id_samutdept', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sasaranmutu_department'));
        }
	}
	
	public function update_action_pencapaian() 
    {
		date_default_timezone_set('Asia/Jakarta');
		$now = date('y-m-d H:i:s');
        // $this->_rules();


            $data = array(
		'jan' => $this->input->post('jan',TRUE),
		'feb' => $this->input->post('feb',TRUE),
		'mar' => $this->input->post('mar',TRUE),
		'apr' => $this->input->post('apr',TRUE),
		'may' => $this->input->post('may',TRUE),
		'jun' => $this->input->post('jun',TRUE),
		'jul' => $this->input->post('jul',TRUE),
		'aug' => $this->input->post('agug',TRUE),
		'sep' => $this->input->post('sep',TRUE),
		'oct' => $this->input->post('oct',TRUE),
		'nov' => $this->input->post('nov',TRUE),
		'dec' => $this->input->post('dec',TRUE),
		// 'rata_rata' => $this->input->post('rata_rata',TRUE),
		'modify_date' => $now,
		'modify_by' => $this->session->userdata('full_name',TRUE),
		'department' => $this->session->userdata('id_users',TRUE),
	    );

            $this->SasaranMutu_department_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sasaranmutu_department/read/'.$this->input->post('id', TRUE)));
        
    }
    
    public function delete($id) 
    {
        $row = $this->SasaranMutu_department_model->get_by_id($id);

        if ($row) {
            $this->SasaranMutu_department_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sasaranmutu_department'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sasaranmutu_department'));
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
	// $this->form_validation->set_rules('jan', 'jan', 'trim|required');
	// $this->form_validation->set_rules('feb', 'feb', 'trim|required');
	// $this->form_validation->set_rules('mar', 'mar', 'trim|required');
	// $this->form_validation->set_rules('apr', 'apr', 'trim|required');
	// $this->form_validation->set_rules('may', 'may', 'trim|required');
	// $this->form_validation->set_rules('jun', 'jun', 'trim|required');
	// $this->form_validation->set_rules('jul', 'jul', 'trim|required');
	// $this->form_validation->set_rules('agug', 'agug', 'trim|required');
	// $this->form_validation->set_rules('sep', 'sep', 'trim|required');
	// $this->form_validation->set_rules('oct', 'oct', 'trim|required');
	// $this->form_validation->set_rules('nov', 'nov', 'trim|required');
	// $this->form_validation->set_rules('dec', 'dec', 'trim|required');
	// $this->form_validation->set_rules('rata_rata', 'rata rata', 'trim|required');
	// $this->form_validation->set_rules('created_date', 'created date', 'trim|required');
	// $this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	// $this->form_validation->set_rules('modify_date', 'modify date', 'trim|required');
	// $this->form_validation->set_rules('modify_by', 'modify by', 'trim|required');

	$this->form_validation->set_rules('id_samutdept', 'id_samutdept', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_samutdep.xls";
        $judul = "tbl_samutdep";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Pihak Kepentingan");
	xlsWriteLabel($tablehead, $kolomhead++, "Kbthn Hrpn");
	xlsWriteLabel($tablehead, $kolomhead++, "Peluang Ancaman");
	xlsWriteLabel($tablehead, $kolomhead++, "Main Proses");
	xlsWriteLabel($tablehead, $kolomhead++, "Sub Proses");
	xlsWriteLabel($tablehead, $kolomhead++, "Sub Sub Proses");
	xlsWriteLabel($tablehead, $kolomhead++, "Input");
	xlsWriteLabel($tablehead, $kolomhead++, "Proses Pdca");
	xlsWriteLabel($tablehead, $kolomhead++, "Quality Assurance");
	xlsWriteLabel($tablehead, $kolomhead++, "Quality Control");
	xlsWriteLabel($tablehead, $kolomhead++, "Output");
	xlsWriteLabel($tablehead, $kolomhead++, "Penerima Output");
	xlsWriteLabel($tablehead, $kolomhead++, "Samut");
	xlsWriteLabel($tablehead, $kolomhead++, "Kpi");
	xlsWriteLabel($tablehead, $kolomhead++, "Pic");
	xlsWriteLabel($tablehead, $kolomhead++, "Jan");
	xlsWriteLabel($tablehead, $kolomhead++, "Feb");
	xlsWriteLabel($tablehead, $kolomhead++, "Mar");
	xlsWriteLabel($tablehead, $kolomhead++, "Apr");
	xlsWriteLabel($tablehead, $kolomhead++, "May");
	xlsWriteLabel($tablehead, $kolomhead++, "Jun");
	xlsWriteLabel($tablehead, $kolomhead++, "Jul");
	xlsWriteLabel($tablehead, $kolomhead++, "Agug");
	xlsWriteLabel($tablehead, $kolomhead++, "Sep");
	xlsWriteLabel($tablehead, $kolomhead++, "Oct");
	xlsWriteLabel($tablehead, $kolomhead++, "Nov");
	xlsWriteLabel($tablehead, $kolomhead++, "Dec");
	xlsWriteLabel($tablehead, $kolomhead++, "Rata Rata");
	xlsWriteLabel($tablehead, $kolomhead++, "Created Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Modify Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Modify By");

	foreach ($this->SasaranMutu_department_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pihak_kepentingan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kbthn_hrpn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->peluang_ancaman);
	    xlsWriteLabel($tablebody, $kolombody++, $data->main_proses);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sub_proses);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sub_sub_proses);
	    xlsWriteLabel($tablebody, $kolombody++, $data->input);
	    xlsWriteLabel($tablebody, $kolombody++, $data->proses_pdca);
	    xlsWriteLabel($tablebody, $kolombody++, $data->quality_assurance);
	    xlsWriteLabel($tablebody, $kolombody++, $data->quality_control);
	    xlsWriteLabel($tablebody, $kolombody++, $data->output);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penerima_output);
	    xlsWriteLabel($tablebody, $kolombody++, $data->samut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kpi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pic);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->feb);
	    xlsWriteNumber($tablebody, $kolombody++, $data->mar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->apr);
	    xlsWriteNumber($tablebody, $kolombody++, $data->may);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jun);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jul);
	    xlsWriteNumber($tablebody, $kolombody++, $data->aug);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sep);
	    xlsWriteNumber($tablebody, $kolombody++, $data->oct);
	    xlsWriteNumber($tablebody, $kolombody++, $data->nov);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dec);
	    xlsWriteNumber($tablebody, $kolombody++, $data->rata_rata);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->modify_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->modify_by);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file SasaranMutu_department.php */
/* Location: ./application/controllers/SasaranMutu_department.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 04:14:14 */
/* http://harviacode.com */