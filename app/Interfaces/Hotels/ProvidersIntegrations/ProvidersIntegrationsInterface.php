<?php

namespace App\Interfaces\Hotels\ProvidersIntegrations;

interface ProvidersIntegrationsInterface
{
    /**
     * THIS METHOD TO MAKE CURL REQUEST ( GET DATA FROM DATA SOURCE [ PROVIDER ] ).
     *
     * @param $data
     *
     * @return mixed
     */
    public function search($data);

    /**
     * THIS METHOD TO MAP REQUEST DATA TO BE COMPATIBLE BASED PROVIDER.
     *
     * @param $data
     * @return mixed
     */
    public function mapProviderRequest($data);

    /**
     * THIS METHOD TO MAP RESULT DATA TO BE COMPATIBLE WITH OUR SERVICE.
     *
     * @param $finalProviderResults
     * @return mixed
     */
    public function mapProviderResponse($finalProviderResults);
}
