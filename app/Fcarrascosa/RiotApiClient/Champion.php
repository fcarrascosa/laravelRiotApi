<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 30/05/17
 * Time: 11:09
 */

namespace App\Fcarrascosa\RiotApiClient;

use App\Fcarrascosa\RiotApiClient;

/**
 * Class Champion
 * @package App\Fcarrascosa\RiotApiClient
 */
class Champion extends RiotApiClient
{
    /**
     * @const CHAMPION_PATH the API general Path
     */
    const CHAMPION_PATH = '/lol/platform/v3/champions';

    /**
     * @var string the Api general path for Champions
     */
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
     * Returns the list of every Champion as an associative array
     * @return array
     */
    public function getAllChampions(): array
    {
        $endpoint = '';
        $query    = [
            'freeToPlay' => 'true',
        ];
        $response = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * Returns a Champion given its ID
     * @param int $id
     * @return array
     */
    public function getChampionById(int $id): array
    {
        $endpoint = '';
        $response = $this->request($endpoint, null, $id);

        return $response;
    }
}
