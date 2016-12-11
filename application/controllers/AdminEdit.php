<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEdit extends Application{

  function __construct(){
      parent::__construct();
  }

  function index(){
    $this->data['pagebody'] = 'admin_page'; // which view to display on
    $tmpData = $this->db->query("SELECT * FROM recipes INNER JOIN costs ON recipes.name=costs.name WHERE recipes.name='C4'");
    $result = $tmpData->result_array();
    $this->data['stuff'] = $result;    // allows use variables in views
    $this->render();
  }
}
