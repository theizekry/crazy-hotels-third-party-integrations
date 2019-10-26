<?php

namespace App\Http\Controllers\Hotels\ProvidersIntegrations;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelsIntegrations\SearchRequest;
use App\Services\Hotels\ProvidersIntegrations\SearchHotelServices;
use Illuminate\Config\Repository;
use Illuminate\Http\Response;

class SearchHotelController extends Controller
{
    /*
     * @var OBJECT SearchHotelsServices
     * */
    private $searchHotelServices;

    /**
     * INJECT SEARCH HOTELS SERVICES TO ACCESS THOSE SERVICES.
     *
     * SearchHotelsController constructor.
     * @param SearchHotelServices $searchHotelServices
     */
    public function __construct(SearchHotelServices $searchHotelServices)
    {
        $this->searchHotelServices = $searchHotelServices;
    }

    /**
     * START APPLY SEARCH CYCLE.
     *
     * @param SearchRequest $request
     * @return Repository|mixed
     */
    public function search(SearchRequest $request)
    {
        $finalResults = $this->searchHotelServices->search($request->all());

        if (! $finalResults && count($finalResults)) {
            return $this->_ReturnJsonResponse('Failed Operation : Something Went Wrong ...!', [], [], Response::HTTP_BAD_REQUEST);
        }

        return $this->_ReturnJsonResponse('Successfully Operation.', [], $finalResults, Response::HTTP_OK);
    }
}
