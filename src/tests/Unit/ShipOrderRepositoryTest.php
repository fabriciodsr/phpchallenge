<?php

namespace Tests\Unit;

use Tests\TestCase;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPChallenge\Domain\Entities\ShipOrder;
use PHPChallenge\Domain\Interfaces\Repositories\IShipOrderRepository;
use Illuminate\Support\Facades\App;

class ShipOrderRepositoryTest extends TestCase
{
    protected $repository;

	protected static $shiporder;

    public function setUp()
    {
    	parent::setUp();

        $this->repository = App::make(IShipOrderRepository::class);
    }

    public function testCreateAndSave()
    {
    	$data = array(
    		'orderid' => rand(1,99),
    	);

        $shiporder = $this->repository->create($data);
        $shiporder->setOrderid($data['orderid']);
        $shiporder->setCreated(new DateTime());
        $shiporder->setUpdated(new DateTime());

    	self::$shiporder = $this->repository->save($shiporder);

        $this->assertDatabaseHas('shiporder',['id'=>self::$shiporder->getId()]);
    }

    public function testUpdateAndSave()
    {
    	$data = array(
    		'orderid' => rand(1,99),
    	);

        $shiporder = $this->repository->update($data, self::$shiporder->getId());
        $shiporder->setOrderid($data['orderid']);
        $shiporder->setUpdated(new DateTime());

    	self::$shiporder = $this->repository->save($shiporder);

        $this->assertEquals($data['orderid'],self::$shiporder->getOrderid());
    }

    public function testFindAll()
    {
    	$shiporders = $this->repository->findAll();

    	$this->assertContainsOnlyInstancesOf(ShipOrder::class, $shiporders);
    }

    public function testFindOne()
    {
    	$result = $this->repository->find(self::$shiporder->getId());

    	$this->assertEquals($result->getId(), self::$shiporder->getId());
    }

    public function testDelete()
    {
    	$shiporder = $this->repository->find(self::$shiporder->getId());

    	$result = $this->repository->delete($shiporder);

    	$this->assertTrue($result);
    }
}
