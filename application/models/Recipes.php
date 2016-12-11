<?php

class Recipes extends MY_Model {

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    function rules() {
        $config = [
            ['field'=>'id', 'label'=>'Recipe code', 'rules'=> 'required|integer'],
            ['field'=>'name', 'label'=>'Recipe name', 'rules'=> 'required'],
            ['field'=>'numberYielded', 'label'=>'Recipe Yielded', 'rules'=> 'required|integer'],
            ['field'=>'recipe', 'label'=>'Recipe', 'rules'=> 'required']
        ];
        return $config;
    }

    function getAllwithCost(){
      $result = $this->db->query("SELECT * FROM recipes INNER JOIN costs ON recipes.name = costs.name");
      $data = $result->result_array();
      return $data;
    }

    function getWithCost($id){
      $result = $this->db->query("SELECT * FROM recipes INNER JOIN costs ON recipes.name = costs.name WHERE recipes.id='$id'");
      $data = $result->result_array();
      return $data;
    }

    function getAllCostItems(){
      $result = $this->db->query("SELECT * FROM costs");
      $data = $result->result_array();
      return $data;
    }

    function addCostItem($data){
      $this->db->insert('costs', $data);
    }

    function getCostItem($id){
      $result = $this->db->query("SELECT name FROM recipes WHERE id=$id");
      $value = $result->result_array();
      $toEdit = "";
      foreach($value as $x){
        $toEdit = $x['name'];
        break;
      }

      $costItem = $this->db->query("SELECT * FROM costs WHERE name='$toEdit'");
      $costItemResult = $costItem->result_array();
      return $costItemResult;
    }

    function editCostItem($data){
      $this->db->where('id', $data['id']);
      $this->db->update('costs', $data);
    }

    function deleteCost($id){
      $result = $this->db->query("SELECT name FROM recipes WHERE id=$id");
      $value = $result->result_array();
      $toDelete = "";
      foreach($value as $x){
        $toDelete = $x['name'];
        break;
      }
      $this->db->where('name', $toDelete);
      $this->db->delete('costs');
    }

    function createCost($name){
      $this->db->query("ALTER TABLE costs ADD ". $name ." INT NOT NULL DEFAULT 0");
    }

    function renameCostsColumn($old, $name){
      $this->db->query("ALTER TABLE costs CHANGE $old $name INT");
    }

    function deleteCostFromInventory($data){
      $toDelete = $data['name'];
      $this->db->query("ALTER TABLE costs DROP COLUMN ". $toDelete);
    }
}
