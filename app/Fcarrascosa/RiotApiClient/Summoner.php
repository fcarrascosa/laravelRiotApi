<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 22/05/17
 * Time: 19:41
 */

namespace App\Fcarrascosa\RiotApiClient;

use App\Fcarrascosa\RiotApiClient;

class Summoner extends RiotApiClient
{
    const SUMMONER_PATH = '/lol/summoners/v3/summoners/';

    private $path;

    /**
     * Summoner constructor.
     * @param string $apiServerSubdomain
     */
    public function __construct($apiServerSubdomain = 'euw1')
    {
        parent::__construct($apiServerSubdomain);
        $this->path = self::SUMMONER_PATH;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getSummonerByAccountId(int $id)
    {
        $endpoint = 'by-account';
        $response = $this->request($endpoint, null, $id);

        return $response;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getSummonerByName(string $name)
    {
        $endpoint = 'by-name';
        $response = $this->request($endpoint, null, $name);

        return $response;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getSummonerById(int $id)
    {
        $endpoint = null;
        $response = $this->request($endpoint, null, $id);

        return $response;
    }
}
