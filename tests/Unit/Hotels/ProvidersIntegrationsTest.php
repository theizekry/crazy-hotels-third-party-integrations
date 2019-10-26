<?php

namespace Tests\Feature\Hotels;

use App\Factories\Hotels\ProvidersIntegrations\HotelsProvidersIntegrationsFactory;
use Illuminate\Http\Response;
use Tests\TestCase;

class ProvidersIntegrationsTest extends TestCase
{
    public $providers;

    public function setUp():void
    {
        Parent::setUp();
        $this->providers = config('hotelsIntegrationProviders.providers');
    }

    /** @test */
    public function it_should_return_valid_active_providers_right_now_in_the_system()
    {
        $this->assertCount(2, $this->providers);
    }

    /** @test */
    public function it_should_make_new_instance_super_easy()
    {
        $providerOb = HotelsProvidersIntegrationsFactory::getProviderInstance($this->providers[0]);

        $this->assertIsObject($providerOb);
    }

    /** @test */
    public function it_should_call_search_api_and_get_valid_status_code()
    {
        $responses = $this->json('GET', route('hotels.providers.search'), []);

        $responses->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function it_should_call_search_api_and_get_valid_json_format()
    {
        $responses = $this->json('GET', route('hotels.providers.search'), []);

        $responses->assertStatus(Response::HTTP_OK)
                  ->assertJsonStructure(['Message', 'Errors', 'Data']);
    }

    /** @test */
    public function it_should_call_search_and_get_validation_error_response_if_we_pass_wrong_city_as_example()
    {
        $responses = $this->json('GET', route('hotels.providers.search'), [
            'city' => 'wrong city'
        ]);

        $responses->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure(['Message', 'Errors', 'Data']);
    }

    /** @test */
    public function it_should_call_search_and_get_empty_array_with_no_results_because_no_data_mate_this_city()
    {
        $responses = $this->json('GET', route('hotels.providers.search'), [
            'city' => 'ANT' // NOT USED WHEN MAKING MOCK FOR ANY PROVIDER
        ]);

        $responses->assertStatus(Response::HTTP_OK)
                  ->assertJsonStructure(['Message', 'Errors', 'Data'])
                  ->assertJsonCount(0,'Data');
    }

    /** @test */
    public function it_should_call_search_and_get_valid_json_structure_keys_according_business_requirements()
    {
        $responses = $this->json('GET', route('hotels.providers.search'), []);
        $responses->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(['Message', 'Errors', 'Data'])
            ->assertJsonStructure([
                'Message',
                'Errors',
                'Data' => [
                   [
                       'provider',
                       'hotelName',
                       'fare',
                       'rate',
                       'discount',
                       'amenities'
                   ]
                ],
            ]);
    }
}
