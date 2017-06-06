<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 4/06/17
 * Time: 3:58
 */

namespace App\Fcarrascosa\RiotApiClient;

use App\Fcarrascosa\RiotApiClient;

class Runes extends RiotApiClient
{
    /**
     * @const RUNES_PATH the API general path
     */
    const RUNES_PATH = '/lol/platform/v3/runes';

    /**
     * @var string the api general path for Runes
     */
    protected $path;

    /**
     * Runes constructor.
     * @param string $apiServerSubDomain
     */
    public function __construct(string $apiServerSubDomain = 'euw1')
    {
        parent::__construct($apiServerSubDomain);
        $this->path = self::RUNES_PATH;
    }

    /**
     * Gets Rune Pages given a Summoner's ID
     * @param int $summonerId
     * @return array
     */
    public function getRunePages(int $summonerId): array
    {
        $endpoint = 'by-summoner';
        $response = $this->request($endpoint, null, $summonerId);

        return $response;
    }
}