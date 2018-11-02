<?php

namespace PHPChallenge\Http\Controllers;
use PHPChallenge\Domain\Entities\Person;
use PHPChallenge\Domain\Entities\PersonPhone;
use PHPChallenge\Domain\Entities\ShipOrder;
use PHPChallenge\Domain\Entities\ShipOrderItem;
use PHPChallenge\Domain\Entities\ShipOrderShipTo;
use Illuminate\Support\Facades\App;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class UploadController extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function upload(Request $request)
    {
        $aux_files = array();
        $invalid_files = array();

        for ($i = 0; $i < count($_FILES['files']['name']);  $i++)
        {
            if ($_FILES['files']['type'][$i] !== 'text/xml' && $_FILES['files']['type'][$i] !== 'application/xml')
            {
                $invalid_files[] = $_FILES['files']['name'][$i];
            }
            else
            {
                $aux_files[$_FILES['files']['name'][$i]] = [
                    'tmp_name' => $_FILES['files']['tmp_name'][$i],
                    'type' => $_FILES['files']['type'][$i]
                ];
            }
        }

        ksort($aux_files);
        $arr_files = [];

        foreach ($aux_files as $key => $value)
        {
            $arr_files['tmp_name'][] = $value['tmp_name'];
            $arr_files['type'][] = $value['type'];
        }

        //XML upload
        $processedItems = $this->uploadXML($arr_files);

        foreach ($processedItems as $items)
        {
            foreach ($items as $type => $item)
            {
                switch ($type) {
                    case 'person':

                        $date = new \DateTime(gmdate('Y-m-d H:i:s'));

                        $person = new Person();
                        $person->setId($item->personid);
                        $person->setPersonId($item->personid);
                        $person->setPersonName($item->personname);
                        $person->setCreated($date);
                        $person->setUpdated($date);

                        $entityManager = $this->em;

                        $personExists = $entityManager
                            ->getRepository(Person::class)
                            ->find($item->personid);


                        if ($personExists)
                        {
                            $person->setCreated($personExists->getCreated());
                            $entityManager->merge($person);
                        }
                        else
                        {
                            $entityManager->persist($person);
                        }

                        if (isset($item->phones) && isset($item->phones->phone) && count($item->phones->phone) > 0)
                        {
                            foreach ($item->phones->phone AS $key => $phone)
                            {
                                $phone = (array) $phone;
                                $phone = $phone[0];

                                $person_phone = new PersonPhone();
                                $person_phone->setPerson($person);
                                $person_phone->setPhone($phone);
                                $person_phone->setCreated($date);
                                $person_phone->setUpdated($date);

                                $entityManager = $this->em;

                                $phoneExists = $entityManager
                                    ->getRepository(PersonPhone::class)
                                    ->findOneBy(array('phone' => $phone));

                                if ($phoneExists)
                                {
                                    $person_phone->setId(intval($phoneExists->getId()));
                                    $person_phone->setCreated($phoneExists->getCreated());
                                    $entityManager->merge($person_phone);
                                }
                                else
                                {
                                    $entityManager->persist($person_phone);
                                }
                            }
                        }

                        break;

                    case 'shiporder':

                        $date = new \DateTime(gmdate('Y-m-d H:i:s'));

                        $shiporder = new ShipOrder();

                        $entityManager = $this->em;

                        $person = $entityManager
                        ->getRepository(Person::class)
                        ->findOneBy(array('id' => $item->orderperson));

                        $shiporder->setId($item->orderid);
                        $shiporder->setOrderPerson($person);
                        $shiporder->setOrderId($item->orderid);
                        $shiporder->setCreated($date);
                        $shiporder->setUpdated($date);

                        $shiporderExists = $entityManager
                        ->getRepository(ShipOrder::class)
                        ->findOneBy(array('orderid' => $item->orderid));

                        if ($shiporderExists)
                        {
                            $shiporder->setId(intval($shiporderExists->getId()));
                            $shiporder->setCreated($shiporderExists->getCreated());
                            $entityManager->merge($shiporder);
                        }
                        else
                        {
                            $entityManager->persist($shiporder);
                        }

                        if (isset($item->shipto))
                        {
                            $shiporder_shipto = new ShipOrderShipTo();
                            $shiporder_shipto->setCreated($date);
                            $shiporder_shipto->setUpdated($date);
                            $shiporder_shipto->setShiporder($shiporder);
                            $shiporder_shipto->setName($item->shipto->name);
                            $shiporder_shipto->setAddress($item->shipto->address);
                            $shiporder_shipto->setCity($item->shipto->city);
                            $shiporder_shipto->setCountry($item->shipto->country);

                            $entityManager = $this->em;

                            $shiporder_shiptoExists = $entityManager
                                ->getRepository(ShipOrderShipTo::class)
                                ->findOneBy(array(
                                    'name' => $item->shipto->name,
                                    'address' => $item->shipto->address,
                                    'city' => $item->shipto->city,
                                    'country' => $item->shipto->country
                                ));

                            if ($shiporder_shiptoExists)
                            {
                                $shiporder_shipto->setId(intval($shiporder_shiptoExists->getId()));
                                $shiporder_shipto->setCreated($shiporder_shiptoExists->getCreated());
                                $entityManager->merge($shiporder_shipto);
                            }
                            else
                            {
                                $entityManager->persist($shiporder_shipto);
                            }
                        }

                        if (isset($item->items))
                        {
                            foreach ($item->items as $key => $item)
                            {
                                $shiporder_item = new ShipOrderItem();
                                $shiporder_item->setCreated($date);
                                $shiporder_item->setUpdated($date);
                                $shiporder_item->setShiporder($shiporder);
                                $shiporder_item->setTitle($item->item->title);
                                $shiporder_item->setNote($item->item->note);
                                $shiporder_item->setQuantity($item->item->quantity);
                                $shiporder_item->setPrice($item->item->price);

                                $entityManager = $this->em;

                                $shiporder_itemExists = $entityManager
                                    ->getRepository(ShipOrderItem::class)
                                    ->findOneBy(array(
                                        'title' => $item->item->title,
                                        'note' => $item->item->note,
                                        'quantity' => $item->item->quantity,
                                        'price' => $item->item->price
                                    ));

                                if ($shiporder_itemExists)
                                {
                                    $shiporder_item->setId(intval($shiporder_itemExists->getId()));
                                    $shiporder_item->setCreated($shiporder_itemExists->getCreated());
                                    $entityManager->merge($shiporder_item);
                                }
                                else
                                {
                                    $entityManager->persist($shiporder_item);
                                }
                            }
                        }
                        break;

                    default:
                        break;
                }

                $entityManager->flush();
            }
        }

        if (count($invalid_files) > 0)
        {
            $not_imported = implode(', ', $invalid);

            return view('index')
                ->with('type', 'warning')
                ->with('message', 'The following files could not be imported: ' . $not_imported);
        }

        return view('index')
                ->with('type', 'success')
                ->with('message', 'Files successfully imported!');
    }

    public function uploadXML($files)
    {
        $messages = [];
        $arr_objects = [];

        if (isset($files['tmp_name']))
        {
            foreach ($files['tmp_name'] as $key => $file)
            {
                if ($files['type'][$key] === 'text/xml' || $files['type'][$key] === 'application/xml')
                {
                    $xml = $this->getProcessedFile($file);
                    $arr_objects[] = $xml;
                }
            }

            return $arr_objects;
        }
    }

    private function getProcessedFile($file)
    {
        libxml_use_internal_errors(true);

        $xml = @simplexml_load_file($file);
        $errors = libxml_get_errors();

        if (count($errors) > 0)
        {
            $lines = file($file);

            foreach ($errors as $error)
            {
                if (strpos($error->message, 'Opening and ending tag mismatch') !== false)
                {
                    $tag   = trim(preg_replace('/Opening and ending tag mismatch: (.*) line.*/', '$1', $error->message));
                    $line  = $error->line - 2;

                    if (isset($lines[$line]))
                    {
                        if (strpos($lines[$line], '/') === false)
                        {
                            $lines[$line] = '</' . $tag . '>';
                        }
                    }
                }
            }

            $xml = implode("", $lines);
            $xml = simplexml_load_string($xml);
        }

        return $xml;
    }

}
