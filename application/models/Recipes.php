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

}
