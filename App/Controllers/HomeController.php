<?php

class HomeController
{
	public function index()
	{
		$this->data['title'] = 'Home Page';

		return View::load('home/index', $this->data);
	}
}