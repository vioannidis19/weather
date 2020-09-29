<?php
    class CityWeather {
        public $city;
        public $region;
        public $country;
        public $localTime;
        public $temperature;
        public $weather;


        public function __construct($city, $region, $country, $localTime, $temperature, $weather)
        {
            $this->city = $city;
            $this->region = $region;
            $this->country = $country;
            $this->localTime = $localTime;
            $this->temperature = $temperature;
            $this->weather = $weather;
        }



        
    }

