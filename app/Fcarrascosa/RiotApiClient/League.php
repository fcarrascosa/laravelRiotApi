<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 3/06/17
 * Time: 20:19
 */

namespace App\Fcarrascosa\RiotApiClient;


use App\Fcarrascosa\RiotApiClient;

class League extends RiotApiClient
{

    /**
     * @const LEAGUE_PATH the API general path
     */
    const LEAGUE_PATH = '/lol/league/v3';

    /**
     * @const QUEUE TYPE the list of queue types.
     */
    const QUEUE_TYPE = [
        'solo_queue'             => 'RANKED_SOLO_5x5',
        'flex_queue'             => 'RANKED_FLEX_SR',
        'twisted_treeline_queue' => 'RANKED_FLEX_TT'
    ];

    /**
     * @var string the api general path for League
     */
    protected $path;

    /**
     * League constructor.
     * @param string $apiServerSubdomain
     */
    public function __construct(string $apiServerSubdomain = 'euw1')
    {
        parent::__construct($apiServerSubdomain);
        $this->path = self::LEAGUE_PATH;
    }

    /**
     * Returns the list of Challenger Leagues
     * @param string $queue
     * @return array
     */
    public function getChallengerLeagues(string $queue): array
    {
        $endpoint = 'challengerleagues/by-queue';
        $queue    = self::QUEUE_TYPE[$queue];
        $response = $this->request($endpoint, null, $queue);

        return $response;
    }

    /**
     * Returns the list of leagues a Summoner is in given his SummonerId
     * @param int $summonerId
     * @return array
     */
    public function getLeaguesBySummoner(int $summonerId): array
    {
        $endpoint = 'leagues/by-summoner';
        $response = $this->request($endpoint, null, $summonerId);

        return $response;
    }

    /**
     * Returns the list of Master Leagues
     * @param string $queue
     * @return array
     */
    public function getMasterLeagues(string $queue): array
    {
        $endpoint = 'masterleagues/by-queue';
        $queue = self::QUEUE_TYPE[$queue];
        $response = $this->request($endpoint, null, $queue);

        return $response;
    }

    /**
     * Returns the league positions a Summoner is in given its SummonerId
     * @param int $summonerId
     * @return array
     */
    public function getPositions(int $summonerId): array
    {
        $endpoint = 'positions/by-summoner';
        $response = $this->request($endpoint, null, $summonerId);

        return $response;
    }
}