<?php

namespace CodeMaster\Laravel\VisitorTracker;

use CodeMaster\Laravel\VisitorTracker\Geoip\Userinfo;
use CodeMaster\Laravel\VisitorTracker\Geoip\Ipstack;

class Geoip
{
    public $driver;

    /**
     * Creates an instance of a geoapi driver.
     *
     * @param string $driver
     */
    public function __construct($driver)
    {
        switch ($driver) {
            case 'userinfo.io':
                $this->driver = new Userinfo();
                break;
            case 'ipstack.com':
                $this->driver = new Ipstack();
                break;
            default:
                $this->driver = null;
        }
    }
}
