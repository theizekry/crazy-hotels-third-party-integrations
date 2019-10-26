<?php

namespace App\Helpers;

use Carbon\Carbon;

class TopHotelsDataSourceMock
{
    private static $AMENITIES = ['Let the coffee wake me up!', 'Clean', 'fluffy towels', 'A retractable roof', 'A proper desk'];

    public static function getProviderSearchResult($data)
    {
        $resultSearch = collect(self::generateFakeData());

        /* START SECTION APPLY REQUEST  FILTERS */

        if ($data['from']) {
            $resultSearch = $resultSearch->whereStrict('from', $data['from']);
        }

        if ($data['To']) {
            $resultSearch = $resultSearch->whereStrict('To', $data['To']);
        }

        if ($data['city']) {
            $resultSearch = $resultSearch->whereStrict('city', $data['city']);
        }

        if ($data['adultsCount']) {
            $resultSearch = $resultSearch->whereStrict('adultsCount', $data['adultsCount']);
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
                'hotelName' => str_random(5),
                'rate' => 1,
                'price' => 1360,
                'from' => Carbon::parse('2019-10-25')->toISOString(),
                'To' => Carbon::parse('2019-10-30')->toISOString(),
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'adultsCount' => 4,
                'discount' => rand(1, 5) . '%',
                'amenities' => [
                    array_random(Self::$AMENITIES),
                    array_random(Self::$AMENITIES)
                ]
            ],
            [
                'hotelName' => str_random(5),
                'rate' => 1,
                'price' => 1360,
                'from' => Carbon::parse('2019-10-25')->toISOString(),
                'To' => Carbon::parse('2019-10-30')->toISOString(),
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'adultsCount' => 4,
                'discount' => rand(1, 5) . '%',
                'amenities' => [
                    array_random(Self::$AMENITIES),
                    array_random(Self::$AMENITIES)
                ]

            ],
            [
                'hotelName' => str_random(5),
                'rate' => 2,
                'price' => 1360,
                'from' => Carbon::parse('2019-10-26')->toISOString(),
                'To' => Carbon::parse('2019-10-31')->toISOString(),
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'adultsCount' => 2,
                'discount' => rand(1, 5) . '%',
                'amenities' => [
                    array_random(Self::$AMENITIES),
                    array_random(Self::$AMENITIES)
                ]
            ],
            [
                'hotelName' => str_random(5),
                'rate' => 2,
                'price' => 1360,
                'from' => Carbon::parse('2019-10-26')->toISOString(),
                'To' => Carbon::parse('2019-10-31')->toISOString(),
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'adultsCount' => 2,
                'discount' => rand(1, 5) . '%',
                'amenities' => [
                    array_random(Self::$AMENITIES),
                    array_random(Self::$AMENITIES)
                ]
            ],
            [
                'hotelName' => str_random(5),
                'rate' => 5,
                'price' => 2000,
                'from' => Carbon::parse('2019-10-27')->toISOString(),
                'To' => Carbon::parse('2019-11-01')->toISOString(),
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'adultsCount' => 4,
                'discount' => rand(1, 5) . '%',
                'amenities' => [
                    array_random(Self::$AMENITIES),
                    array_random(Self::$AMENITIES)
                ]

            ],
            [
                'hotelName' => str_random(5),
                'rate' => 5,
                'price' => 2000,
                'from' => Carbon::parse('2019-10-27')->toISOString(),
                'To' => Carbon::parse('2019-11-01')->toISOString(),
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'adultsCount' => 4,
                'discount' => rand(1, 5) . '%',
                'amenities' => [
                    array_random(Self::$AMENITIES),
                    array_random(Self::$AMENITIES)
                ]

            ],
            [
                'hotelName' => str_random(5),
                'rate' => 3,
                'price' => 1500,
                'from' => Carbon::parse('2019-10-28')->toISOString(),
                'To' => Carbon::parse('2019-11-02')->toISOString(),
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'adultsCount' => 1,
                'discount' => rand(1, 5) . '%',
                'amenities' => [
                    array_random(Self::$AMENITIES),
                    array_random(Self::$AMENITIES)
                ]
            ],
            [
                'hotelName' => str_random(5),
                'rate' => 3,
                'price' => 1360,
                'from' => Carbon::parse('2019-10-29')->toISOString(),
                'To' => Carbon::parse('2019-11-03')->toISOString(),
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'adultsCount' => 4,
                'discount' => rand(1, 5) . '%',
                'amenities' => [
                    array_random(Self::$AMENITIES),
                    array_random(Self::$AMENITIES)
                ]
            ],
            [
                'hotelName' => str_random(5),
                'rate' => 3,
                'price' => 1360,
                'from' => Carbon::parse('2019-10-30')->toISOString(),
                'To' => Carbon::parse('2019-11-04')->toISOString(),
                'city' => ['AAA', 'AAE', 'ABB', 'ABE'][rand(0, 3)],
                'adultsCount' => 10,
                'discount' => rand(1, 5) . '%',
                'amenities' => [
                    array_random(Self::$AMENITIES),
                    array_random(Self::$AMENITIES)
                ]
            ]
        ];
    }
}


