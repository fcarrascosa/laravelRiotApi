<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 30/05/17
 * Time: 11:09
 */

namespace App\Fcarrascosa\RiotApiClient;

use App\Fcarrascosa\RiotApiClient;

class Champion extends RiotApiClient
{
    const CHAMPION_PATH = '/lol/platform/v3/champions';

    protected $path;


    /**
     * Champion constructor.
     * @param string $apiServerSubdomain
     */
    public function __construct( string $apiServerSubdomain = 'euw1' )
    {
        parent::__construct();
        $this->path = self::CHAMPION_PATH;
    }

    /**
     * @return array
     */
    public function getAllChampions(): array
    {
        $endpoint = null;
        $query    = [
            'freeToPlay' => true,
        ];
        $response = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getChampionById(int $id): array
    {
        $endpoint = null;
        $response = $this->request($endpoint, null, $id);

        return $response;
    }


}