<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 17/05/17
 * Time: 17:32
 */

namespace App\Fcarrascosa\RiotApiClient\Exceptions;


use \Exception;

/**
 * Class ConfigurationException
 * @package App\RiotApiClient\Exceptions
 */
class ConfigurationException extends Exception
{

    public static $errorCodes = array(
        'NO_BASE_URL' => 'There is no riot api base url (RIOT_API_URL) defined in your .env file',
        'NO_API_KEY' => 'There is no api key defined (RIOT_API_KEY) in your .env file',
    );

}