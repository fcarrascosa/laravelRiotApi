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
    const SUMMONER_PATH = '/lol/summoner/v3/summoners/';

    protected $path;

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
     * @return array
     */
    public function getSummonerByAccountId(int $id): array
    {
        $endpoint = 'by-account';
        $response = $this->request($endpoint, null, $id);
        return $response;
    }

    /**
     * @param string $name
     * @return array
     */
    public function getSummonerByName(string $name): array
    {
        $endpoint = 'by-name';
        $response = $this->request($endpoint, null, $name);

        return $response;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getSummonerById(int $id): array
    {
        $endpoint = null;
        $response = $this->request($endpoint, null, $id);

        return $response;
    }
}
