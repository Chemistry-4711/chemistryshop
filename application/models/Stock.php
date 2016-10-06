<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Stock
 *
 * @author Ben
 * @version 06/10/2016
 * 
 */
class Stock extends CI_Model {
    
    // Constructor
    public function __construct() {
        parent::__construct();
    }
    
    // Initialize dummy data
    var $data = array(
		array('id' => '1', 'name' => 'C4',              'description' => 'Remote controlled explosive device',           'price' => '$14.95', 'num_sold' => "12",  'quantity' => '100'),
                array('id' => '2', 'name' => 'Methamphetamine', 'description' => 'inject into bloodstream to feel good',         'price' => '$50.00', 'num_sold' => "31",  'quantity' => '250'),
                array('id' => '3', 'name' => 'Advil',           'description' => 'Swallow to relieve headaches and pain',        'price' => '$2.50',  'num_sold' => "842", 'quantity' => '1200'),
                array('id' => '4', 'name' => 'Vitamins',        'description' => 'Eat once a day to get all necessary vitamins', 'price' => '$5.70',  'num_sold' => "253", 'quantity' => '850'),
                array('id' => '5', 'name' => 'Stink Bomb',      'description' => 'Throw to stink things up',                     'price' => '$50.00', 'num_sold' => "25",  'quantity' => '350'),
                array('id' => '6', 'name' => 'Smoke Bomb',      'description' => 'Throw to provide a large amount of smoke',     'price' => '$50.00', 'num_sold' => "88",  'quantity' => '650')
                ); 
    
    
    // Gets a single row associated with the id, if no id matches return null.
    public function get($id) {
        foreach ($this->data as $row) {
            if ($row['id'] == $id) {
                return $row;
            }
        }
        return null;
    }
    
    // retrieve all stock information
    public function all() {
        return $this->data;
    }
}