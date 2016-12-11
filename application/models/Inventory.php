<?php

/*
* This is the model that will be getting its information from the backend database by using API's
 */

define('REST_SERVER', 'http://backend.local');
define('REST_PORT', $_SERVER['SERVER_PORT']);

class Inventory extends CI_Model {

    var $data = array(
        array('id' => '0',  'name' => 'gun-powder',         'price' => 420,  'supplier' => 'ned',          'quantity' => 1),
        array('id' => '1',  'name' => 'h2o',                'price' => 1,    'supplier' => 'wonderland',   'quantity' => 6666),
        array('id' => '2',  'name' => 'peanuts',            'price' => 5,    'supplier' => 'superstore',   'quantity' => 50),
        array('id' => '3',  'name' => 'lithium',            'price' => 200,  'supplier' => 'amazon',       'quantity' => 666),
        array('id' => '4',  'name' => 'hydrochloric-acid',  'price' => 670,  'supplier' => 'bill',         'quantity' => 666),
        array('id' => '5',  'name' => 'eggs',               'price' => 20,   'supplier' => 'superstore',   'quantity' => 1),
        array('id' => '6',  'name' => 'milk',               'price' => 20,   'supplier' => 'superstore',   'quantity' => 300),
        array('id' => '7',  'name' => 'vanilla-extract',    'price' => 20,   'supplier' => 'superstore',   'quantity' => 500),
        array('id' => '8',  'name' => 'flour',              'price' => 20,   'supplier' => 'superstore',   'quantity' => 700)
    );

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

}

?>
