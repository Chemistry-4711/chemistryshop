<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Application
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/
     * 	- or -
     * 		http://example.com/welcome/index
     *
     * So any other public methods not prefixed with an underscore will
     * map to /welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->data['pagebody'] = 'welcome_message';

        $this->ingredientsSummary();
        $this->stocksSummary();

        $this->render();
    }

    /*
    * Gets the total cost of the ingredients in the inventory and all different ingredients count
    */
    private function ingredientsSummary()
    {
        // get all the ingredients in the inventory
        $ingredients = $this->inventory->all();

        // store the total cost of ingredients
        $ingredientsTotal = 0;

        // get the total cost of all the ingredients
        foreach($ingredients as $ingredient){
            $ingredientsTotal += ($ingredient['price'] * $ingredient['quantity']);
        }
        $this->data['ingredientsTotal'] = $ingredientsTotal;

        // number of diffirent ingredients in the inventory
        $this->data['numOfIngredients'] = count($ingredients);
    }

    /*
    * Gets the total cost of the stock and all different stock count
    */
    private function stocksSummary()
    {
        // get all the Stock
        $stocks = $this->stock->all();

        // store the total cost of the stocks
        $stocksTotal = 0;

        // get the total cost of all the stock
        foreach($stocks as $stock){
            $stocksTotal += ($stock['price'] * $stock['quantity']);
        }
        $this->data['stocksTotal'] = $stocksTotal;

        // number of different products in Stock
        $this->data['numOfStocks'] = count($stocks);
    }

}
