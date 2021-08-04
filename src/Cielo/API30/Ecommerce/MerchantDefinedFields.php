<?php
namespace Cielo\API30\Ecommerce;

/**
 * Class MerchantDefinedFields
 *
 * @package Cielo\API30\Ecommerce
 */
class MerchantDefinedFields implements \JsonSerializable
{

    private $id;

    private $value;


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
        $this->id = isset($data->id)? $data->id: null;
        $this->value = isset($data->value)? $data->value: null;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
