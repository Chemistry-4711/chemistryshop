<?php

/*
* This is the model that will be getting its information from the backend database by using API's
 */

define('REST_SERVER', 'http://backend.local');
define('REST_PORT', $_SERVER['SERVER_PORT']);

class Inventory extends CI_Model {

    // Constructor
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['curl', 'format', 'rest']);
    }

    // retrieve a single inventory item
    public function get($selected)
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        $result = $this->rest->get('/InventoryApi/item/id/' . $selected);
        return $result;
    }

    // retrieve all of the inventories
    public function all()
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        $result = $this->rest->get('/InventoryApi');
        return $result;
    }

    public function update($record) {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->put('/InventoryApi/item/id/' . $record['id'], json_encode($record));
    }

    function add($record)
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->post('/InventoryApi/item/id/' . $record['id'], json_encode($record));
    }

    function delete($key, $key2 = null)
    {
        $this->rest->initialize(array('server' => REST_SERVER));
        $this->rest->option(CURLOPT_PORT, REST_PORT);
        return $this->rest->delete('/InventoryApi/item/id/' . $key);
    }

}
