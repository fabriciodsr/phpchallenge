<?php

namespace PHPChallenge\Http\Controllers;
use Illuminate\Support\Facades\App;
use PHPChallenge\Domain\Entities\Person;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPChallenge\Domain\Interfaces\Repositories\IPersonRepository;

/**
 * @group Person
 *
 * Allows you to get person info
 */
class PersonController extends BaseController
{
    protected $repository;

    public function __construct()
    {
        $this->repository = App::make(IPersonRepository::class);
    }

    /**
	 * Get all persons
	 *
	 * Allows you to get a list of all persons registered on the application
     * @authenticated
     *
	 * @response {
     * "id": 1,
     * "personid": 1,
     * "personname": "Name 1",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:40",
     * "phones": "http://127.0.0.1/api/phones/person/1",
     * "orders": "http://127.0.0.1/api/shiporder/person/1"
     * }
	 */
    public function GetAll()
    {
        $persons = $this->repository->findAll();

        if (!empty($persons))
        {
            foreach($persons as $key => $value)
            {
                $persons[$key]->created = $value->created->format('d/m/Y H:i:s');
                $persons[$key]->updated = $value->updated->format('d/m/Y H:i:s');
                $persons[$key]->phones = url('api/phones/person') . '/' . $value->personid;
                $persons[$key]->orders = url('api/shiporder/person') . '/' . $value->personid;
            }
        }

        return response()->json($persons);
    }

    /**
	 * Get a person by Id
	 *
	 * Allows you to see a person registered on the application by it's Id
     * @authenticated
     *
	 * @queryParam personId required The id of the person. Example: 1
     *
     * @response {
     * "id": 1,
     * "personid": 1,
     * "personname": "Name 1",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:40",
     * "phones": "http://127.0.0.1/api/phones/person/1",
     * "orders": "http://127.0.0.1/api/shiporder/person/1"
     * }
	 */
    public function GetById($id)
    {
        $person = $this->repository->find($id);
        $person->created = $person->created->format('d/m/Y H:i:s');
        $person->updated = $person->updated->format('d/m/Y H:i:s');
        $person->phones = url('api/phones/person') . '/' . $person->personid;
        $person->orders = url('api/shiporder/person') . '/' . $person->personid;
        return response()->json($person);
    }
}
