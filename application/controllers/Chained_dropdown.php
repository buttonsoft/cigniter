<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chained_dropdown extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('provinsi_m','provinsi');
		$this->load->model('kota_m','kota');
	}

	public function index() {
		$data['provinsi'] = $this->provinsi->view();
		$this->load->view('dropdown/form', $data);
	}

	public function list_kota() {
		$id_provinsi = $this->input->post('id_provinsi');
		$kota = $this->kota->viewByProvinsi($id_provinsi);

		$lists = "<option value=''>Pilih</option>";

		foreach ($kota as $data) {
			$lists .= "<option value='".$data->id."'>".$data->nama."</option>";
		}

		$callback = array('list_kota' => $lists);
		echo json_encode($callback);
	}

}