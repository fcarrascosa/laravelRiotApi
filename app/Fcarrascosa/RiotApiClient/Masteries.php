<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 4/06/17
 * Time: 3:33
 */

namespace App\Fcarrascosa\RiotApiClient;

use App\Fcarrascosa\RiotApiClient;

class Masteries extends RiotApiClient
{
    /**
     * @const MASTERIES_PATH the API general path
     */
    const MASTERIES_PATH = '/lol/platform/v3/masteries';

    /**
     * @var string the api general path for Masteries
     */
    protected $path;

    /**
     * Masteries constructor.
     * @param string $apiServerSubDomain
     */
    public function __construct(string $apiServerSubDomain = 'euw1')
    {
        parent::__construct();
        $this->path = self::MASTERIES_PATH;
    }

    /**
     * Gets Mastery pages given a Summoner's ID
     * @param int $summonerId
     * @return array
     */
    public function getMasteryPages(int $summonerId): array
    {
        $endpoint = 'by-summoner';
        $response = $this->request($endpoint, null, $summonerId);

        return $response;
    }
}