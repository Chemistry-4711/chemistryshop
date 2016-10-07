<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends Application{

// Constructor
  function __construct(){
    parent::__construct();
  }

  /**
  * Homepage for the recipes
  */
  public function index(){

      $this->data['pagebody'] = 'recipes_list';

      $recipes = $this->recipes->all();

      $this->data['recipes'] = $recipes;
      $this->render();

  }

  public function show($id){

      $this->data['pagebody'] = 'recipes_single';

      $recipe = $this->recipes->get($id);

      // merge the data for recipe
      $this->data = array_merge($this->data, $recipe);

      // get the names of the ingredients
      $names = array_keys($recipe['cost']);

      // ingredients array to store the names
      $ingredients = array();

      foreach($names as $name)
      {
          $ingredients[] = array('name' => $name);
      }

      $this->data['ingredients'] = $ingredients;

      $this->render();
  }

}
