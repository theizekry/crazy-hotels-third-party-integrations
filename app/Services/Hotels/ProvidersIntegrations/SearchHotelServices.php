<?php

namespace App\Services\Hotels\ProvidersIntegrations;

use App\Factories\Hotels\ProvidersIntegrations\HotelsProvidersIntegrationsFactory;
use App\Services\Hotels\HotelServices;
use App\Traits\SortableDescendingByKeyTrait;

class SearchHotelServices
{
    /*
     * USE THIS TRAIT TO SORT ARRAY BY KEY VIA COLLECTION
     * */
    use SortableDescendingByKeyTrait;

    /**
     * THIS SERVICE TO COORDINATE OUR SERVICES API WITH THIRD PARTY PROVIDERS INTEGRATIONS.
     * BASED OUR PROJECT CONFIGURATION GET PROVIDERS LIST THEN MAKE HANDSHAKE WITH THEM AND GET FINAL RESULT.
     *
     * @param $data
     * @return mixed
     */
    public final function search($data)
    {
       $resultData = [];
       $providers  = HotelServices::getHotelsProvidersConfig();

       foreach ($providers as $provider) {
           $provider = HotelsProvidersIntegrationsFactory::getProviderInstance($provider);

           // IF PROVIDER NOT AN OBJECT THAT MEAN SOMETHING WENT WRONG SO WE MUST CONTINUE TO COMPLETE USER REQUEST.
           if ($provider === false) {
               continue;
           }
           // START APPLY SEARCH OPERATION BASED PROVIDER AND GET RESULT
           $resultData[] = $provider->search($data);
       }

       // MERGE RESULTS THEN RETURN WITH FINAL RESULTS MERGED..
       $mergedResultsFromProviders = call_user_func_array('array_merge', $resultData);

       // SORT DATA MERGED BY RATE.
       return $this->sortDesc($mergedResultsFromProviders, 'rate');
    }
}
