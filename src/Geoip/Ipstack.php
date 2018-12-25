<?php

namespace CodeMaster\Laravel\VisitorTracker\Geoip;

class Ipstack extends Driver
{
    /**
     * @param $ip
     * @return string
     */
    protected function getEndpoint($ip)
    {
        $key = config('visitortracker.ipstack_key');

        return "http://api.ipstack.com/{$ip}?access_key={$key}";
    }

    /**
     * @return string
     */
    public function latitude()
    {
        return $this->data->latitude;
    }

    /**
     * @return string
     */
    public function longitude()
    {
        return $this->data->longitude;
    }

    /**
     * @return string
     */
    public function country()
    {
        return $this->data->country_name;
    }

    /**
     * @return string
     */
    public function countryCode()
    {
        return $this->data->country_code;
    }

    /**
     * @return string
     */
    public function city()
    {
        return $this->data->city;
    }
}
