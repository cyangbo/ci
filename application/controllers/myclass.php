<?php
	class Myclass extends  CI_Controller{
	function __construct()
	 {

	 	parent::__construct();
	 }
		public function index(){
			$this->load->library('myclasscc');
			
			$this->myclasscc->my_function();
		}
	}

?>