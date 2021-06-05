<?php 
use GuzzleHttp\Client;

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
    private $_client;
    private $table = "order";
    private $table_menu = "menu";
    public function __construct() {
        $this->_client = new Client([
            'base_uri'  => 'http://localhost/order-app/api/',
            'auth'      => ['admin', '1234']
        ]);
    }
 
    //Function untuk ambil semua data pesanan, yang akan ditampilkan dihalaman depan
    public function getAll()
    {
        $level = $this->session->userdata('level');

        try {
            if ($this->session->userdata('level')=='1') {
               //Berdasarkan session level user
                $response = $this->_client->request('GET', 'Order', [
                    'query' => [
                        'orderKey' => 'kasir123',
                        'level' => $level
                    ]
                ]);
        
                $result = json_decode($response->getBody()->getContents(), true);
        
                return $result['data'];           
            } else {
                
                $response = $this->_client->request('GET', 'Order', [
                    'query' => [
                        'orderKey' => 'kasir123'
                    ]
                ]);
        
                $result = json_decode($response->getBody()->getContents(), true);
        
                return $result['data'];
            }
            
        } catch (Exception $th) {
            return false;
        }        
    }

    //Hapus pesanan dari halaman depan
    public function hapusPesanan($id){
        
        try {
            $response = $this->_client->request('DELETE', 'Order', [
                'form_params' => [
                    'no_order' => $id,
                    'orderKey' => 'kasir123'
                ]
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
            
            return $result['status'];
        } catch (Exception $th) {
            return false;
        }        
    }

    //Get nomor order sesuai urutan per hari
    public function getNoOrders(){
        $response = $this->_client->request('GET', 'Order/noOrder', [
            'query' => [
                'orderKey' => 'kasir123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    //Mendapatkan daftar menu saat menambhakna pesananan
    public function getDaftarMenu()
    {
        try {
            $response = $this->_client->request('GET', 'Menu', [
                'query' => [
                    'status' => 'aktif', //hanya dengan status yang aktif saja
                    'orderKey' => 'kasir123'
                ]
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
             
            return $result['data'];
        } catch (Exception $th) {
            return false;
        }
    }

    //Mendapatkan detail menunya, seperti harga
    public function getDetailMenu($id)
    {
        try {
            $response = $this->_client->request('GET', 'Menu', [
                'query' => [
                    'id' => $id,
                    'orderKey' => 'kasir123'
                ]
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
                    
            return $result['data'];
        } catch (Exception $th) {
            return false;
        }
    }

    // public function actSave($dataOrder, $detailMenu)
    // {
    //     try {
    //         $this->db->insert($this->table, $dataOrder);

    //         foreach ($detailMenu as $key => $val) {
    //             $this->db->insert('item_order', $val);
    //         }

    //         return true;
    //     } catch (Exception $th) {
    //         return false;
    //     }
        
    // }

    //Bagian edit
    //Mengambil header ke table order
    public function getHeadOrder($noorder)
    {
        $response = $this->_client->request('GET', 'Order', [
            'query' => [
                'id' => $noorder,
                'orderKey' => 'kasir123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];        
    }

    //Mengambil detail ke table item order
    public function getDetailOrder($noorder)
    {
        return $this->db->query("SELECT o.qty, o.totalperitem, o.id, m.nama, m.harga, o.id_menu menu_id FROM item_order AS o LEFT JOIN menu AS m ON m.id = o.id_menu WHERE o.no_order = '$noorder'")->result();  
    }

    public function updateDetailOrder($data, $id)
    {
        try {
            $this->db->update('item_order', $data, array('id' => $id));

            return true;
        } catch (Exception $th) {
            return false;
        }
    }

    public function deleteDetailOrder($idDetail)
    {
        try {
            $this->db->delete('item_order', array('id' => $idDetail));

            return true;
        } catch (Exception $th) {
            return false;
        }
    }

    public function actUpdate($dataOrder, $detailMenu, $noorder)
    {
        try {
            $this->db->update($this->table, $dataOrder, array('no_order' => $noorder));

            if (count($detailMenu) > 0) {
                foreach ($detailMenu as $key => $val) {
                    $this->db->insert('item_order', $val);
                }
            }

            return true;
        } catch (Exception $th) {
            return false;
        }

    }
}