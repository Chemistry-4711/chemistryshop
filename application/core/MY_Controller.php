<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */

    function __construct()
    {
        parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = 'The Chemistry Shop';
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';

        // getting user role
        $this->data['userrole'] = $this->session->userdata('userrole');

        if ($this->data['userrole'] == NULL)  {
            $this->data['userrole'] = 'guest';
        }
	}

	/**
	 * Render this page
	 */
	function render($template = 'template')
	{
		// use layout content if provided
	    if (!isset($this->data['content']))

	        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
	    $this->parser->parse($template, $this->data);
	}

}
