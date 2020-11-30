<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Facade;
use Illuminate\Container\Container;
use App\Helpers\SesMailFake;

/**
 * @see \Illuminate\Mail\Mailer
 */
class SesMail extends Facade
{
    public static function fake()
    {
        static::swap(
            new SesMailFake(
                Container::getInstance()['view'],
                Container::getInstance()['swift.mailer'],
                Container::getInstance()['events']
            )
        );
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'SesMailer';
    }
}
