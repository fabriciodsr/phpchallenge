<?php

namespace PHPChallenge\Http\Controllers;
use Illuminate\Support\Facades\App;
use PHPChallenge\Domain\Entities\PersonPhone;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPChallenge\Domain\Interfaces\Repositories\IPersonPhoneRepository;

/**
 * @group Person Phones
 *
 * Allows you to get phone info from persons
 */
class PhoneController extends BaseController
{
    protected $repository;

    public function __construct()
    {
        $this->repository = App::make(IPersonPhoneRepository::class);
    }

    /**
	 * Get all phones
	 *
	 * Allows you to get a list of all phones registered on the application
     * @authenticated
     *
	 * @response {
     * "id": 1,
     * "phone": "2345678",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:40",
     * "person": "http://127.0.0.1/api/person/1"
     * }
	 */
    public function GetAll()
    {
        $phones = $this->repository->findAll();

        if (!empty($phones))
        {
            foreach($phones as $key => $value)
            {
                $phones[$key]->created = $value->created->format('d/m/Y H:i:s');
                $phones[$key]->updated = $value->updated->format('d/m/Y H:i:s');
                $phones[$key]->phone = $value->phone;
                $phones[$key]->person = url('api/person') . '/' . $value->person->id;
                unset($phones[$key]->person->id);
            }
        }

        return response()->json($phones);
    }

    /**
	 * Get a phone by Id
	 *
	 * Allows you to see a phone registered on the application by it's Id
     * @authenticated
     *
	 * @queryParam phoneId required The id of the phone. Example: 1
     *
     * @response {
     * "id": 1,
     * "phone": "2345678",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:40",
     * "person": "http://127.0.0.1/api/person/1"
     * }
	 */
    public function GetById($id)
    {
        $phone = $this->repository->find($id);
        $phone->created = $phone->created->format('d/m/Y H:i:s');
        $phone->updated = $phone->updated->format('d/m/Y H:i:s');
        $phone->phone = $phone->phone;
        $phone->person = url('api/person') . '/' . $phone->person->id;
        unset($phone->person->id);
        return response()->json($person);
    }

    /**
	 * Get all phones from a person by personId
	 *
	 * Allows you to see all phones from a person registered on the application by personId
	 * @authenticated
     *
	 * @queryParam personId required The id of the person. Example: 1
     *
     * @response {
     * "id": 1,
     * "phone": "2345678",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:40",
     * "person": "http://127.0.0.1/api/person/1"
     * }
	 */
    public function GetAllByPerson($id)
    {
        $phones = $this->repository->findBy(array('person'=> $id));

        if (!empty($phones))
        {
            foreach($phones as $key => $value)
            {
                $phones[$key]->created = $value->created->format('d/m/Y H:i:s');
                $phones[$key]->updated = $value->updated->format('d/m/Y H:i:s');
                $phones[$key]->phone = $value->phone;
                $phones[$key]->person = url('api/person') . '/' . $value->person->id;
                unset($phones[$key]->person->id);
            }
        }
        return response()->json($phones);
    }
}
