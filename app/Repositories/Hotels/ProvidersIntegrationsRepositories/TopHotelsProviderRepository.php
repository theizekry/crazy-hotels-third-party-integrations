<?php

namespace App\Repositories\Hotels\ProvidersIntegrationsRepositories;

use App\Helpers\TopHotelsDataSourceMock;
use App\Interfaces\Hotels\ProvidersIntegrations\ProvidersIntegrationsInterface;
use Carbon\Carbon;

class TopHotelsProviderRepository implements ProvidersIntegrationsInterface
{
    /**
     * THIS METHOD FIRE CURL REQUEST TO THIS PROVIDER WEB SERVICE TO RETURN DATA ACCORDING FORM REQUEST.
     *
     * @param $data
     * @return mixed|void
     */
    public function search($data)
    {
        // START MAP DATA TO MEET PROVIDER REQUIREMENTS
        $mappedData = $this->mapProviderRequest($data);
        // MOCK CURL REQUEST BASED FACTORY GENERATOR ( TO MAKE SEARCH MORE SEANCE WITH DYNAMIC RESPONSE FOR CONSUMER FOR SEARCH API ).
        $results = TopHotelsDataSourceMock::getProviderSearchResult($mappedData);

        return $this->mapProviderResponse($results);
    }

    /**
     *  GENERATE A NEW MAPPED DATA ACCORDING (BEST HOTELS PROVIDER) REQUIREMENTS.
     *
     * @param $data
     * @return array|mixed
     */
    public function mapProviderRequest($data)
    {
        $mappedData = [];

        $mappedData['from'] = $this->convertDateToIsoInstance($data['from_date'] ?? '') ?? '';
        $mappedData['To'] = $this->convertDateToIsoInstance($data['to_date'] ?? '') ?? '';
        $mappedData['city'] = $data['city'] ?? '';
        $mappedData['adultsCount'] = $data['adults_number'] ?? '';

        return $mappedData;
    }

    /**
     * THIS METHOD TO MAP RESULT DATA TO BE COMPATIBLE WITH OUR SERVICE.
     *
     * @param $finalProviderResults
     *
     * @return array|mixed
     */
    public function mapProviderResponse($finalProviderResults)
    {
        $mapResults = [];

        foreach ($finalProviderResults as $key => $result) {

            $mapResults[$key]['provider'] = 'Top Hotels';
            $mapResults[$key]['hotelName'] = $result['hotelName'];
            $mapResults[$key]['fare'] = $result['price'];
            $mapResults[$key]['rate'] = $result['rate'];
            $mapResults[$key]['discount'] = $result['discount'] ?? '';
            $mapResults[$key]['amenities'] = $result['amenities'];
        }

        return $mapResults;
    }

    /**
     * @param $date
     * @return string|null
     */
    private function convertDateToIsoInstance($date)
    {
        if (! $date) {
            return null;
        }

        return Carbon::parse($date)->toISOString();
    }
}
