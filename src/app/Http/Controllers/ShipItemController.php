<?php

namespace PHPChallenge\Http\Controllers;
use Illuminate\Support\Facades\App;
use PHPChallenge\Domain\Entities\ShipOrderItem;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPChallenge\Domain\Interfaces\Repositories\IShipOrderItemRepository;

/**
 * @group Order Items
 *
 * Allows you to get item info from orders
 */
class ShipItemController extends BaseController
{
    protected $repository;

    public function __construct()
    {
        $this->repository = App::make(IShipOrderItemRepository::class);
    }

    /**
	 * Get all items
	 *
	 * Allows you to get a list of all items registered on the application
     * @authenticated
     *
	 * @response {
     * "id": 1,
     * "title": "Title 1",
     * "note": "Note 1",
     * "quantity": 745,
     * "price": "123.45",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:41",
     * "shiporder": "http://127.0.0.1/api/shiporder/1"
     * }
	 */
    public function GetAll()
    {
        $items = $this->repository->findAll();

        if (!empty($items))
        {
            foreach($items as $key => $value)
            {
                $items[$key]->created = $value->created->format('d/m/Y H:i:s');
                $items[$key]->updated = $value->updated->format('d/m/Y H:i:s');
                $items[$key]->shiporder = url('api/shiporder') . '/' . $value->shiporder->id;
                unset($items[$key]->shiporder->id);
            }
        }

        return response()->json($items);
    }

    /**
	 * Get a item by Id
	 *
	 * Allows you to see a item registered on the application by it's Id
     * @authenticated
     *
	 * @queryParam shipitemId required The id of the item. Example: 1
     *
     * @response {
     * "id": 1,
     * "title": "Title 1",
     * "note": "Note 1",
     * "quantity": 745,
     * "price": "123.45",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:41",
     * "shiporder": "http://127.0.0.1/api/shiporder/1"
     * }
	 */
    public function GetById($id)
    {
        $item = $this->repository->find($id);
        $item->created = $item->created->format('d/m/Y H:i:s');
        $item->updated = $item->updated->format('d/m/Y H:i:s');
        $item->shiporder = url('api/shiporder') . '/' . $item->shiporder->id;
        unset($item->shiporder->id);
        return response()->json($item);
    }

    /**
	 * Get all items from a order by orderId
	 *
	 * Allows you to see all items from a order registered on the application by orderId
	 * @authenticated
     *
	 * @queryParam shiporderId required The id of the order. Example: 1
     *
     * @response {
     * "id": 1,
     * "title": "Title 1",
     * "note": "Note 1",
     * "quantity": 745,
     * "price": "123.45",
     * "created": "02/11/2018 03:23:21",
     * "updated": "02/11/2018 05:52:41",
     * "shiporder": "http://127.0.0.1/api/shiporder/1"
     * }
	 */
    public function GetAllByShipOrder($id)
    {
        $items = $this->repository->findBy(array('shiporder'=> $id));

        if (!empty($items))
        {
            foreach($items as $key => $value)
            {
                $items[$key]->created = $value->created->format('d/m/Y H:i:s');
                $items[$key]->updated = $value->updated->format('d/m/Y H:i:s');
                $items[$key]->shiporder = url('api/shiporder') . '/' . $value->shiporder->id;
                unset($items[$key]->shiporder->id);
            }
        }

        return response()->json($items);
    }
}
