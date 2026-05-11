<?php

namespace App\Service;

use App\Service\CountriesApiClientService;
use App\Service\WeatherApiClientService;

class CountryWeatherAggregatorService
{
    public function __construct(
        private CountriesApiClientService $countriesService,
        private WeatherApiClientService $weatherService
    )
    {
    }

    public function getCountriesWithWeather(): array
    {
        $response = $this->countriesService->getAllCountries();
        $firstFiveCountries = array_slice($response, 0, 5);

        $countries = [];

        foreach ($firstFiveCountries as $country) {
            // Obtener clima de la capital
            $weather = $this->weatherService->getWeatherByCity($country['capital'][0]);

            // Crear nuevo array con los datos solicitados
            $countries[] = [
                "country" => $country['name']['common'],
                "capital" => $country['capital'][0],
                "population" => $country['population'],
                "temperature" => $weather['main']['temp']
            ];
        }

        return $countries;
    }
}
