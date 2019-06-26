<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class Environment
 *
 * @package Cielo\API30\Ecommerce
 */
class Environment implements \Cielo\API30\Environment
{
    private $api;

    private $apiQuery;

    private $environment;

    /**
     * Environment constructor.
     *
     * @param $api
     * @param $apiQuery
     */
    private function __construct($api, $apiQuery, $environment = 'sandbox')
    {
        $this->api      = $api;
        $this->apiQuery = $apiQuery;
        $this->environment = $environment;
    }

    /**
     * @return Environment
     */
    public static function sandbox()
    {
        $api      = 'https://apisandbox.cieloecommerce.cielo.com.br/';
        $apiQuery = 'https://apiquerysandbox.cieloecommerce.cielo.com.br/';
        $environment = 'sandbox';

        return new Environment($api, $apiQuery, $environment);
    }

    /**
     * @return Environment
     */
    public static function production()
    {
        $api      = 'https://api.cieloecommerce.cielo.com.br/';
        $apiQuery = 'https://apiquery.cieloecommerce.cielo.com.br/';
        $environment = 'production';

        return new Environment($api, $apiQuery, $environment);
    }

    /**
     * Gets the environment's Api URL
     *
     * @return string the Api URL
     */
    public function getApiUrl()
    {
        return $this->api;
    }

    /**
     * Gets the environment's Api Query URL
     *
     * @return string Api Query URL
     */
    public function getApiQueryURL()
    {
        return $this->apiQuery;
    }

    /**
     *
     * @return bool
     */
    public function isProduction() {
        return $this->environment === 'production' ? true : false;
    }


}
