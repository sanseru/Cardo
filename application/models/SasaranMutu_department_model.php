<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SasaranMutu_department_model extends CI_Model
{

    public $table = 'tbl_samutdep';
    public $id = 'id_samutdept';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json($id) {
        $this->datatables->select('id_samutdept,pihak_kepentingan,kbthn_hrpn,peluang_ancaman,main_proses,sub_proses,sub_sub_proses,input,proses_pdca,quality_assurance,quality_control,output,penerima_output,samut,kpi,pic,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec,rata_rata,created_date,created_by,modify_date,modify_by');
		$this->datatables->from('tbl_samutdep');
		$this->datatables->where('tahun_samut', $id);
		$this->datatables->where('department', $this->session->userdata('id_users',TRUE));

        //add this line for join
        //$this->datatables->join('table2', 'tbl_samutdep.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('sasaranmutu_department/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
            ".anchor(site_url('sasaranmutu_department/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
                ".anchor(site_url('sasaranmutu_department/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_samutdept');
        return $this->datatables->generate();
	}
	
	function json_2($id) {
        $this->datatables->select('id_samutdept,pihak_kepentingan,kbthn_hrpn,peluang_ancaman,main_proses,sub_proses,sub_sub_proses,input,proses_pdca,quality_assurance,quality_control,output,penerima_output,samut,kpi,pic,jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec,rata_rata,created_date,created_by,modify_date,modify_by');
		$this->datatables->from('tbl_samutdep');
		$this->datatables->where('id_samutdept', $id);

        //add this line for join
        //$this->datatables->join('table2', 'tbl_samutdep.field = table2.field');
        // $this->datatables->add_column('action', anchor(site_url('sasaranmutu_department/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
        //     ".anchor(site_url('sasaranmutu_department/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
        //         ".anchor(site_url('sasaranmutu_department/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_samutdept');
        return $this->datatables->generate();
	}
	
	function json_3() {
        $this->datatables->select('id_thn,tahun');
		$this->datatables->from('tbl_tahun_qhse');
		// $this->datatables->where('department', $this->session->userdata('id_users',TRUE));
        // $this->datatables->join('tbl_samutdep', 'tbl_tahun_qhse.id_thn = tbl_samutdep.tahun_samut','left');
		$this->datatables->edit_column('client_v', '<a href="SasaranMutu_department/view_samutdep/$1">$2</a>', 'id_thn, tahun');

        //add this line for join
        //$this->datatables->join('table2', 'tbl_samutdep.field = table2.field');
        // $this->datatables->add_column('action', anchor(site_url('sasaranmutu_department/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
        //     ".anchor(site_url('sasaranmutu_department/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
        //         ".anchor(site_url('sasaranmutu_department/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_samutdept');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_samutdept', $q);
	$this->db->or_like('pihak_kepentingan', $q);
	$this->db->or_like('kbthn_hrpn', $q);
	$this->db->or_like('peluang_ancaman', $q);
	$this->db->or_like('main_proses', $q);
	$this->db->or_like('sub_proses', $q);
	$this->db->or_like('sub_sub_proses', $q);
	$this->db->or_like('input', $q);
	$this->db->or_like('proses_pdca', $q);
	$this->db->or_like('quality_assurance', $q);
	$this->db->or_like('quality_control', $q);
	$this->db->or_like('output', $q);
	$this->db->or_like('penerima_output', $q);
	$this->db->or_like('samut', $q);
	$this->db->or_like('kpi', $q);
	$this->db->or_like('pic', $q);
	$this->db->or_like('jan', $q);
	$this->db->or_like('feb', $q);
	$this->db->or_like('mar', $q);
	$this->db->or_like('apr', $q);
	$this->db->or_like('may', $q);
	$this->db->or_like('jun', $q);
	$this->db->or_like('jul', $q);
	$this->db->or_like('agug', $q);
	$this->db->or_like('sep', $q);
	$this->db->or_like('oct', $q);
	$this->db->or_like('nov', $q);
	$this->db->or_like('dec', $q);
	$this->db->or_like('rata_rata', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('modify_date', $q);
	$this->db->or_like('modify_by', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_samutdept', $q);
	$this->db->or_like('pihak_kepentingan', $q);
	$this->db->or_like('kbthn_hrpn', $q);
	$this->db->or_like('peluang_ancaman', $q);
	$this->db->or_like('main_proses', $q);
	$this->db->or_like('sub_proses', $q);
	$this->db->or_like('sub_sub_proses', $q);
	$this->db->or_like('input', $q);
	$this->db->or_like('proses_pdca', $q);
	$this->db->or_like('quality_assurance', $q);
	$this->db->or_like('quality_control', $q);
	$this->db->or_like('output', $q);
	$this->db->or_like('penerima_output', $q);
	$this->db->or_like('samut', $q);
	$this->db->or_like('kpi', $q);
	$this->db->or_like('pic', $q);
	$this->db->or_like('jan', $q);
	$this->db->or_like('feb', $q);
	$this->db->or_like('mar', $q);
	$this->db->or_like('apr', $q);
	$this->db->or_like('may', $q);
	$this->db->or_like('jun', $q);
	$this->db->or_like('jul', $q);
	$this->db->or_like('agug', $q);
	$this->db->or_like('sep', $q);
	$this->db->or_like('oct', $q);
	$this->db->or_like('nov', $q);
	$this->db->or_like('dec', $q);
	$this->db->or_like('rata_rata', $q);
	$this->db->or_like('created_date', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('modify_date', $q);
	$this->db->or_like('modify_by', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file SasaranMutu_department_model.php */
/* Location: ./application/models/SasaranMutu_department_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-21 04:14:14 */
/* http://harviacode.com */