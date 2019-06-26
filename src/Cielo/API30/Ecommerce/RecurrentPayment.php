<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class RecurrentPayment
 *
 * @package Cielo\API30\Ecommerce
 */
class RecurrentPayment implements \JsonSerializable
{

    const INTERVAL_MONTHLY = 'Monthly';

    const INTERVAL_BIMONTHLY = 'Bimonthly';

    const INTERVAL_QUARTERLY = 'Quarterly';

    const INTERVAL_SEMIANNUAL = 'SemiAnnual';

    const INTERVAL_ANNUAL = 'Annual';

    private $authorizeNow;
    private $recurrentPaymentId;
    private $nextRecurrency;
    private $startDate;
    private $endDate;
    private $interval;
    private $amount;
    private $country;
    private $createDate;
    private $currency;
    private $currentRecurrencyTry;
    private $provider;
    private $recurrencyDay;
    private $successfulRecurrences;
    private $links;
    private $recurrentTransactions;
    private $reasonCode;
    private $reasonMessage;
    private $status;
    private $statusText;

    /**
     * RecurrentPayment constructor.
     *
     * @param bool $authorizeNow
     */
    public function __construct($authorizeNow = true)
    {
        $this->setAuthorizeNow($authorizeNow);
    }

    /**
     * @param $json
     *
     * @return RecurrentPayment
     */
    public static function fromJson($json)
    {
        $object = json_decode($json);

        $recurrentPayment = new RecurrentPayment();

        if (isset($object->RecurrentPayment)) {
            $recurrentPayment->populate($object->RecurrentPayment);
        }

        if (isset($object->Customer)) {
            $recurrentPayment->CustomerName = $object->Customer->Name;
        }

        return $recurrentPayment;

    }


    private static function statusToText($status) {

        switch ((int)$status) {
            case 1: return 'Ativo'; break;
            case 2: return 'Finalizado'; break;
            case 3: return 'Desativada pelo Lojista'; break;
            case 4: return 'Desativada por numero de retentativas'; break;
            case 5: return 'Desativada por cartão de crédito vencido'; break;
        }

        return 'Status não definido na documentação da Cielo';

    }


    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->authorizeNow       = isset($data->AuthorizeNow) ? !!$data->AuthorizeNow : false;
        $this->recurrentPaymentId = isset($data->RecurrentPaymentId) ? $data->RecurrentPaymentId : null;
        $this->nextRecurrency     = isset($data->NextRecurrency) ? $data->NextRecurrency : null;
        $this->startDate          = isset($data->StartDate) ? $data->StartDate : null;
        $this->endDate            = isset($data->EndDate) ? $data->EndDate : null;
        $this->interval           = isset($data->Interval) ? $data->Interval : null;

        $this->amount                = isset($data->Amount) ? $data->Amount : null;
        $this->country               = isset($data->Country) ? $data->Country : null;
        $this->createDate            = isset($data->CreateDate) ? $data->CreateDate : null;
        $this->currency              = isset($data->Currency) ? $data->Currency : null;
        $this->currentRecurrencyTry  = isset($data->CurrentRecurrencyTry) ? $data->CurrentRecurrencyTry : null;
        $this->provider              = isset($data->Provider) ? $data->Provider : null;
        $this->recurrencyDay         = isset($data->RecurrencyDay) ? $data->RecurrencyDay : null;
        $this->successfulRecurrences = isset($data->SuccessfulRecurrences) ? $data->SuccessfulRecurrences : null;

        $this->links                 = isset($data->Links) ? $data->Links : [];
        $this->recurrentTransactions = isset($data->RecurrentTransactions) ? $data->RecurrentTransactions : [];

        $this->reasonCode    = isset($data->ReasonCode) ? $data->ReasonCode : null;
        $this->reasonMessage = isset($data->ReasonMessage) ? $data->ReasonMessage : null;
        $this->status        = isset($data->Status) ? $data->Status : null;
        $this->statusText        = isset($data->Status) ? self::statusToText($data->Status) : null;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getRecurrentPaymentId()
    {
        return $this->recurrentPaymentId;
    }

    /**
     * @return mixed
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * @return mixed
     */
    public function getReasonMessage()
    {
        return $this->reasonMessage;
    }

    /**
     * @return mixed
     */
    public function getNextRecurrency()
    {
        return $this->nextRecurrency;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function getCurrentRecurrencyTry()
    {
        return $this->currentRecurrencyTry;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @return mixed
     */
    public function getRecurrencyDay()
    {
        return $this->recurrencyDay;
    }

    /**
     * @return mixed
     */
    public function getSuccessfulRecurrences()
    {
        return $this->successfulRecurrences;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getAuthorizeNow()
    {
        return $this->authorizeNow;
    }

    /**
     * @param $authorizeNow
     *
     * @return $this
     */
    public function setAuthorizeNow($authorizeNow)
    {
        $this->authorizeNow = $authorizeNow;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param $startDate
     *
     * @return $this
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param $endDate
     *
     * @return $this
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param $interval
     *
     * @return $this
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusText()
    {
        return $this->statusText;
    }

    /**
     * @param mixed $statusText
     */
    public function setStatusText($statusText)
    {
        $this->statusText = $statusText;
        return $this;

    }


}
