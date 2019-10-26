<?php

namespace App\Helpers;

use Carbon\Carbon;

class BestHotelsDataSourceMock
{
    public static function getProviderSearchResult($data)
    {
        $resultSearch = collect(self::generateFakeData());

        /* START SECTION APPLY REQUEST  FILTERS */

        if ($data['fromDate']) {
            $resultSearch = $resultSearch->whereStrict('fromDate', $data['fromDate']);
        }

        if ($data['toDate']) {
            $resultSearch = $resultSearch->whereStrict('toDate', $data['toDate']);
        }

        if ($data['city']) {
            $resultSearch = $resultSearch->whereStrict('city', $data['city']);
        }

        if ($data['numberOfAdults']) {
            $resultSearch = $resultSearch->whereStrict('numberOfAdults', $data['numberOfAdults']);
        }

        /* START SECTION APPLY REQUEST  FILTERS */

        // SWITCH TO ARRAY.
        $resultSearch = $resultSearch->all();

        // RE-INDEX ARRAY ( MAY BE SEARCH GET SOME OF DATA FROM MIDDLE OF ARRAY ) SO WE NEED TO RE SORT OUR RESULT .
        sort($resultSearch);

        // RETURN WITH DATA.
        return $resultSearch;
    }

    public static function generateFakeData()
    {
        return [
            [
                'hotel' => str_random(5),
                'hotelRate' => 1,
                'hotelFare' => 1360,
                'fromDate' => '2019-10-25',
                'toDate' => '2019-10-30',
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'numberOfAdults' => 4,
                'roomAmenities' => 'Let the coffee wake me up!, Clean, fluffy towels'
            ],
            [
                'hotel' => str_random(5),
                'hotelRate' => 1,
                'hotelFare' => 1360,
                'fromDate' => '2019-10-25',
                'toDate' => '2019-10-30',
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'numberOfAdults' => 4,
                'roomAmenities' => 'Let the coffee wake me up!, Clean, fluffy towels'
            ],
            [
                'hotel' => str_random(5),
                'hotelRate' => 2,
                'hotelFare' => 1360,
                'fromDate' => '2019-10-26',
                'toDate' => '2019-10-31',
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'numberOfAdults' => 2,
                'roomAmenities' => 'Let the coffee wake me up!, cool and spacious bathroom'
            ],
            [
                'hotel' => str_random(5),
                'hotelRate' => 2,
                'hotelFare' => 1360,
                'fromDate' => '2019-10-26',
                'toDate' => '2019-10-31',
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'numberOfAdults' => 2,
                'roomAmenities' => 'Let the coffee wake me up!, cool and spacious bathroom'
            ],
            [
                'hotel' => str_random(5),
                'hotelRate' => 5,
                'hotelFare' => 2000,
                'fromDate' => '2019-10-27',
                'toDate' => '2019-11-01',
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'numberOfAdults' => 4,
                'roomAmenities' => 'Let the coffee wake me up!, cool and spacious bathroom'
            ],
            [
                'hotel' => str_random(5),
                'hotelRate' => 5,
                'hotelFare' => 2000,
                'fromDate' => '2019-10-27',
                'toDate' => '2019-11-01',
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'numberOfAdults' => 4,
                'roomAmenities' => 'Let the coffee wake me up!, cool and spacious bathroom '
            ],
            [
                'hotel' => str_random(5),
                'hotelRate' => 3,
                'hotelFare' => 1500,
                'fromDate' => '2019-10-28',
                'toDate' => '2019-11-02',
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'numberOfAdults' => 1,
                'roomAmenities' => 'Let the coffee wake me up!'
            ],
            [
                'hotel' => str_random(5),
                'hotelRate' => 3,
                'hotelFare' => 1360,
                'fromDate' => '2019-10-29',
                'toDate' => '2019-11-03',
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'numberOfAdults' => 4,
                'roomAmenities' => 'Let the coffee wake me up!, cool and spacious bathroom'
            ],
            [
                'hotel' => str_random(5),
                'hotelRate' => 3,
                'hotelFare' => 1360,
                'fromDate' => '2019-10-30',
                'toDate' => '2019-11-04',
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'numberOfAdults' => 10,
                'roomAmenities' => 'Let the coffee wake me up!, cool and spacious bathroom'
            ]
        ];
    }
}


