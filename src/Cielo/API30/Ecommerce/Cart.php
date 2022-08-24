<?php
namespace Cielo\API30\Ecommerce;

/**
 * Class Cart
 *
 * @package Cielo\API30\Ecommerce
 */
class Cart implements \JsonSerializable
{

    private $items = array();

    private $isGift;

    private $returnsAccepted;


    /**
     * @return array
     */
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->isGift = isset($data->isGift)? $data->IsGift: null;
        $this->returnsAccepted = isset($data->ReturnsAccepted)? $data->ReturnsAccepted: null;

        if(isset($data->Items)) {
            foreach($data->Items as $item){
                $newItem = new Item();
                $newItem->populate($item);
                $this->items[] = $newItem;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param $items
     *
     * @return $this
     */
    public function setItems($items)
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param $name
     * @param $quantity
     * @param $sku
     * @param $unitPrice
     * @return $this
     */
    public function addNewItem($name,$quantity,$sku,$unitPrice)
    {
        $item = new Item();
        $item->setName($name);
        $item->setQuantity($quantity);
        $item->setSku($sku);
        $item->setUnitPrice($unitPrice);

        $this->items[] = $item;
        return $this;
    }
}
