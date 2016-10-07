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
    $this->data['pagebody'] = 'welcome_message';
    $this->render();
  }

}
