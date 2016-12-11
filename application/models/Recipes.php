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
}
