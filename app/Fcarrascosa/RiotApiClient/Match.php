<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 6/06/17
 * Time: 0:32
 */

namespace App\Fcarrascosa\RiotApiClient;


use App\Fcarrascosa\RiotApiClient;

/**
 * Class Match
 * @package App\Fcarrascosa\RiotApiClient
 */
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

    /**
     * Get match by matcg ID
     * @param int $matchId
     * @return array
     */
    public function getMatch(int $matchId): array
    {
        $endpoint = 'matches';
        $response = $this->request($endpoint, null, $matchId);

        return $response;
    }

    /**
     * Get matchlist for ranked games played on given account ID and platform Id.
     * @param int $accountId
     * @return array
     */
    public function getRankedMatches(int $accountId): array
    {
        $endpoint = 'matchlists/by-account';
        $response = $this->request($endpoint, null,$accountId);

        return $response;
    }

    /**
     * Get matchlist for last 20 matches played on gicen acocunt ID and platform ID
     * @param int $accountId
     * @return array
     */
    public function getRecentMatches(int $accountId): array
    {
        $endpoint = 'matchlists/by-account/' . $accountId . '/recent';
        $response = $this->request($endpoint);
        return $response;
    }

    /**
     * Get match timeline by match ID
     * @param int $matchId
     * @return array
     */
    public function getTimeLine(int $matchId): array
    {
        $endpoint = 'timelines/by-match';
        $response = $this->request($endpoint, null, $matchId);

        return $response;
    }

    /**
     * Get match IDs by Tournament Code
     * @param int $tournamentCode
     * @return array
     */
    public function getMatchesByTournament(int $tournamentCode): array
    {
        $endpoint = 'matches/by-tournament-code/' . $tournamentCode . '/ids';
        $response = $this->request($endpoint);

        return $response;
    }

    /**
     * Get match by match ID and Tournament Code
     * @param int $matchId
     * @param int $tournamentCode
     * @return array
     */
    public function getMatchByTournamentCode(int $matchId, int $tournamentCode): array
    {
        $endpoint = 'matches/' . $matchId . '/by-tournament-code';
        $response = $this->request($endpoint, null, $matchId);

        return $response;
    }
}
