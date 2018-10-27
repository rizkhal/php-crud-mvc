<?php

class App
{
	/**
	 * default controller
	 * @var $controller
	 * @param 'homeController'
	 */
	protected $controller = 'homeController';
	
	/**
	 * default method
	 * @var $method
	 * @param 'index'
	 */

	protected $method = 'index';
	
	/**
	 * parameter
	 * @var $params
	 * @param [array]
	 */

	protected $params = [];

	/**
	 * constructor
	 * 
	 */
	public function __construct()
	{
		$url = $this->parseURL();

		/**
		 * $this->controller
		 * 
		 */
		if (file_exists('../app/controllers/'.$url[0] . '.php')) {
			$this->controller = $url[0];
			unset($url[0]);
		}else{
			dd("{$url[0]} not found");
		}

		/**
		 * Require Controller
		 * 
		 */

		require_once '../app/controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;

		/**
		 * $this->method
		 * 
		 */
		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		/**
		 * check $url
		 */

		if (!empty($url)) {
			$this->params = array_values($url);
		}
	}

	/**
	 *
	 * function for parse url
	 */

	public function parseURL()
	{
		if (isset($_GET['url']))
		{
			$url 	= explode('/', filter_var(trim($_GET['url']), FILTER_SANITIZE_URL));
			$url[0] = $url[0] . 'Controller';
		}else{
			$url[0] = 'homeController';
		}

		return $url;
	}

	/**
	 * call route
	 * 
	 * @return  $this->controller
	 * @return  $this->method
	 * @return  $this->params
	 */

	public function run()
	{
		return call_user_func_array([$this->controller, $this->method], $this->params);
	}
}