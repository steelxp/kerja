<?php

class rekap_harian extends SYGAAS_Controller {
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->load->view( 'surat/surat_keluar/rekap_harian');
	}
}