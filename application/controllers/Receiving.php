<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$bulk = 10;
class Receiving extends Application{

    //specify the bulk quantity


  // Constructor
  function __construct(){
    parent::__construct();
  }

  /**
  * Homepage for the received
  */
  public function index()
  {

      $userrole = $this->session->userdata('userrole');

      // check user role
      if ($userrole == 'guest') {
          $message = 'You are not authorized to access this page. Go away';
          $this->data['content'] = $message;
          $this->render();
          return;
      }

    global $bulk;

    $this->data['pagebody'] = 'inventoryList';
    $source = array();
    $source = $this->santize_input($this->inventory->all());

    for ($i = 0; $i < count($source); $i++){

        // change all quantity to 10 for bulk order
        $source[$i]['quantity'] = $bulk;

        // change price to bulk price
        $source[$i]['price'] = number_format($source[$i]['price'] * ($bulk - 1), 2);
    }

    $this->data['inventory'] = $source;
    $this->render();
  }


  public function buy($id){
    global $bulk;

    $this->data['pagebody'] = 'inventoryReceipt';
    $source = array();
    $source = (array) $this->inventory->get($id);

    // increment the quantity
    $source['quantity'] += $bulk;
    $this->inventory->update($source);

    $bulkPrice = $source['price'] * 9;

    // display data to view
    $this->data['name'] = ucfirst($source['name']);
    $this->data['price'] = $bulkPrice;
    $this->data['supplier'] = ucfirst($source['supplier']);
    $this->data['quantity'] = $bulk;
    $this->saveOrder($source['id'], $source['name'], $bulk, $bulkPrice);
    $this->render();
  }

  public function saveOrder($id, $name, $quantity, $price) {
      $number = 0;
      // figure out the order to use
      while ($number == 0) {
          // pick random 3 digit #
          $test = rand(100,999);
          // use this if the file doesn't exist
          if (!file_exists('../data/receiving'.$test.'.xml'))
                  $number = $test;
      }

      // start empty
      $xml = new SimpleXMLElement('<order/>');
      // add the main properties
      $xml->addChild('number', $number);
      $xml->addChild('datetime',  date(DATE_ATOM));

      $lineitem = $xml->addChild('item');
      $lineitem->addChild('code', $id);
      $lineitem->addChild('name', $name);
      $lineitem->addChild('quantity', $quantity);
      $lineitem->addChild('price', $price);

      // save it
      $xml->asXML('../data/receiving' . $number . '.xml');
  }

  private function santize_input($record) {
      $newArray;
      foreach ( $record as $key => $value )
          $newArray[$key] = json_decode(json_encode($value), true);

      return $newArray;
  }

}
