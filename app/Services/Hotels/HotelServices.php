<?php


namespace App\Services\Hotels;

use Illuminate\Config\Repository;

class HotelServices
{
    /**
     * @return Repository|mixed
     */
    public static function getHotelsProvidersConfig()
    {
        return config('hotelsIntegrationProviders.providers');
    }
}
