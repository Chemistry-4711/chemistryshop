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

      $recipes = $this->santize_input($this->recipes->all());

      $this->data['recipes'] = $recipes;
      $this->render();

  }

  /*
  * Shows a single recipe with the ingredients needed for it to be created
  */
  public function show($id){

      $this->data['pagebody'] = 'recipes_single';

      //gets all recipes with costs **comes back as an array of arrays
      $tmp = $this->recipes->getWithCost($id);

      $newData = array(); // initialize the array we will be working with later once the data is parsed and sorted
      foreach($tmp as $a){
          foreach($a as $value){
            if($value == "0"){
              //unset any ingredients that we don't need
              $toDelete = array_search($value, $a);
              unset($a[$toDelete]);
            }
          }
          //since there is only 1 recipe we are interested in
          $newData = $a;
      }
      //gets the name of the recipe
      $itemName = $newData["name"];
      $this->data['name'] = $itemName;
      //unset any unwanted data
      unset($newData["id"], $newData["name"], $newData["numberYielded"], $newData["recipe"]);
      $ingredients = array();
      $ableToMake = true;
      //loop through the current data we have
      while($ingredient = current($newData)){
        $key = key($newData);//the name of the ingredient we are interested in
        $inventory = $this->inventory->get($key);
        $amount = ($inventory['quantity'] - $ingredient);
        if($amount < 0){
          $ableToMake = false;
          $ingredients[] = array('name' => $key, 'costToMake' => $newData[$key], 'inventory' => $inventory['quantity'], 'available' => "Not Enough Available");
        }else{
          $ingredients[] = array('name' => $key, 'costToMake' => $newData[$key], 'inventory' => $inventory['quantity'], 'available' => "Enough Available");
        }
        //go to next element in the array
        next($newData);
      }

      if($ableToMake){
          $message = "You can create this recipe. Would you like make " . $itemName . "?";
      }else{
          $message = "You can can't create this recipe. Please buy more ingredients.";
      }

      $this->data['message'] = $message;
      $this->data['ingredients'] = $ingredients;
      $this->render();

  }

  private function santize_input($record) {
      $newArray;
      foreach ( $record as $key => $value )
          $newArray[$key] = json_decode(json_encode($value), true);

      return $newArray;
  }

}
