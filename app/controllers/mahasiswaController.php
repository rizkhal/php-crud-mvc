<?php

class mahasiswaController extends Controller {

	public function index()
	{		
		$data['title'] = 'Halaman mahasiswa';
		$data['judul'] = 'Data mahasiswa';

		$data['mahasiswa'] = $this->model('Mahasiswa')->getAll();

		$this->view('templates/header', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

	public function create()
	{
		$data['title'] = 'Halaman create';
		$this->view('templates/header', $data);
		$this->view('mahasiswa/create');
	}

	public function store()
	{
		$name  = $_POST['name'];
		$email = $_POST['email'];

		$this->model('Mahasiswa')->store($name, $email);
		$this->redirect('mahasiswa');
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Data Mahasiswa';

		$data['mahasiswa'] = $this->model('Mahasiswa')->edit($id);

		$this->view('templates/header', $data);
		$this->view('mahasiswa/edit', $data);
	}

	public function update($id)
	{
		$name  = $_POST['name'];
		$email = $_POST['email'];

		$this->model('Mahasiswa')->update($id, $name, $email);

		$this->redirect('mahasiswa');
	}

	public function destroy($id)
	{
		$this->model('Mahasiswa')->destroy($id);

		$this->redirect('mahasiswa');
	}



}