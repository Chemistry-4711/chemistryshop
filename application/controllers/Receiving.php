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
    $source = $this->santize_input($this->inventory->all());

    for ($i = 0; $i < count($source); $i++){

        // change all quantity to 10 for bulk order
        $source[$i]['quantity'] = 10;

        // change price to bulk price
        $source[$i]['price'] = number_format($source[$i]['price'] * 9, 2);
    }

    $this->data['inventory'] = $source;
    $this->render();
  }

  public function validate($id){
      $item = array();
      $item = (array) $this->inventory->get($id);

      // check if theres enough
      if($item['quantity'] >= 10) {
          return true;
      }else{
          return false;
      }
  }

  public function buy($id){

    // check if valid
    if (!$this->validate($id))
        redirect('/receiving');

    $this->data['pagebody'] = 'inventoryReceipt';
    $source = array();
    $source = (array) $this->inventory->get($id);

    // increment the quantity
    $source['quantity'] += 10;
    $this->inventory->update($source);

    // display data to view
    $this->data['name'] = ucfirst($source['name']);
    $this->data['price'] = $source['price'] * 9;
    $this->data['supplier'] = ucfirst($source['supplier']);
    $this->data['quantity'] = 10;
    $this->render();
  }

  private function santize_input($record) {
      $newArray;
      foreach ( $record as $key => $value )
          $newArray[$key] = json_decode(json_encode($value), true);

      return $newArray;
  }

}
