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
            $this->load->model('stock');
            $this->data['pagebody'] = 'welcome_message';
            
            $source = $this->stock->all();
            $stock = array ();
            
            foreach ($source as $row)  {
                $stock[] = array ('id' => $row['id']);
            }
            
            $this->data['stock'] = $stock;            
            $this->render();
    }
    
    
}
