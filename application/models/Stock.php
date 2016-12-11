<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Stock extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    function rules() {
        $config = [
            ['field'=>'id', 'label'=>'Stock code', 'rules'=> 'required|integer'],
            ['field'=>'name', 'label'=>'Stock name', 'rules'=> 'required'],
            ['field'=>'description', 'label'=>'Stock description', 'rules'=> 'required'],
            ['field'=>'price', 'label'=>'Stock price', 'rules'=> 'required|integer'],
            ['field'=>'num_sold', 'label'=>'Stock num_sold', 'rules'=> 'required|integer'],
            ['field'=>'quantity', 'label'=>'Stock quantity', 'rules'=> 'required|integer']
        ];
        return $config;
    }

}
