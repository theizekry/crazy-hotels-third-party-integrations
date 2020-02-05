### Crazy Search Solution in Hotels With Mutliple Provider Third Party Integrations.

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
<p align="center"></p>

## Challenge Overview  

At X-Company, we care to deliver the most scalable, secure, reliable code and reliable solutions. Those solutions also deliver business values. The challenge below will measure your skills in understanding technical and business requirements to deliver a scalable, secure and reliable code.

### Challenge Details

OurHotels is a hotel search solution that look into many providers and display results from
all the available hotels, for now we are aggregate from two providers: BestHotels and
TopHotel.

### What is required

Implement OurHotels service that should return results from both providers (BestHotels and
TopHotel), the result should be a JSON response with a valid HTTP status code of all
available hotels ordered by hotel rate.

OurHotels API (the aggregator API which you are going to build):

###### Request

```

from_date: ISO_LOCAL_DATE
to_date: ISO_LOCAL_DATE
city: IATA code (AUH)
adults_ number: integer number

```

###### Response

```
provider: name of the provider (BestHotels or TopHotels)
hotelName: Name of the hotel
fare: fare per night
amenities: array of strings
```

###### Providers API details:

### BestHotel API:

###### Request

```
fromDate ISO_LOCAL_DATE
toDate ISO_LOCAL_DATE
city IATA code (AUH)
numberOfAdults: integer number
```

###### Response

```
hotel: Name of the hotel
hotelRate: Number from 1-5
hotelFare: Total price rounded to 2 decimals
roomAmenities: String of amenities separated by commas.
```

### TopHotels API:

###### Request

```
from ISO_INSTANT
To ISO_INSTANT
city: IATA code (AUH)
adultsCount: integer number
```

###### Response

```
hotelName: Name of the hotel.
rate: String of ( * )  from 1 to 5.
price: the Price of the hotel per night.
discount: discount on the room ( if available ).
amenities: array of strings.
```


###### What you need to implement:

```
A solution that meet the above requirements.
You should consider the scalability in your solution, that means if we are going to add a new provider in the future, that should apply in a minimum changes and without affecting the current integration providers.
```

###### Additional Instructions:

### Please make sure that your code

```
* Documented
* Readable
* Covered by unit tests. You can also cover it by any other tests you want.
* Don’t use database in your implementation, it’s just calling dummy URLs ( 
* Example: localhost:8080/CrazyHotel.
```

## Built With

* [Laravel](https://laravel.com/) - As PHP web framework used.
* **Web Service.**
* **JSON.**
* **PHPUnit for Testing.**
* **Repository Design Pattern.**
* **Factory Design Pattern.**
* **Repository Design Pattern.**
* **Custom Factory for Mocker fake data and fake Providers data source.**

### Installation

```
git clone https://github.com/backendgeeks7/crazy-hotels-third-party-integrations.git
```

Then Run 

```
composer update 
```

Finally you can run your server and call below endpoint. 

```
php artisan serve
```
```
http://localhost:8000/hotels
```

Also this challenge has covered by unit test and you can running the tests as below 

```
./vendor/bin/phpunit
```

## License

Free to use. 
