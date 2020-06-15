<?php 

class Models extends DB
{
	public function __construct()
	{
		$this->connect();
	}
}