<?php

class Products extends Models
{
	private $table = "products";

	public function all()
	{
		return $this->db->get($this->table);
	}

	public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function find($id)
	{
		return $this->db->where('id', $id)->getOne($this->table);
	}

	public function update($id, $data)
	{
		return $this->db->where('id', $id)->update($this->table, $data);
	}

	public function delete($id)
	{
		return $this->db->where('id', $id)->delete($this->table);
	}
}