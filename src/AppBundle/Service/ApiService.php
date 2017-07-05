<?php

namespace AppBundle\Service;

/**
 * Created by Johan Kladder & Sebe Jan Vogel.
 *
 * This file was created for the SH-frontend application.
 * Date: 5-7-17
 * Time: 15:12
 */
class ApiService
{

    public static $API_LOCATION;

    public function __construct($location = null)
    {
        self::$API_LOCATION = $location;
    }

    /**
     * Function for returning the API location. This location it automatically defined when an instance of this object
     * is defined as an service.
     *
     * Please give the API location when in development and in production. When in [Heroku], this function will
     * return the environment variable that is given in Heroku.
     * @return string
     */
    public function getLocation()
    {
        $location = getenv('HEROKU_API_LOCATION');
        if ($location) {
            return $location;
        }
        return self::$API_LOCATION;
    }

}