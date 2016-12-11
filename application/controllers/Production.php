<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Production extends Application
{

// Constructor
  public function __construct()
  {
      parent::__construct();
  }

  /**
  * Homepage for the recipes
  */
  public function index()
  {
      $this->data['pagebody'] = 'recipes_list';

      $recipes = $this->santize_input($this->recipes->all());

      $this->data['recipes'] = $recipes;
      $this->render();
  }

  /*
  * Shows a single recipe with the ingredients needed for it to be created
  */
  public function show($id)
  {
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
      $id = $newData["id"];
      $this->data['name'] = $itemName;
      //unset any unwanted data
      unset($newData["id"], $newData["name"], $newData["numberYielded"], $newData["recipe"]);
      $ingredients = array();
      $ableToMake = true;
      //loop through the current data we have

      $inventoryList = $this->santize_input($this->inventory->all());

      while ($ingredient = current($newData)) {

          $key = key($newData);//the name of the ingredient we are interested in
          $name = $key;
          // finding the id of our item
          foreach ( $inventoryList as $inventoryItem ) {
              if($inventoryItem['name'] == $key) {
                  $key = $inventoryItem['id'];
                  break;
              }
          }

          $inventory = json_decode(json_encode($this->inventory->get($key)), true);

          $amount = (intval($inventory['quantity']) - intval($ingredient));
          if ($amount < 0) {
              $ableToMake = false;
              $ingredients[] = array('name' => $name, 'costToMake' => $newData[$name], 'inventory' => $inventory['quantity'], 'available' => "Not Enough Available");
          } else {
              $ingredients[] = array('name' => $name, 'costToMake' => $newData[$name], 'inventory' => $inventory['quantity'], 'available' => "Enough Available");
          }
        //go to next element in the array
        next($newData);
      }

      if ( $ableToMake ) {
          $message = "You can create this recipe. Would you like make " . $itemName . "?";
          $message .= '<br><br><a href="/production/create/' . $id .'" class="btn btn-success">Create Now</a>';
      } else
          $message = "You can can't create this recipe. Please buy more ingredients.";

      $this->data['message'] = $message;
      $this->data['ingredients'] = $ingredients;
      $this->render();

  }

    private function santize_input($record)
    {
        $newArray;
        foreach ($record as $key => $value) {
            $newArray[$key] = json_decode(json_encode($value), true);
        }

        return $newArray;
    }

    public function create($id) {
        // die($id);
        $record = $this->recipes->getWithCost($id)[0];
        $recordWithoutCost = (array) $this->recipes->get($id);
        $inventoryList = $this->santize_input($this->inventory->all());
        $stocks = $this->santize_input($this->stock->all());

        $stock;

        foreach( $stocks as $value )
            if( $value['name'] == $record['name'] ) {
                $stock = $value;
                break;
            }


        $itemsNeeded = array();

        foreach ( $record as $name => $cost )
            if ( $name != 'recipe' &&
                 $name != 'numberYielded' &&
                 $name != 'name' &&
                 $name != 'id' &&
                 intval($cost) > 0 )
            {
                $itemsNeeded[$name] = intval($cost);
            }

        foreach ( $itemsNeeded as $name => $cost )
            foreach ( $inventoryList as $key => $value )
                if ( $value['name'] == $name ) {
                    $newInventoryCount = intval($value['quantity']) - $cost;
                    // die( ( $value['quantity'] - $cost ) ) ;
                    $value['quantity'] = $newInventoryCount;
                    $this->inventory->update($value, $newInventoryCount);
                    // breaking out of the inner foreach loop
                    break;
                }


        $newNumberYielded = intval($recordWithoutCost['numberYielded']);
        $newNumberYielded++;
        $recordWithoutCost['numberYielded'] = $newNumberYielded;

        $stock['quantity'] += 1;

        $this->stock->update($stock);
        $this->recipes->update($recordWithoutCost);

        redirect('/production');
    }
}
