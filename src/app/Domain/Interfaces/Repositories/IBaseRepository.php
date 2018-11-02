<?php
namespace PHPChallenge\Domain\Interfaces\Repositories;

interface IBaseRepository
{
	public function create($data);
	public function update($data, $id);
	public function save($object);
	public function delete($object);
	public function find($id);
	public function findAll();
}
