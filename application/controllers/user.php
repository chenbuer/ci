<?php 
	/**
	* 
	*/
	class User extends CI_Controller
	{
		
		function index()
		{
			echo "user----index";
		}

		protected function test()
		{
			echo "user---test";
		}

		//以下划线开头的方法，不能被请求
		public function _test()
		{
			echo "user-------_test";
		}

		//以下划线开头的方法，不能被请求，但是可以被调用
		public function test2()
		{
			$this->_test();
		}
	}


	
 ?>