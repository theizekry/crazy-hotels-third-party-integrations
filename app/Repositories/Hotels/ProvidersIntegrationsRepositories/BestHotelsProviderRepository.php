<?php

namespace App\Repositories\Hotels\ProvidersIntegrationsRepositories;

use App\Helpers\BestHotelsDataSourceMock;
use App\Interfaces\Hotels\ProvidersIntegrations\ProvidersIntegrationsInterface;
use Carbon\Carbon;

class BestHotelsProviderRepository implements ProvidersIntegrationsInterface
{
    /**
     * THIS METHOD FIRE CURL REQUEST TO THIS PROVIDER WEB SERVICE TO RETURN DATA ACCORDING FORM REQUEST.
     *
     * @param $data
     *
     * @return mixed|void
     */
    public function search($data)
    {
        // START MAP DATA TO MEET PROVIDER REQUIREMENTS
        $mappedData = $this->map($data);
        // MOCK CURL REQUEST BASED FACTORY GENERATOR ( TO MAKE SEARCH MORE SEANCE WITH DYNAMIC RESPONSE FOR CONSUMER FOR SEARCH API ).
        $results = BestHotelsDataSourceMock::getProviderSearchResult($mappedData);

        return $this->mapProviderResults($results);
    }

    /**
     *  GENERATE A NEW MAPPED DATA ACCORDING (BEST HOTELS PROVIDER) REQUIREMENTS.
     *
     * @param $data
     *
     * @return array|mixed
     */
    public function map($data)
    {
        $mappedData = [];

        $mappedData['fromDate']       = $this->convertDateToIsoLocalDate($data['from_date'] ?? '') ?? '';
        $mappedData['toDate']         = $this->convertDateToIsoLocalDate($data['to_date'] ?? '') ?? '';
        $mappedData['city']           = $data['city'] ?? '';
        $mappedData['numberOfAdults'] = $data['adults_number'] ?? '';

        return $mappedData;
    }

    /**
     * THIS METHOD TO MAP RESULT DATA TO BE COMPATIBLE WITH OUR SERVICE.
     *
     * @param $finalProviderResults
     *
     * @return array|mixed
     */
    public function mapProviderResults($finalProviderResults)
    {
        $mapResults = [];

        foreach ($finalProviderResults as $key => $result) {

            $mapResults[$key]['provider'] = 'Best Hotels';
            $mapResults[$key]['hotelName'] = $result['hotel'];
            $mapResults[$key]['fare'] = $result['hotelFare'];
            $mapResults[$key]['rate'] = $result['hotelRate'];
            $mapResults[$key]['discount'] = '';
            $mapResults[$key]['amenities'] = explode(',', $result['roomAmenities']);
        }

        return $mapResults;
    }

    /**
     * @param $date
     * @return string|null
     */
    private function convertDateToIsoLocalDate($date)
    {
        if (! $date) {
            return null;
        }

        return Carbon::parse($date)->toIso8601String();
    }
}
