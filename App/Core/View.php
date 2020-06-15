<?php

class View 
{
	public static function load($viewName, $viewData=[])
	{
		$view = VIEWS . $viewName . '.php';

		if (file_exists($view)) {
			extract($viewData);
			ob_start();
			require_once $view;
			ob_end_flush();

		} else {

			$data['title'] = 'Error Page';

			$data['content'] = 'View ' . $viewName . ' is Not Exist'; 

			return View::load('errors/404', $data);

		}
	}
}