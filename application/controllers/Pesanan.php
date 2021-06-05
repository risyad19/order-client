<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
	
    function __construct(){
		parent::__construct();
		if($this->session->userdata('logged') !=TRUE){
            $url=base_url('login');
            redirect($url);
		};
        $this->load->model('pesanan_model');        
        $this->load->library('form_validation');
	}
	
	public function index()
	{
        $data['pesanan'] = $this->pesanan_model->getAll();
        // var_dump($data['pesanan']);die();
		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('temp/navbar');
		$this->load->view('pesanan/view-pesanan', $data);
        $this->load->view('pesanan/modalPesanan', $data);
	}

	public function hapusPesanan()
	{
		$id=$this->input->post('no_order');
        $delete = $this->pesanan_model->hapusPesanan($id);
		if ($delete) {
			$this->session->set_flashdata('success', 'Berhasil dihapus');
		} else {
			$this->session->set_flashdata('failed', 'Gagal dihapus');
		}
		
        redirect('pesanan');
	}

	public function addPesanan()
	{
		$data['daftarMenu'] = $this->pesanan_model->getDaftarMenu();

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('temp/navbar');
		$this->load->view('pesanan/add-pesanan', $data);
	}

	// public function actAdd()
	// {
	// 	$no_meja = $this->input->post('nomeja');
	// 	$totitemall = $this->input->post('totitemall');
	// 	$tothargaall = $this->input->post('tothargaall');
	// 	$idMenu = $this->input->post('idMenu');
	// 	$qty = $this->input->post('qty');
	// 	$totharga = $this->input->post('totharga');

	// 	$noOrder = $this->pesanan_model->getNoOrders();

	// 	$detailMenu = [];
	// 	for ($i=0; $i < count($idMenu) ; $i++) { 
	// 		$detailMenu[] = array(
	// 			"no_order" => $noOrder,
	// 			"id_menu"  => $idMenu[$i],
	// 			"qty" 	   => $qty[$i],
	// 			"totalperitem" => $totharga[$i],
	// 			"created_by" => $this->session->userdata('id')				
	// 		); 
	// 	};
		
	// 	$dataOrder =  array(
	// 		"no_order" => $noOrder,
	// 		"no_meja" => $no_meja,
	// 		"tanggal_order" => date('Y-m-d'),
	// 		"total_item" => $totitemall,
	// 		"total_harga" => $tothargaall,
	// 		"created_by" => $this->session->userdata('id')
	// 	);

	// 	$insertData = $this->pesanan_model->actSave($dataOrder, $detailMenu);
		
	// 	echo json_encode($insertData);
	// 	// redirect('pesanan');
	// }

	public function getDetailMenu()
	{
		$id = $this->input->post('idMenu');
		$data = $this->pesanan_model->getDetailMenu($id);

		echo json_encode($data);
	}

	public function editPesanan($noorder)
	{
		$data['daftarMenu'] = $this->pesanan_model->getDaftarMenu();
		$data['headOrder'] = $this->pesanan_model->getHeadOrder($noorder);

		$this->load->view('temp/header');
		$this->load->view('temp/sidebar');
		$this->load->view('temp/navbar');
		$this->load->view('pesanan/edit-pesanan', $data);
	}

	public function getDetailOrder()
	{
		$noorder = $this->input->post('noorder');
		$data = $this->pesanan_model->getDetailOrder($noorder);

		echo json_encode($data);
	}

	public function updateDetail()
	{
		$idDetail = $this->input->post('idDetail');
		$idMenu = $this->input->post('idMenu');
		$qty = $this->input->post('qty');
		$totperitem = $this->input->post('totperitem');

		$data = [
			'id_menu' => $idMenu,
			'qty' => $qty,
			'totalperitem' => $totperitem,
			'updated' => date('Y-m-d'),
			'updated_by' => $this->session->userdata('id')
		];

		$update = $this->pesanan_model->updateDetailOrder($data, $idDetail);

		echo json_encode($update);
	}

	public function deleteDetail()
	{
		$idDetail = $this->input->post('idDetail');

		$delete = $this->pesanan_model->deleteDetailOrder($idDetail);

		echo json_encode($delete);
	}

	public function actUpdate()
	{
		$post = $this->input->post(NULL, TRUE); 
		$noorder = $post['noorder'];
		$no_meja = $post['nomeja'];
		$totitemall = $post['totitemall'];
		$tothargaall = $post['tothargaall'];
		$statusOrder = $post['statusPesanan'];
		$idMenu = isset($post['idMenu']) ? $post['idMenu'] : [];
		$qty = isset($post['qty']) ? $post['qty'] : [];
		$totharga = isset($post['totharga']) ? $post['totharga'] : [];

		$detailMenu = [];
		if (count($idMenu) > 0) {
			for ($i=0; $i < count($idMenu) ; $i++) { 
				$detailMenu[] = array(
					"no_order" => $noorder,
					"id_menu"  => $idMenu[$i],
					"qty" 	   => $qty[$i],
					"totalperitem" => $totharga[$i],
					"created_by" => $this->session->userdata('id')				
				); 
			};
		}
		
		$dataOrder =  array(
			"no_meja" => $no_meja,
			"status_order" => $statusOrder,
			"total_item" => $totitemall,
			"total_harga" => $tothargaall,
			"updated" => date('Y-m-d'),
			"updated_by" => $this->session->userdata('id')
		); //data Header yang akan diupdate

		$updateData = $this->pesanan_model->actUpdate($dataOrder, $detailMenu, $noorder);
		
		echo json_encode($updateData);
		// redirect('pesanan');
	}

}