<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 22/05/17
 * Time: 19:41
 */

namespace App\Fcarrascosa\RiotApiClient;

use App\Fcarrascosa\RiotApiClient;

/**
 * Class Summoner
 * @package App\Fcarrascosa\RiotApiClient
 */
class Summoner extends RiotApiClient
{
    /**
     * @const SUMMONER_PATH the API general path
     */
    const SUMMONER_PATH = '/lol/summoner/v3/summoners/';

    /**
     * @var string the API general path for Summoners
     */
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
     * Returns a Summoner given his Account ID
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
     * Returns a Summoner given his username
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
     * Returns a Summoner given his Summoner ID
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
