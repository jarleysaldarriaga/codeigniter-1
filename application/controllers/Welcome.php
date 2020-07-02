<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('home');
		$this->load->view('includes/footer');

	}

	/*
	public function insert(){
		$this->Web_model->insertProfessor();
	}

	public function get(){
		$result = $this->Web_model->getProfessor();
		print_r ($result);
	}

	public function update(){
		$this->Web_model->updateProfessor();
	}*/
}

?>