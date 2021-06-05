<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
    private $table = "order";
    private $table_menu = "menu";
 
    public function getAll()
    {
        if ($this->session->userdata('level')=='1') {
            $this->db->from($this->table);
            $this->db->where('status_order', '1');
            $this->db->order_by("id", "desc");
            $query = $this->db->get()->result();
            return $query;            
        } else {
            $this->db->from($this->table);
            $this->db->order_by("id", "desc");
            $query = $this->db->get()->result();
            return $query;
        }
    }

    public function hapusMenu($id){
        return  $this->db->query("DELETE `order`,item_order 
        FROM `order`,item_order
        WHERE `order`.no_order=item_order.no_order 
        AND `order`.no_order= '$id'");
    }

    public function getNoOrders(){
        $dateNow = date('Y-m-d');
        $q = $this->db->query("SELECT MAX(RIGHT(no_order,3)) AS no_max FROM `order` WHERE DATE(tanggal_order)='$dateNow'");
        
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->no_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }else{
            $kd = "001";
        }
        date_default_timezone_set('Asia/Jakarta');
        $noOrder = 'ABC'.date('dmy').'-'.$kd;
        return $noOrder;
    }

    public function getDaftarMenu()
    {
        return $this->db->get_where($this->table_menu, ["status" => '1'])->result();
    }

    public function getDetailMenu($id)
    {
        return $this->db->get_where($this->table_menu, ["id" => $id])->row();
    }

    public function actSave($dataOrder, $detailMenu)
    {
        try {
            $this->db->insert($this->table, $dataOrder);

            foreach ($detailMenu as $key => $val) {
                $this->db->insert('item_order', $val);
            }

            return true;
        } catch (Exception $th) {
            return false;
        }

    }

    public function getHeadOrder($noorder)
    {
        return $this->db->get_where($this->table, ["no_order" => $noorder])->row();
    }

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