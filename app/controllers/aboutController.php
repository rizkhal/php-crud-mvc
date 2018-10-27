<?php

class aboutController extends Controller {

	public function index()
	{
		$data['title'] = 'Halaman About';
		$this->view('templates/header', $data);
		$this->view('about/index');
		$this->view('templates/footer');
	}
	
}