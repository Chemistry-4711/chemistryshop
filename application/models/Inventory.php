<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Inventory extends CI_Model {

    var $data = array(
        array('id' => '0',  'name' => 'gun-powder',         'price' => 420,  'supplier' => 'ned',          'quantity' => 0),
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
    }

    // retrieve a single inventory item
    public function get($selected)
    {
        // iterate over the data until we find the one we want
        foreach ($this->data as $inventory)
            if ($inventory['name'] == $selected)
                return $inventory;

        return null;
    }

    // retrieve all of the inventories
    public function all()
    {
        return $this->data;
    }

}

?>
