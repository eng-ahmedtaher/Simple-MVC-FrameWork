<?php 

class App {
	
	protected $controller = 'HomeController';
	protected $method = 'index';
	protected $params = [];

	public function __construct()
	{
		$this->prepareURL($_SERVER['QUERY_STRING']);
		$this->render();
	}

	/*
	*
	* 	Extract Controller and Methods
	*	@return void
	*
	*/

	private function prepareURL($data)
	{
		$url = $data;

		$url = explode('&', $url);

		unset($url[0]);

		if (!empty($url)) {

			$url = explode('/', $url[1]);

			$this->controller = isset($url[0]) ? ucwords($url[0]) . "Controller" : "HomeController";
			$this->method = isset($url[1]) ? $url[1] : "index";

			unset($url[0], $url[1]);

			$this->params = !empty($url) ? array_values($url) : [];

		}
	}

	private function render()
	{
		if (class_exists($this->controller)) {
			
			$controller = new $this->controller;

			if (method_exists($controller, $this->method)) {
				
				call_user_func_array([$controller, $this->method], $this->params);

			} else {

				$this->data['title'] = 'Error Page';

				$this->data['content'] = 'Method ' . $this->method . ' is Not Exist'; 

				return View::load('errors/404', $this->data);

			}

		} else {

			$this->data['title'] = 'Error Page';

			$this->data['content'] = 'Class ' . $this->class . ' is Not Exist'; 

			return View::load('errors/404', $this->data);

		}
	}

}