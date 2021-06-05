<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    private $table = "menu";
 
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function actSave($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function updateMenu($data,$id)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }

    public function hapusMenu($id){
        return $this->db->query("DELETE FROM menu WHERE id='$id'");
    }
}