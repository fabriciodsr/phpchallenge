<?php
namespace PHPChallenge\Infrastructure\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Util\Inflector;
use PHPChallenge\Domain\Interfaces\Repositories\IBaseRepository;

class BaseRepository extends EntityRepository implements IBaseRepository
{
	public function create($data)
	{
        $entity = new $this->_entityName();
        return $entity;
	}

	public function update($data, $id)
	{
		$entity = $this->find($id);

		return $entity;
	}

	public function save($object)
	{
		$this->_em->persist($object);

		$this->_em->flush($object);

		return $object;
	}

	public function delete($object)
	{
		$this->_em->remove($object);

		$this->_em->flush($object);

		return true;
	}
}
