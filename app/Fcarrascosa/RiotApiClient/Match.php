<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 6/06/17
 * Time: 0:32
 */

namespace App\Fcarrascosa\RiotApiClient;


use App\Fcarrascosa\RiotApiClient;

class Match extends RiotApiClient
{
    /**
     * @const MATCH_PATH the API general Path
     */
    const MATCH_PATH = '/lol/match/v3';

    /**
     * @var string the Api general path for Match
     */
    protected $path;
    /**
     * Match constructor.
     * @param string $apiServerSubdomain
     */
    public function __construct( string $apiServerSubdomain = 'euw1')
    {
        parent::__construct($apiServerSubdomain);
        $this->path = self::MATCH_PATH;
    }

    public function getMatch(int $matchId): array
    {
        $endpoint = 'matches';
        $response = $this->request($endpoint, null, $matchId);

        return $response;
    }

    public function getRankedMatches(int $accountId): array
    {
        $endpoint = 'matchlists/by-account';
        $response = $this->request($endpoint, null,$accountId);

        return $response;
    }

    public function getRecentMatches(int $accountId): array
    {
        $endpoint = 'matchlists/by-account/' . $accountId . '/recent';
        $response = $this->request($endpoint);
        return $response;
    }

    public function getTimeLine(int $matchId): array
    {
        $endpoint = 'timelines/by-match';
        $response = $this->request($endpoint, null, $matchId);

        return $response;
    }
}
