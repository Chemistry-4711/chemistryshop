<?php

class Recipes extends CI_Model{

var $data = array(
  array('id' => '0', 'name' => 'C4', 'numberYielded' => 1, 'recipe' => 'Mix lithium, gun-powder, H20, and 2 egg and let it solidify.',
'cost' => array('lithium' => 1, 'gun-powder' => 3, 'h2o' => 1, 'eggs' => 2)),

array('id' => '1', 'name' => 'Methamphetamine', 'numberYielded' => 1,
'recipe' => 'Mix the eggs with the flour while adding water and slowly sift till the hardens',
'cost' => array('eggs' => 4, 'flour' => 6, 'h2o' => 1)),

array('id' => '2', 'name' => 'Advil', 'numberYielded' => 4,
'recipe' => 'Add vanilla extract to hydrochloric acid and once it changes color, add 5 peanuts',
'cost' => array('vanilla-extract' => 3, 'hydrochloric-acid' => 2, 'peanuts' => 5)),

array('id' => '3', 'name' => 'Vitamins', 'numberYielded' => 3,
'recipe' => 'Encapsule large amounts hydrochloric acid',
'cost' => array('hydrochloric-acid' => 5)),

array('id' => '4', 'name' => 'Stink Bomb', 'numberYielded' => 1,
'recipe' => 'Mix milk and peanuts with gun powder',
'cost' => array('milk' => 4, 'peanuts' => 2, 'gun-powder' => 3)),

array('id' => '5', 'name' => 'Smoke Bomb', 'numberYielded' => 2,
'recipe' => 'Mix gunpowder with sifted flour and 1 egg',
'cost' => array('gun-powder' => 30, 'flour' => 5, 'eggs' => 1))

);


  // Constructor
	public function __construct()
	{
		parent::__construct();
	}

  // Retrieves an recipe based on the name
  public function get($which){
    foreach($this->data as $recipe){
        if($which == $recipe->name){
          return $recipe;
        }
    }
  }

  // retrieve all of the inventories
  public function all()
  {
      return $this->data;
  }


}
