<?php

namespace Tests\Unit;

use Tests\TestCase;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPChallenge\Domain\Entities\ShipOrderItem;
use PHPChallenge\Domain\Interfaces\Repositories\IShipOrderItemRepository;
use Illuminate\Support\Facades\App;

class ShipItemRepositoryTest extends TestCase
{
    protected $repository;

	protected static $shipitem;

    public function setUp()
    {
    	parent::setUp();

        $this->repository = App::make(IShipOrderItemRepository::class);
    }

    public function testCreateAndSave()
    {
    	$data = array(
            'title' => str_random(7),
            'note' => str_random(5),
            'quantity' => rand(1,99),
            'price' => rand(3,9),
    	);

        $shipitem = $this->repository->create($data);
        $shipitem->setTitle($data['title']);
        $shipitem->setNote($data['note']);
        $shipitem->setQuantity($data['quantity']);
        $shipitem->setPrice($data['price']);
        $shipitem->setCreated(new DateTime());
        $shipitem->setUpdated(new DateTime());

    	self::$shipitem = $this->repository->save($shipitem);

        $this->assertDatabaseHas('shiporder_item',['id'=>self::$shipitem->getId()]);
    }

    public function testUpdateAndSave()
    {
    	$data = array(
            'title' => str_random(7),
            'note' => str_random(5),
            'quantity' => rand(1,99),
            'price' => rand(3,9),
    	);

        $shipitem = $this->repository->update($data, self::$shipitem->getId());
        $shipitem->setTitle($data['title']);
        $shipitem->setNote($data['note']);
        $shipitem->setQuantity($data['quantity']);
        $shipitem->setPrice($data['price']);
        $shipitem->setUpdated(new DateTime());

    	self::$shipitem = $this->repository->save($shipitem);

        $this->assertEquals($data['title'],self::$shipitem->getTitle());
    }

    public function testFindAll()
    {
    	$shipitems = $this->repository->findAll();

    	$this->assertContainsOnlyInstancesOf(ShipOrderItem::class, $shipitems);
    }

    public function testFindOne()
    {
    	$result = $this->repository->find(self::$shipitem->getId());

    	$this->assertEquals($result->getId(), self::$shipitem->getId());
    }

    public function testDelete()
    {
    	$shipitem = $this->repository->find(self::$shipitem->getId());

    	$result = $this->repository->delete($shipitem);

    	$this->assertTrue($result);
    }
}
