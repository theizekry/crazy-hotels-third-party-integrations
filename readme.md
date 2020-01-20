### Crazy Search Solution in Hotels With Mutliple Provider Third Party Integrations.

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

# Challenge details:
 - OurHotels is a hotel search solution that look into many providers and display results from all the available hotels,   for now we are aggregate from two providers: BestHotels and TopHotel.

# What is required? 
- Implement OurHotels service that should return results from both providers (BestHotels and TopHotel) which means each     provider has own custom implementation custom attributes ( keys ) and completely different. The result should   be a      JSON response with a valid HTTP status code of all available hotels ordered by hotel rate.

## Built With

* [Laravel](https://laravel.com/) - As PHP web framework used. **
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
