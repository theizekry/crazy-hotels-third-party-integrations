<?php

namespace App\Factories\Hotels\ProvidersIntegrations;

use App\Interfaces\Hotels\ProvidersIntegrations\ProvidersIntegrationsInterface;

final class HotelsProvidersIntegrationsFactory
{
    /*
     * @const PATH OF HOTELS PROVIDERS REPOSITORIES.
     * */
    const PROVIDERS_INTEGRATION_BASE_PATH = 'App\\Repositories\\Hotels\\ProvidersIntegrationsRepositories\\';

    /**
     * THIS METHOD GET NEW INSTANCE FOR GIVEN PROVIDER.
     *
     * @param $provider STRING ( IMPLEMENT ProvidersIntegrationsInterface ).
     *
     * @return BOOL|OBJECT
     */
    public final static function getProviderInstance($provider)
    {
        // BUILD EXPECTED REPOSITORY PATH.
        $provider = self::PROVIDERS_INTEGRATION_BASE_PATH . $provider . 'ProviderRepository';

        // RETURN FALSE IF CLASS NOT EXISTS.
        if (! class_exists($provider)) {
            return false;
        }

        // GET NEW OBJECT.
        $provider = new $provider;

        // RETURN FALSE IF CLASS NOT IMPLEMENTS THE RIGHT INTERFACE.
        if (! ($provider instanceof ProvidersIntegrationsInterface)) {
            return false;
        }

        // RETURN WITH RIGHT OBJECT.
        return $provider;
    }
}
