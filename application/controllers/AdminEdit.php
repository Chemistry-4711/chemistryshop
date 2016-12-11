<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEdit extends Application{

  function __construct(){
      parent::__construct();
  }

  function index(){

    $userrole = $this->session->userdata('userrole');
    if ($userrole != 'admin') {
            $message = 'You are not authorized to access this page. Go away';
            $this->data['content'] = $message;
            $this->render();
            return;
        }

    $this->data['pagebody'] = 'admin_page'; // which view to display on

    $result = $this->stock->all();
    $this->data['stockData'] = $result;

    $recipeResult = $this->recipes->all();
    $this->data['recipesData'] = $recipeResult;

    $inventoryResult = $this->inventory->all();
    $this->data['inventoryData'] = $inventoryResult;

    $this->render();
  }
  function addStock($error = ""){
    $this->data['pagebody'] = 'admin_add_stock';
    $this->data['error'] = $error;
    $this->render();
  }

  function addstockdone(){
    //handle invalid data
    $name = $this->input->post('name');
    $description = $this->input->post('description');
    $price = $this->input->post('price');
    $num_sold = $this->input->post('num_sold');
    if(trim($name) == null || trim($name) == "" || trim($description) == null || trim($description) == "" || trim($price) == null || !is_numeric($price)
    || !is_numeric($num_sold) || trim($num_sold) == null || trim($num_sold) == ""){
      $this->data['error'] = "Invalid arguments";
      redirect('/adminedit/addStock');
    }
    $data = array(
      'id' => null,
      'name' => $this->input->post('name'),
      'description' => $this->input->post('description'),
      'price' => $this->input->post('price'),
      'num_sold' => $this->input->post('num_sold'),
      'quantity' => 0
    );
    $this->stock->add($data);
    redirect('/adminedit', 'refresh');
  }

  function editStock($id){
    $this->data['pagebody'] = 'admin_edit_stock';
    $result = $this->stock->get($id);
    $array = json_decode(json_encode($result), true);
    $this->data['name'] = $array["name"];
    $this->data['description'] = $array["description"];
    $this->data['price'] = $array["price"];
    $this->data['num_sold'] = $array["num_sold"];
    $this->data['id'] = $id;
    $this->data['quantity'] = $array["quantity"];
    $this->render();
  }

  function editstockdone(){
    //handle invalid data
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $description = $this->input->post('description');
    $price = $this->input->post('price');
    $num_sold = $this->input->post('num_sold');
    if(trim($name) == null || trim($name) == "" || trim($description) == null || trim($description) == "" || trim($price) == null || !is_numeric($price)
    || !is_numeric($num_sold) || trim($num_sold) == null || trim($num_sold) == ""){
      $this->data['error'] = "Invalid arguments";
      redirect('/adminedit/editStock/'.$id);
    }
    $record = array('id' => $id, 'name' => $name, 'description' => $description, 'price' => $price, 'num_sold' => $num_sold, 'quantity' => $this->input->post('quantity'));
    $this->stock->update($record);
    redirect('/adminedit');
  }

  function deleteStock($id){
      $this->stock->delete($id);
      redirect('/adminedit', 'refresh');
  }

  function addRecipe($error = ""){
    $this->data['pagebody'] = 'admin_add_recipe';
    $this->data['error'] = $error;
    $result = $this->recipes->getAllCostItems();
    $keys = array();
    $costData = array();
    while($recipe = current($result)){
      //get rid of unwanted values
      unset($recipe["id"]);
      unset($recipe["name"]);
      $keys = array_keys($recipe);
      break;
    }
    foreach($keys as $key){
      array_push($costData, array('name' => $key));
    }
    $this->data['costItems'] = $costData;
    $this->render();
  }

  function addrecipedone(){
    //handle invalid data
    $name = $this->input->post('name');
    $recipe = $this->input->post('recipe');
    $numberYielded = $this->input->post('numberYielded');
    $result = $this->recipes->getAllCostItems();
    $keys = array();
    $inventoryValues = array();
    if(trim($name) == null || trim($name) == "" || trim($recipe) == null || trim($recipe) == "" || trim($numberYielded) == null || !is_numeric($numberYielded)
    ){
      $this->data['error'] = "Invalid arguments";
      redirect('/adminedit/addRecipe');
    }
    while($recipe = current($result)){
      //get rid of unwanted values
      unset($recipe["id"]);
      unset($recipe["name"]);
      $keys = array_keys($recipe);
      break;
    }
    foreach($keys as $key){
      $test = $this->input->post($key);
      if($test == null || !is_numeric($test)){
        $this->data['error'] = "Invalid arguments";
        redirect('/adminedit/addRecipe');
      }
      if($test != 0){
        $inventoryValues[$key] = $test;
      }
    }
    $inventoryValues['id'] = null;
    $inventoryValues['name'] = $this->input->post('name');
    $this->recipes->addCostItem($inventoryValues);
    $data = array(
      'id' => null,
      'name' => $this->input->post('name'),
      'numberYielded' => $this->input->post('numberYielded'),
      'recipe' => $this->input->post('recipe'),
    );
    $this->recipes->add($data);


    redirect('/adminedit', 'refresh');
  }

  function editRecipe($id){
    $this->data['pagebody'] = 'admin_edit_recipes';
    $result = $this->recipes->get($id);
    $costResult = $this->recipes->getCostItem($id);
    $keys = array();
    $costItems = array();
    $tempArray = array();
    $costId = "";
    foreach($costResult as $temp){
      $costId = $temp['id'];
      while($item = current($temp)){
        unset($temp['id']);
        unset($temp['name']);
        $tempArray = $temp;
        $keys = array_keys($temp);
        break;
      }
      break;
    }
    foreach($keys as $key){
      array_push($costItems, array('name' => $key, 'value' => $tempArray[$key]));
    }
    $this->data['costItems'] = $costItems;
    $array = json_decode(json_encode($result), true);
    $this->data['id'] = $array["id"];
    $this->data['costid'] = $costId;
    $this->data['name'] = $array["name"];
    $this->data['numberYielded'] = $array["numberYielded"];
    $this->data['recipe'] = $array["recipe"];


    $this->render();
  }

  function editrecipedone(){
    //handle invalid data
    $costId = $this->input->post('costid');
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $recipeData = $this->input->post('recipe');
    $numberYielded = $this->input->post('numberYielded');
    $result = $this->recipes->getAllCostItems();
    if(trim($name) == null || trim($name) == "" || trim($recipeData) == null || trim($recipeData) == "" || trim($numberYielded) == null || !is_numeric($numberYielded)
    ){
      $this->data['error'] = "Invalid arguments";
      redirect('/adminedit/editRecipe/'.$id);
    }
    while($recipe = current($result)){
      //get rid of unwanted values
      unset($recipe["id"]);
      unset($recipe["name"]);
      $keys = array_keys($recipe);
      break;
    }
    foreach($keys as $key){
      $test = $this->input->post($key);
      if($test == null || !is_numeric($test)){
        $this->data['error'] = "Invalid arguments";
        redirect('/adminedit/editRecipe');
      }
        $inventoryValues[$key] = $test;
    }
    $inventoryValues['id'] = $costId;
    $inventoryValues['name'] = $name;
    $this->recipes->editCostItem($inventoryValues);


    $record = array('id' => $id, 'name' => $name, 'numberYielded' => $numberYielded, 'recipe' => $recipeData);
    $this->recipes->update($record);
    redirect('/adminedit');
  }

  function deleteRecipe($id){
      $this->recipes->deleteCost($id);
      $this->recipes->delete($id);
      redirect('/adminedit', 'refresh');
  }

  function addInventory($error = ""){
    $this->data['pagebody'] = 'admin_add_inventory';
    $this->data['error'] = $error;
    $this->render();
  }

  function addInventoryDone(){
    //handle invalid data
    $name = $this->input->post('name');
    $supplier = $this->input->post('supplier');
    $price = $this->input->post('price');
    $quantity = $this->input->post('quantity');
    if(trim($name) == null || trim($name) == "" || trim($supplier) == null || trim($supplier) == "" || trim($price) == null || !is_numeric($price)
    || !is_numeric($quantity) || trim($quantity) == null || trim($quantity) == ""){
      $this->data['error'] = "Invalid arguments";
      redirect('/adminedit/addInventory');
    }
    $data = array(
      'id' => null,
      'name' => $name,
      'supplier' => $supplier,
      'price' => $price,
      'quantity' => $quantity
    );
    $this->recipes->createCost($name);
    $this->inventory->add($data);
    redirect('/adminedit', 'refresh');
  }

  function editInventory($id){
    $this->data['pagebody'] = 'admin_edit_inventory';
    $result = $this->inventory->get($id);
    $array = json_decode(json_encode($result), true);
    $this->data['name'] = $array["name"];
    $this->data['supplier'] = $array["supplier"];
    $this->data['price'] = $array["price"];
    $this->data['id'] = $id;
    $this->data['quantity'] = $array["quantity"];
    $this->data['costsname'] = $array["name"];
    $this->render();
  }

  function editInventoryDone(){
    //handle invalid data
    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $supplier = $this->input->post('supplier');
    $price = $this->input->post('price');
    $quantity = $this->input->post('quantity');
    $oldName = $this->input->post('costsname');
    if(trim($name) == null || trim($name) == "" || trim($supplier) == null || trim($supplier) == "" || trim($price) == null || trim($quantity) == null || trim($quantity) == ""){
      $this->data['error'] = "Invalid arguments";
      redirect('/adminedit/editInventory/'.$id);
    }
    $record = array('id' => $id, 'name' => $name, 'supplier' => $supplier, 'price' => $price, 'quantity' => $quantity);
    $this->inventory->update($record);
    $this->recipes->renameCostsColumn($oldName, $name);
    redirect('/adminedit');
  }

  function deleteInventory($id){
      $result = $this->inventory->get($id);
      $array = json_decode(json_encode($result), true);
      $this->recipes->deleteCostFromInventory($array);
      $this->inventory->delete($id);
      redirect('/adminedit', 'refresh');
  }
}
