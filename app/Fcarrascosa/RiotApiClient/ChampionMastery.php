<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 31/05/17
 * Time: 23:55
 */

namespace App\Fcarrascosa\RiotApiClient;


use App\Fcarrascosa\RiotApiClient;

/**
 * Class ChampionMastery
 * @package App\Fcarrascosa\RiotApiClient
 */
class ChampionMastery extends RiotApiClient
{
    /**
     * @const CHAMPION_MASTERY_PATH the API general Path
     */
    const CHAMPION_MASTERY_PATH = '/lol/champion-mastery/v3';

    /**
     * @var string The API general Path for Champion Mastery
     */
    protected $path;

    /**
     * ChampionMastery constructor.
     * @param string $apiServerSubdomain
     */
    public function __construct( string $apiServerSubdomain = 'euw1' )
    {
        parent::__construct();
        $this->path = self::CHAMPION_MASTERY_PATH;
    }

    /**
     * Returns ALL champion Masteries for a Summoner given its ID as an associative array
     * @param int $summonerId
     * @return array
     */
    public function getAllChampionMasteries(int $summonerId): array
    {
        $endpoint = 'champion-masteries/by-summoner';
        $response = $this->request($endpoint, null, $summonerId);

        return $response;
    }

    /**
     * Returns the Champion Mastery a summoner has with a champion given the Summoner's ID and the Champion's ID
     * @param int $summonerId
     * @param int $championId
     * @return array
     */
    public function getChampionMastery(int $summonerId, int $championId): array
    {
        $endpoint = 'champion-masteries/by-summoner/' . $summonerId . '/by-champion';
        $response = $this->request($endpoint, null, $championId);

        return $response;
    }

    /**
     * Returns the Champion Mastery of a Summoner given his ID.
     * @param int $summonerId
     * @return int
     */
    public function getSummonerScore(int $summonerId): int
    {
        $endpoint = 'scores/by-summoner';
        $response = $this->request($endpoint, null, $summonerId);

        return $response;
    }
}
