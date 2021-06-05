<?php 
use GuzzleHttp\Client;

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    private $_client;

    public function __construct() {
        $this->_client = new Client([
            'base_uri'  => 'http://localhost/order-app/api/',
            'auth'      => ['admin', '1234']
        ]);
    }
 
    public function getAll()
    {
        try {
            $response = $this->_client->request('GET', 'Menu', [
                'query' => [
                    'orderKey' => 'kasir123'
                ]
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
    
            return $result['data'];
        } catch (Exception $th) {
            return false;
        }
    }
    
    public function getById($id)
    {
        try {
            $response = $this->_client->request('GET', 'Menu', [
                'query' => [
                    'orderKey' => 'kasir123',
                    'id' => $id
                ]
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
    
            return $result['data'];
        } catch (Exception $th) {
            return false;
        }
    }

    public function actSave($data)
    {
        $data['orderKey'] = 'kasir123';
       
        try {
            $response = $this->_client->request('POST', 'Menu', [
                'form_params' => $data
                
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
            
            return $result;
        } catch (Exception $th) {
            return false;
        }
    }


    public function updateMenu($data,$id)
    {
        $data['orderKey'] = 'kasir123';
        $data['id'] = $id;
                
        try {
            $response = $this->_client->request('PUT', 'Menu', [
                'form_params' => $data                
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
            
           
            return $result;
        } catch (Exception $th) {
            return false;
        }
    }

    public function hapusMenu($id){
        try {
            $response = $this->_client->request('DELETE', 'Menu', [
                'form_params' => [
                    'id' => $id,
                    'orderKey' => 'kasir123'
                ]
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
    
            return $result;
        } catch (Exception $th) {
            return false;
        }
    }
}