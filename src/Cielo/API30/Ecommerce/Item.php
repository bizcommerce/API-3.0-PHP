<?php
namespace Cielo\API30\Ecommerce;

/**
 * Class Item
 *
 * @package Cielo\API30\Ecommerce
 */
class Item implements \JsonSerializable
{

    private $name;

    private $quantity;

    private $sku;

    private $unitPrice;


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->name = isset($data->Name)? $data->Name: null;
        $this->quantity = isset($data->Quantity)? $data->Quantity: null;
        $this->sku = isset($data->Sku)? $data->Sku: null;
        $this->unitPrice = isset($data->UnitPrice)? $data->UnitPrice: null;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param $sku
     *
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param $unitPrice
     *
     * @return $this
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }
}
