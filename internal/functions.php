<?php
    require 'CityWeather.php';
    function getWeather() {
        return new CityWeather('Thessaloniki', 'Central Macedonia', 'Greece',
            '1203', 20,'Cloudy');
    }

    function getApiData() {
        if($_POST['city-name'] != '') {
            $apiUrl = 'http://api.weatherapi.com/v1/current.json';
            $apiKey = '510eb7be47904818b8a174646202809';
            $city = $_POST['city-name'];
            $query = "$apiUrl?key=$apiKey&q=$city";
            $data = file_get_contents($query);
            $dataJson = json_decode($data, true);
            createCityObject($dataJson);
        }
    }

    function createCityObject($data) {
        $city = $data['location']['name'];
        $region = $data['location']['region'];
        $country = $data['location']['country'];
        $time = $data['location']['localtime'];
        $temp = $data['current']['temp_c'];
        $text = $data['current']['condition']['text'];
        $weather = new CityWeather($city, $region, $country, $time, $temp, $text);
        $_SESSION['weather'] = $weather;
        if(isset($_SESSION['history'])) {
            $count = count($_SESSION['history']);
        } else {
            $count = 0;
        }
        $_SESSION['history'][$count] = $weather;
    }

    function showSearchResult($weatherData) {
        foreach ($weatherData as $key => $value) {
            echo $value;
            echo '<br/>';
        }
    }

    function showHistory($history) {
        foreach ($history as $key => $value) {
            echo '<div class="search-result">';
            foreach ($value as $item => $property) {
                echo $property;
                echo '<br/>';
            }
            echo '</div>';
        }
    }


