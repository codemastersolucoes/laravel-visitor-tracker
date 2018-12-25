<?php

namespace CodeMaster\Laravel\VisitorTracker\Geoip;

class Userinfo extends Driver
{
    /**
     * @param $ip
     * @return string
     */
    protected function getEndpoint($ip)
    {
        return "https://api.userinfo.io/userinfos?ip_address={$ip}";
    }

    /**
     * @return string
     */
    public function latitude()
    {
        return $this->data->position->latitude;
    }

    /**
     * @return string
     */
    public function longitude()
    {
        return $this->data->position->longitude;
    }

    /**
     * @return string
     */
    public function country()
    {
        return $this->data->country->name;
    }

    /**
     * @return string
     */
    public function countryCode()
    {
        return $this->data->country->code;
    }

    /**
     * @return string
     */
    public function city()
    {
        return $this->data->city->name;
    }
}
