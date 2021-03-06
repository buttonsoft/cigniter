<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view('autocomplete/index');
	}

	public function search() {

		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('autocomplete')->like('nama', $keyword)->get();

		// format keluaran di dalam array
		foreach ($data->result() as $row) {
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value' => $row->nama,
				'nim' => $row->nim,
				'jurusan' => $row->jurusan
				);
		}
		echo json_encode($arr);
	}

}