<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	
    function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
        $this->load->model('menu_model');        
        $this->load->library('form_validation');
	}
	
	public function index()
	{
        $data['menus'] = $this->menu_model->getAll();
        // var_dump($data);die();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('temp/navbar');
		$this->load->view('menu/view-menu', $data);
        $this->load->view('menu/modalMenu', $data);
	}

    public function addMenu()
	{
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('temp/navbar');
		$this->load->view('menu/add-menu');
	}

    public function actSave()
    {
        $this->form_validation->set_rules('namaBarang','Nama Barang','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('statusBarang','Status Barang','required');

		if ($this->form_validation->run()==true)
        {
			$data['nama'] = $this->input->post('namaBarang', true);
			$data['kategori'] = $this->input->post('kategori', true);
			$data['harga'] = $this->input->post('harga', true);
			$data['status'] = $this->input->post('statusBarang', true);
			$data['deskripsi'] = $this->input->post('deskripsi', true);
			$data['created_by'] = $this->session->userdata('id', true);

			$insert = $this->menu_model->actSave($data);

			if ($insert) {
				$this->session->set_flashdata('success', 'Berhasil disimpan');
			}else{
				$this->session->set_flashdata('failed', 'Gagal disimpan');
			}
			redirect('menu');
		}
		else
		{
			$this->load->view('temp/header');
            $this->load->view('temp/sidebar');
            $this->load->view('temp/navbar');
            $this->load->view('menu/add-menu');
		}
    }

    public function editMenu($id = null)
    {
        if (!isset($id)) redirect('menu');
       
        $this->form_validation->set_rules('namaBarang','Nama Barang','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('statusBarang','Status Barang','required');

        if ($this->form_validation->run()==true) {
            $data['nama'] = $this->input->post('namaBarang', true);
			$data['kategori'] = $this->input->post('kategori', true);
			$data['harga'] = $this->input->post('harga', true);
			$data['status'] = $this->input->post('statusBarang', true);
			$data['deskripsi'] = $this->input->post('deskripsi', true);
			$data['updated'] = date('Y-m-d', true);
			$data['updated_by'] = $this->session->userdata('id', true);

            $update = $this->menu_model->updateMenu($data,$id);

			if ($update) {
				$this->session->set_flashdata('success', 'Berhasil diubah');
			}else{
				$this->session->set_flashdata('failed', 'Gagl diubah');
			}

			redirect('menu');
        }

        $data["menus"] = $this->menu_model->getById($id);
        if (!$data["menus"]) show_404();
        
        $this->load->view('temp/header');
        $this->load->view('temp/sidebar');
        $this->load->view('temp/navbar');
        $this->load->view('menu/edit-menu', $data);
    }

    public function hapusMenu()
    {
        $id=$this->input->post('id');
		$this->session->set_flashdata('success', 'Berhasil dihapus');
        $this->menu_model->hapusMenu($id);
        redirect('menu');
    }
}