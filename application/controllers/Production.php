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

  /*
  * Shows a single recipe with the ingredients needed for it to be created
  */
  public function show($id){

      $this->data['pagebody'] = 'recipes_single';

      $recipe = $this->recipes->get($id);

      // merge the data for recipe
      $this->data = array_merge($this->data, $recipe);

      // get the names of the ingredients
      $names = array_keys($recipe['cost']);

      // get the cost
      $cost = $recipe['cost'];

      // ingredients array to store the names
      $ingredients = array();
      // flag to check if its able to make
      $ableToMake = true;
      foreach($names as $name)
      {
          // get the inventory of the ingredient
          $inventory = $this->inventory->get($name);

          // check if theres enough of ingredients required
          $amount = ($inventory['quantity'] - $cost[$name]);

          // flags ingredients that are not available
          if($amount < 0){
              $ableToMake = false;
              $ingredients[] = array('name' => $name, 'costToMake' => $cost[$name], 'inventory' => $inventory['quantity'], 'available' => "Not Enough Available");
          }else {
              $ingredients[] = array('name' => $name, 'costToMake' => $cost[$name], 'inventory' => $inventory['quantity'], 'available' => "Enough Available");
          }

      }

      // generate the message if recipe is makeable
      if($ableToMake){
          $message = "You can create this recipe. Would you like make " . $recipe['name'] . "?";
      }else{
          $message = "You can can't create this recipe. Please buy more ingredients.";
      }

      $this->data['message'] = $message;
      $this->data['ingredients'] = $ingredients;
      $this->render();
  }

}
