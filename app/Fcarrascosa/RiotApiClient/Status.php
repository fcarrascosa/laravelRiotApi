<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 5/06/17
 * Time: 2:16
 */

namespace App\Fcarrascosa\RiotApiClient;


use App\Fcarrascosa\RiotApiClient;

class Status extends RiotApiClient
{
    /**
     * @const STATUS_PATH the API general Path
     */
    const STATUS_PATH = '/lol/status/v3';

    /**
     * @var string the Api general path for status
     */
    protected $path;

    /**
     * Status constructor.
     * @param string $apiServerSubdomain
     */
    public function __construct(string $apiServerSubdomain = 'euw1')
    {
        parent::__construct();
        $this->path = self::STATUS_PATH;
    }

    /**
     * Get League of Legends status for the given shard
     * @return array
     */
    public function getLolStatus(): array
    {
        $endpoint = 'shard-data';
        $response = $this->request($endpoint);

        return $response;
    }
}