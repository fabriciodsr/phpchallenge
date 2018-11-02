<?php

namespace PHPChallenge\Http\Controllers;
use Illuminate\Support\Facades\App;
use PHPChallenge\Domain\Entities\ShipOrder;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPChallenge\Domain\Interfaces\Repositories\IShipOrderRepository;

/**
 * @group Order
 *
 * Allows you to get order info from persons
 */
class ShipOrderController extends BaseController
{
    protected $repository;

    public function __construct()
    {
        $this->repository = App::make(IShipOrderRepository::class);
    }

    /**
	 * Get all orders
	 *
	 * Allows you to get a list of all orders registered on the application
     * @authenticated
     *
	 * @response {
     * "id": 1,
     * "orderid": 1,
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:41",
     * "items": "http://127.0.0.1/api/shipitems/orders/1",
     * "shipto": "http://127.0.0.1/api/shipto/orders/1",
     * "orderperson": "http://127.0.0.1/api/person/1"
     * }
	 */
    public function GetAll()
    {
        $shiporders = $this->repository->findAll();

        if (!empty($shiporders))
        {
            foreach($shiporders as $key => $value)
            {
                $shiporders[$key]->created = $value->created->format('d/m/Y H:i:s');
                $shiporders[$key]->updated = $value->updated->format('d/m/Y H:i:s');
                $shiporders[$key]->orderperson = url('api/person') . '/' . $value->orderperson->id;
                $shiporders[$key]->shipto = url('api/shipto/orders') . '/' . $value->orderid;
                $shiporders[$key]->items = url('api/shipitems/orders') . '/' . $value->orderid;
                unset($shiporders[$key]->orderperson->id);
            }
        }

        return response()->json($shiporders);
    }

    /**
	 * Get a order by Id
	 *
	 * Allows you to see a order registered on the application by it's Id
     * @authenticated
     *
	 * @queryParam shiporderId required The id of the order. Example: 1
     *
     * @response {
     * "id": 1,
     * "orderid": 1,
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:41",
     * "items": "http://127.0.0.1/api/shipitems/orders/1",
     * "shipto": "http://127.0.0.1/api/shipto/orders/1",
     * "orderperson": "http://127.0.0.1/api/person/1"
     * }
	 */
    public function GetById($id)
    {
        $shiporder = $this->repository->find($id);
        $shiporder->created = $shiporder->created->format('d/m/Y H:i:s');
        $shiporder->updated = $shiporder->updated->format('d/m/Y H:i:s');
        $shiporder->orderperson = url('api/person') . '/' . $shiporder->orderperson->id;
        $shiporder->shipto = url('api/shipto/orders') . '/' . $shiporder->orderid;
        $shiporder->items = url('api/shipitems/orders') . '/' . $shiporder->orderid;
        unset($shiporder->orderperson->id);
        return response()->json($shiporder);
    }

    /**
	 * Get all orders from a person by personId
	 *
	 * Allows you to see all orders from a person registered on the application by personId
	 * @authenticated
     *
	 * @queryParam personId required The id of the person. Example: 1
     *
     * @response {
     * "id": 1,
     * "orderid": 1,
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:41",
     * "items": "http://127.0.0.1/api/shipitems/orders/1",
     * "shipto": "http://127.0.0.1/api/shipto/orders/1",
     * "orderperson": "http://127.0.0.1/api/person/1"
     * }
	 */
    public function GetAllByPerson($id)
    {
        $shiporders = $this->repository->findBy(array('orderperson'=> $id));

        if (!empty($shiporders))
        {
            foreach($shiporders as $key => $value)
            {
                $shiporders[$key]->created = $value->created->format('d/m/Y H:i:s');
                $shiporders[$key]->updated = $value->updated->format('d/m/Y H:i:s');
                $shiporders[$key]->orderperson = url('api/person') . '/' . $value->orderperson->id;
                $shiporders[$key]->shipto = url('api/shipto/orders') . '/' . $value->orderid;
                $shiporders[$key]->items = url('api/shipitems/orders') . '/' . $value->orderid;
                unset($shiporders[$key]->orderperson->id);
            }
        }
        return response()->json($shiporders);
    }
}
