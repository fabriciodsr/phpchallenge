<?php

namespace Tests\Unit;

use Tests\TestCase;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPChallenge\Domain\Entities\Person;
use PHPChallenge\Domain\Interfaces\Repositories\IPersonRepository;
use Illuminate\Support\Facades\App;

class PersonRepositoryTest extends TestCase
{
    protected $repository;

	protected static $person;

    public function setUp()
    {
    	parent::setUp();

        $this->repository = App::make(IPersonRepository::class);
    }

    public function testCreateAndSave()
    {
    	$data = array(
            'personid' => 1,
    		'personname' => 'teste',
    	);

        $person = $this->repository->create($data);
        $person->setPersonid($data['personid']);
        $person->setPersonname($data['personname']);
        $person->setCreated(new DateTime());
        $person->setUpdated(new DateTime());

    	self::$person = $this->repository->save($person);

        $this->assertDatabaseHas('person',['id'=>self::$person->getId()]);
    }

    public function testUpdateAndSave()
    {
    	$data = array(
            'personid' => rand(1,99),
    		'personname' => 'teste ' . rand(1,99),
    	);

        $person = $this->repository->update($data, self::$person->getId());
        $person->setPersonid($data['personid']);
        $person->setPersonname($data['personname']);
        $person->setUpdated(new DateTime());

    	self::$person = $this->repository->save($person);

        $this->assertEquals($data['personname'],self::$person->getPersonname());
    }

    public function testFindAll()
    {
    	$persons = $this->repository->findAll();

    	$this->assertContainsOnlyInstancesOf(Person::class, $persons);
    }

    public function testFindOne()
    {
    	$result = $this->repository->find(self::$person->getId());

    	$this->assertEquals($result->getId(), self::$person->getId());
    }

    public function testDelete()
    {
    	$person = $this->repository->find(self::$person->getId());

    	$result = $this->repository->delete($person);

    	$this->assertTrue($result);
    }
}
