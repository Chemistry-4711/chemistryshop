<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Receiving extends Application{

// Constructor
  function __construct(){
    parent::__construct();
  }

  /**
  * Homepage for the received
  */
  public function index(){
    $this->data['pagebody'] = 'inventoryList';
    $source = array();
    $source = $this->inventory->all();

    $this->data['inventory'] = $source;
    $this->render();
  }

  public function receipt($itemName){
    $this->data['pagebody'] = 'inventoryReceipt';
    $source = array();
    $source = $this->inventory->get($itemName);

    $this->data['name'] = ucfirst($source['name']);
    $this->data['price'] = $source['price'];
    $this->data['supplier'] = ucfirst($source['supplier']);
    $this->data['quantity'] = $source['quantity'];
    $this->render();
  }

}
