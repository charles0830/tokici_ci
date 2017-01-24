<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_products');
    }


	public function index()
	{
	    $data['products'] = $this->Model_products->all()->result();
		$this->load->view('welcome_message', $data);
	}

	public function add_to_cart($product_id)
    {
        //find product based on product_id
        $product = $this->Model_products->find($product_id);
        $data = array(
            'id'      => $product->id,
            'qty'     => 1,
            'price'   => $product->price,
            'name'    => $product->name,
            //'options' => array('Size' => 'L', 'Color' => 'Red')
        );

        $this->cart->insert($data);
        redirect(base_url());
    }

    public function cart()
    {
        var_dump($this->cart->contents());
    }

}
