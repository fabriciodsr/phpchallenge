<?php

namespace Tests\Unit;

use Tests\TestCase;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPChallenge\Domain\Entities\ShipOrderShipTo;
use PHPChallenge\Domain\Interfaces\Repositories\IShipOrderShipToRepository;
use Illuminate\Support\Facades\App;

class ShipToRepositoryTest extends TestCase
{
    protected $repository;

	protected static $shipto;

    public function setUp()
    {
    	parent::setUp();

        $this->repository = App::make(IShipOrderShipToRepository::class);
    }

    public function testCreateAndSave()
    {
    	$data = array(
            'name' => str_random(10),
            'address' => str_random(25),
            'city' => str_random(15),
            'country' => str_random(10),
    	);

        $shipto = $this->repository->create($data);
        $shipto->setName($data['name']);
        $shipto->setAddress($data['address']);
        $shipto->setCity($data['city']);
        $shipto->setCountry($data['country']);
        $shipto->setCreated(new DateTime());
        $shipto->setUpdated(new DateTime());

    	self::$shipto = $this->repository->save($shipto);

        $this->assertDatabaseHas('shiporder_shipto',['name'=>self::$shipto->getName()]);
    }

    public function testUpdateAndSave()
    {
    	$data = array(
            'name' => str_random(10),
            'address' => str_random(25),
            'city' => str_random(15),
            'country' => str_random(10),
    	);

        $shipto = $this->repository->update($data, self::$shipto->getId());
        $shipto->setName($data['name']);
        $shipto->setAddress($data['address']);
        $shipto->setCity($data['city']);
        $shipto->setCountry($data['country']);
        $shipto->setUpdated(new DateTime());

    	self::$shipto = $this->repository->save($shipto);

        $this->assertEquals($data['name'],self::$shipto->getName());
    }

    public function testFindAll()
    {
    	$shiptos = $this->repository->findAll();

    	$this->assertContainsOnlyInstancesOf(ShipOrderShipTo::class, $shiptos);
    }

    public function testFindOne()
    {
    	$result = $this->repository->find(self::$shipto->getId());

    	$this->assertEquals($result->getId(), self::$shipto->getId());
    }

    public function testDelete()
    {
    	$shipto = $this->repository->find(self::$shipto->getId());

    	$result = $this->repository->delete($shipto);

    	$this->assertTrue($result);
    }
}
