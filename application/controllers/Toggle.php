<?php

/*
 * Toggle controller
 */

class Toggle extends Application {
	public function index()	{
		$origin = $_SERVER['HTTP_REFERER'];
		$role = $this->session->userdata('userrole');

		// toggle between roles
		if ($role == 'user'){
			$role = 'admin';
		}else if($role == "admin"){
			$role = 'guest';
		}else{
			$role = 'user';
		}
		
		$this->session->set_userdata('userrole', $role);
		redirect($origin);
	}
}
