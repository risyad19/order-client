<?php
use GuzzleHttp\Client;

defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model{

    private $_client;

    public function __construct() {
        $this->_client = new Client([
            'base_uri'  => 'http://localhost/order-app/api/',
            'auth'      => ['admin', '1234']
        ]);
    }

    function query_validasi_username($username)
    {
        try {
            $response = $this->_client->request('GET', 'Login', [
                'query' => [
                    'orderKey' => 'kasir123',
                    'username' => $username
                ]
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
    
            return $result['data'];
        } catch (Exception $th) {
            return false;
        }
    }

    function query_validasi_password($username,$password){
        try {
            $response = $this->_client->request('GET', 'Login', [
                'query' => [
                    'orderKey' => 'kasir123',
                    'username' => $username,
                    'password' => $password
                ]
            ]);
    
            $result = json_decode($response->getBody()->getContents(), true);
            
            return $result['data'];
        } catch (Exception $th) {
            return false;
        }
    }

} 