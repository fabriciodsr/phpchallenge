<?php

namespace PHPChallenge\Http\Controllers;
use Illuminate\Support\Facades\App;
use PHPChallenge\Domain\Entities\ShipOrderShipTo;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPChallenge\Domain\Interfaces\Repositories\IShipOrderShipToRepository;

/**
 * @group Order Ships
 *
 * Allows you to get ship info from orders
 */
class ShipToController extends BaseController
{
    protected $repository;

    public function __construct()
    {
        $this->repository = App::make(IShipOrderShipToRepository::class);
    }

    /**
	 * Get all ships
	 *
	 * Allows you to get a list of all ships registered on the application
     * @authenticated
     *
	 * @response {
     * "id": 1,
     * "name": "Name 1",
     * "address": "Address 1",
     * "city": "City 1",
     * "country": "Country 1",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:41",
     * "shiporder": "http://127.0.0.1/api/shiporder/1"
     * }
	 */
    public function GetAll()
    {
        $shipsto = $this->repository->findAll();

        if (!empty($shipsto))
        {
            foreach($shipsto as $key => $value)
            {
                $shipsto[$key]->created = $value->created->format('d/m/Y H:i:s');
                $shipsto[$key]->updated = $value->updated->format('d/m/Y H:i:s');
                $shipsto[$key]->shiporder = url('api/shiporder') . '/' . $value->shiporder->id;
                unset($shipsto[$key]->shiporder->id);
            }
        }

        return response()->json($shipsto);
    }

    /**
	 * Get a ship by Id
	 *
	 * Allows you to see a ship registered on the application by it's Id
     * @authenticated
     *
	 * @queryParam shiptoId required The id of the item. Example: 1
     *
     * @response {
     * "id": 1,
     * "name": "Name 1",
     * "address": "Address 1",
     * "city": "City 1",
     * "country": "Country 1",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:41",
     * "shiporder": "http://127.0.0.1/api/shiporder/1"
     * }
	 */
    public function GetById($id)
    {
        $shipto = $this->repository->find($id);
        $shipto->created = $shipto->created->format('d/m/Y H:i:s');
        $shipto->updated = $shipto->updated->format('d/m/Y H:i:s');
        $shipto->shiporder = url('api/shiporder') . '/' . $shipto->shiporder->id;
        unset($shipto->shiporder->id);
        return response()->json($shipto);
    }

    /**
	 * Get all ships from a order by orderId
	 *
	 * Allows you to see all ships from a order registered on the application by orderId
	 * @authenticated
     *
	 * @queryParam shiporderId required The id of the order. Example: 1
     *
     * @response {
     * "id": 1,
     * "name": "Name 1",
     * "address": "Address 1",
     * "city": "City 1",
     * "country": "Country 1",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:41",
     * "shiporder": "http://127.0.0.1/api/shiporder/1"
     * }
	 */
    public function GetAllByShipOrder($id)
    {
        $shipsto = $this->repository->findBy(array('shiporder'=> $id));

        if (!empty($shipsto))
        {
            foreach($shipsto as $key => $value)
            {
                $shipsto[$key]->created = $value->created->format('d/m/Y H:i:s');
                $shipsto[$key]->updated = $value->updated->format('d/m/Y H:i:s');
                $shipsto[$key]->shiporder = url('api/shiporder') . '/' . $value->shiporder->id;
                unset($shipsto[$key]->shiporder->id);
            }
        }

        return response()->json($shipsto);
    }
}
