<?php
namespace Cielo\API30\Ecommerce;

/**
 * Class Browser
 *
 * @package Cielo\API30\Ecommerce
 */
class Browser implements \JsonSerializable
{

    private $browserFingerprint;

    private $cookiesAccepted;

    private $ipAddress;


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
        $this->browserFingerprint = isset($data->BrowserFingerPrint)? $data->BrowserFingerPrint: null;
        $this->cookiesAccepted = isset($data->CookiesAccepted)? $data->CookiesAccepted: null;
        $this->ipAddress = isset($data->IpAddress)? $data->IpAddress: null;
    }

    /**
     * @return mixed
     */
    public function getBrowserFingerPrint()
    {
        return $this->browserFingerprint;
    }

    /**
     * @param $browserFingerPrint
     *
     * @return $this
     */
    public function setBrowserFingerPrint($browserFingerPrint)
    {
        $this->browserFingerprint = $browserFingerPrint;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param $ipAddress
     *
     * @return $this
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCookiesAccepted()
    {
        return $this->sequenceCriteria;
    }

    /**
     * @param $cookiesAccepted
     *
     * @return $this
     */
    public function setCookiesAccepted($cookiesAccepted)
    {
        $this->cookiesAccepted = $cookiesAccepted;
        return $this;
    }
}
