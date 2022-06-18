<?php

class Countries
{
    private $url;
    private $country;

    public function __construct() {}

    public function getListCountries()
    {
        $countries = "";

        if ($this->getUrl()) {
            $countries = json_decode(file_get_contents($this->getUrl() . 'all'));
        } else {
            echo "Nenhum URL foi encontrada!";
        }

        return $countries;
    }

    public function getRegions()
    {
        $regions = [
            "africa" => "Africa",
            "am" => "America",
            "asia" => "Asia",
            "europe" => "Europe",
            "oceania" => "Oceania",
        ];

        return $regions;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getCountry()
    {
        return $this->country;
    }
}
?>