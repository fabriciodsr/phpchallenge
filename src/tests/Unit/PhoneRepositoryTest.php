<?php

namespace Tests\Unit;

use Tests\TestCase;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPChallenge\Domain\Entities\PersonPhone;
use PHPChallenge\Domain\Interfaces\Repositories\IPersonPhoneRepository;
use Illuminate\Support\Facades\App;

class PhoneRepositoryTest extends TestCase
{
    protected $repository;

	protected static $phone;

    public function setUp()
    {
    	parent::setUp();

        $this->repository = App::make(IPersonPhoneRepository::class);
    }

    public function testCreateAndSave()
    {
    	$data = array(
            'phone' => rand(4,99),
    	);

        $phone = $this->repository->create($data);
        $phone->setPhone($data['phone']);
        $phone->setCreated(new DateTime());
        $phone->setUpdated(new DateTime());

    	self::$phone = $this->repository->save($phone);

        $this->assertDatabaseHas('person_phone',['id'=>self::$phone->getId()]);
    }

    public function testUpdateAndSave()
    {
    	$data = array(
            'phone' => rand(4,99),
    	);

        $phone = $this->repository->update($data, self::$phone->getId());
        $phone->setPhone($data['phone']);
        $phone->setUpdated(new DateTime());

    	self::$phone = $this->repository->save($phone);

        $this->assertEquals($data['phone'],self::$phone->getPhone());
    }

    public function testFindAll()
    {
    	$phones = $this->repository->findAll();

    	$this->assertContainsOnlyInstancesOf(PersonPhone::class, $phones);
    }

    public function testFindOne()
    {
    	$result = $this->repository->find(self::$phone->getId());

    	$this->assertEquals($result->getId(), self::$phone->getId());
    }

    public function testDelete()
    {
    	$phone = $this->repository->find(self::$phone->getId());

    	$result = $this->repository->delete($phone);

    	$this->assertTrue($result);
    }
}
