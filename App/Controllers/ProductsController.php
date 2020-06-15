<?php

class ProductsController
{
	public function index()
	{
		$products = new Products();

		$this->data['products'] = $products->all();

		$this->data['title'] = 'Products Page';

		return View::load('products/index', $this->data);
	}

	public function add()
	{
		$this->data['title'] = 'Add Product';

		return View::load('products/add', $this->data);
	}

	public function insert()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$name = $_POST['name'];
			$content = $_POST['content'];
			$price = $_POST['price'];
			$qty = $_POST['qty'];

			$validate = new Validation();
			$validate->name('name')->value($name)->pattern('text')->required();
			$validate->name('content')->value($content)->pattern('text')->required();
			$validate->name('price')->value($price)->pattern('float')->min(1)->required();
			$validate->name('qty')->value($qty)->pattern('int')->min(1)->required();

			if($validate->isSuccess()){

				$data = [

					'name' => $name,
					'content' => $content,
					'price' => $price,
					'qty' => $qty,

				];

		    	$add = new Products();

		    	$check = $add->create($data);

		    	if ($check) {
		    		
		    		$this->data['success'] = 'Product Added Success';

		    	} else {

		    		$this->data['error'] = 'Product Not Added You Have an Error';

		    	}

		    }else{

		        $this->data['errorsValidate'] = $validate->getErrors();

		    }

			$this->data['title'] = 'Add Product';

		    return View::load('products/add', $this->data);


		} else {

			$this->data['title'] = 'Error Page';

			$this->data['content'] = 'No Method Post';

			return View::load('errors/404', $this->data);

		}
	}

	public function edit($id)
	{
		$product = new Products();

		$this->data['product'] = $product->find($id);

		if ($this->data['product']) {
			
			$this->data['title'] = $this->data['product']['name'];

			return View::load('products/edit', $this->data);

		} else {

			$this->data['products'] = $product->all();

			return View::load('products/index', $this->data);

		}

	}

	public function update()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$id = $_POST['id'];
			$name = $_POST['name'];
			$content = $_POST['content'];
			$price = $_POST['price'];
			$qty = $_POST['qty'];

			$validate = new Validation();
			$validate->name('id')->value($id)->pattern('int')->min(1)->required();
			$validate->name('name')->value($name)->pattern('text')->required();
			$validate->name('content')->value($content)->pattern('text')->required();
			$validate->name('price')->value($price)->pattern('float')->min(1)->required();
			$validate->name('qty')->value($qty)->pattern('int')->min(1)->required();

			if($validate->isSuccess()){

				$data = [

					'name' => $name,
					'content' => $content,
					'price' => $price,
					'qty' => $qty,

				];

		    	$update = new Products();

		    	$check = $update->update($id, $data);

		    	$this->data['product'] = $update->find($_POST['id']);

		    	if ($check) {
		    		
		    		$this->data['success'] = 'Product Updated Success';

		    	} else {

		    		$this->data['error'] = 'Product Not Updated You Have an Error';

		    	}

		    }else{

		    	$update = new Products();

		    	$this->data['product'] = $update->find($_POST['id']);

		        $this->data['errorsValidate'] = $validate->getErrors();

		    }

			$this->data['title'] = 'Add Product';

		    return View::load('products/edit', $this->data);


		} else {

			$this->data['title'] = 'Error Page';

			$this->data['content'] = 'No Method Post';

			return View::load('errors/404', $this->data);

		}
	}

	public function delete($id)
	{
		$product = new Products();

		$this->data['product'] = $product->find($id);

		if ($this->data['product']) {

			$product->delete($id);

			$this->data['products'] = $product->all();
		    		
		   	$this->data['success'] = 'Deleted Product Success';

		   	$this->data['title'] = 'Products Page';

			return View::load('products/index', $this->data);

		} else {

		    $this->data['error'] = 'Product Not Deleted You Have an Error';

		    $this->data['products'] = $product->all();

		   	$this->data['title'] = 'Products Page';

			return View::load('products/index', $this->data);

		}
	}
}