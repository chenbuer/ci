<?php 
	/**
	* 
	*/
	class User extends CI_Controller
	{
		

		public function index()//加载视图方法,直接写试图名字，不要写扩展名!!!
		{
			$this->load->vars('title','这是我的标题');
			//echo "user----index";
			// $this->load->view('user_index');//加载目录中的视图
			$this->load->view('user/index');//加载子目录中的视图
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