<?php
/**
 * Sales controller
 *
 * @author Tyler
 */
class Sales extends Application{

    function __construct(){
        parent::__construct();
    }

    public function index() {
            //$this->load->model('stock');
            $this->data['pagebody'] = 'sales_menu'; // which view to display on

            $source = $this->stock->all();

            $this->data['stock'] = $source;    // allows use variables in views
            $this->render();
    }

    //subcontroller
    public function get($id){


        $this->data['pagebody'] = 'sales_order';
        $item = $this->stock->get($id);
        $item = json_decode(json_encode($item), true);
        $this->data = array_merge($this->data, $item);
        $this->render();
    }
}
