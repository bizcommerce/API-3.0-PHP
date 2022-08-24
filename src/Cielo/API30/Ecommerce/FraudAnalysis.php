<?php
namespace Cielo\API30\Ecommerce;

/**
 * Class FraudAnalysis
 *
 * @package Cielo\API30\Ecommerce
 */
class FraudAnalysis implements \JsonSerializable
{

    private $status;

    private $statusDescription;

    private $sequence;

    private $sequenceCriteria;

    private $fraudAnalysisReasonCode;

    private $provider = 'Cybersource';

    private $totalOrderAmount;

    private $transactionAmount;

    private $isRetryTransaction;

    private $browser;

    private $cart;

    private $merchantDefinedFields;

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
        $this->status = isset($data->Status)? $data->Status: null;
        $this->statusDescription = isset($data->StatusDescription)? $data->StatusDescription: null;
        $this->fraudAnalysisReasonCode = isset($data->FraudAnalysisReasonCode)? $data->FraudAnalysisReasonCode: null;
        $this->sequence = isset($data->Sequence)? $data->Sequence: null;
        $this->sequenceCriteria = isset($data->SequenceCriteria)? $data->SequenceCriteria: null;
        $this->totalOrderAmount = isset($data->TotalOrderAmount)? $data->TotalOrderAmount: null;
        $this->transactionAmount = isset($data->TransactionAmount)? $data->TransactionAmount: null;
        $this->provider = isset($data->Provider)? $data->Provider: null;
        $this->isRetryTransaction = isset($data->IsRetryTransaction)? $data->IsRetryTransaction: null;

        if(isset($data->Browser)) {
            $this->browser = new Browser();
            $this->browser->populate($data->Browser);
        }

        if(isset($data->Cart)) {
            $this->cart = new Cart();
            $this->cart->populate($data->Cart);
        }

        if(isset($data->MerchantDefinedFields)) {
            foreach ($data->MerchantDefinedFields as $merchantDefinedField) {
                $this->addMerchantDefinedFields($merchantDefinedField->Id,$merchantDefinedField->Value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @param $sequence
     *
     * @return $this
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param $provider
     *
     * @return $this
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSequenceCriteria()
    {
        return $this->sequenceCriteria;
    }

    /**
     * @param $sequenceCriteria
     *
     * @return $this
     */
    public function setSequenceCriteria($sequenceCriteria)
    {
        $this->sequenceCriteria = $sequenceCriteria;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalOrderAmount()
    {
        return $this->totalOrderAmount;
    }

    /**
     * @param $totalOrderAmount
     *
     * @return $this
     */
    public function setTotalOrderAmount($totalOrderAmount)
    {
        $this->totalOrderAmount = $totalOrderAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @param $browser
     * @return $this
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * @param $cart
     *
     * @return $this
     */
    public function setCart($cart)
    {
        $this->cart = $cart;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMerchantDefinedFields()
    {
        return $this->merchantDefinedFields;
    }

    /**
     * @param $merchantDefinedFields
     * @return $this
     */
    public function setMerchantDefinedFields($merchantDefinedFields)
    {
        $this->merchantDefinedFields = $merchantDefinedFields;
        return $this;
    }

    /**
     * @param $id
     * @param $value
     * @return $this
     */
    public function addMerchantDefinedFields($id,$value)
    {
        $newEntry = new MerchantDefinedFields();
        $newEntry->setId($id);
        $newEntry->setValue($value);
        $this->merchantDefinedFields[] = $newEntry;
        return $this;
    }
}
