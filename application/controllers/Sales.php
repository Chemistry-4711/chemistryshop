<?php
/**
 * Sales controller
 *
 * @author Tyler, Kevin
 */
class Sales extends Application{

    function __construct(){
        parent::__construct();
    }

    public function index() {
            //$this->load->model('stock');
            $this->data['pagebody'] = 'summary'; // which view to display on

            $source = $this->stock->all();

            $this->data['stock'] = $source;    // allows use variables in views
            $this->render();
    }

    //subcontroller
    // public function get($id){
    //
    //
    //     $this->data['pagebody'] = 'sales_order';
    //     $item = $this->stock->get($id);
    //
    //     $this->data = array_merge($this->data, $item);
    //     $this->render();
    // }

    public function add($item) {
        $order = new Order($this->session->userdata('order'));
        $order->addItem($item);
        $this->session->set_userdata('order',(array)$order);
        $this->keep_shopping();
        redirect('/sales/neworder');
    }

    public function keep_shopping()
    {
        $order = new Order($this->session->userdata('order'));
        $stuff = $order->receipt();
        $this->data['receipt'] = $this->parsedown->parse($stuff);


        $this->data['pagebody'] = 'sales_menu';

        $source = $this->stock->all();

        $this->data['stock'] = $source;    // allows use variables in views


        // $stuff = $order->receipt();
        // $this->data['receipt'] = $this->parsedown->parse($stuff);
        // $this->data['content'] = '';
        //
        // // pictorial menu
        // $count = 1;
        // foreach ($this->categories->all() as $category) {
        //     $chunk = 'category'.$count;
        //     $this->data[$chunk] = $this->parser->parse('category-shop', $category, true);
        //     foreach ($this->menu->all() as $menuitem) {
        //         if ($menuitem->category != $category->id) {
        //             continue;
        //         }
        //         $this->data[$chunk] .= $this->parser->parse('menuitem-shop', $menuitem, true);
        //     }
        //     ++$count;
        // }
        $this->render('template_sales');
    }

    public function cancel()
    {
        // Drop any order in progress
        if ($this->session->has_userdata('order')) {
            $this->session->unset_userdata('order');
        }

        $this->index();
    }

    // new order if none
    public function neworder()
    {
        // create a new order if needed
        if (!$this->session->has_userdata('order')) {
            $order = new Order();
            $this->session->set_userdata('order', (array) $order);
        }

        $this->keep_shopping();
    }

}
