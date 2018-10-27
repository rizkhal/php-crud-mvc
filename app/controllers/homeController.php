<?php

class homeController extends Controller{

	public function index()
	{
		$data['title'] = 'Halaman Home';
		$data['nama'] = $this->model('User')->getUser();

		$this->view('templates/header', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}

}