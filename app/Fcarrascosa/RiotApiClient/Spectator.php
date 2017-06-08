<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 8/06/17
 * Time: 2:45
 */

namespace App\Fcarrascosa\RiotApiClient;


use App\Fcarrascosa\RiotApiClient;

/**
 * Class Spectator
 * @package App\Fcarrascosa\RiotApiClient
 */
class Spectator extends RiotApiClient
{
    /**
     * @const SPECTATOR_PATH the API general path
     */
    const SPECTATOR_PATH = '/lol/spectator/v3';

    /**
     * @var string the api general path for Spectator
     */
    protected $path;

    /**
     * Spectator constructor.
     * @param string $apiServerSubDomain
     */
    public function __construct(string $apiServerSubDomain = 'euw1')
    {
        parent::__construct($apiServerSubDomain);
        $this->path = self::SPECTATOR_PATH;
    }

    /**
     * Gets current game indormation for the given summoner ID
     * @param int $summonerId
     * @return array
     */
    public function getCurrentGame(int $summonerId): array
    {
        $endpoint = 'active-games/by-summoner';
        $response = $this->request($endpoint, null, $summonerId);

        return $response;
    }

    /**
     * Gets list of featured games
     * @return array
     */
    public function getFeaturedGames(): array
    {
        $endpoint = 'featured-games';
        $response = $this->request($endpoint);

        return $response;
    }

}