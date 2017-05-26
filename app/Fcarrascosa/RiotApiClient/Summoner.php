<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 22/05/17
 * Time: 19:41
 */

namespace App\Fcarrascosa\RiotApiClient;


use App\Fcarrascosa\RiotApiClient;
use GuzzleHttp\Exception\ClientException;

class Summoner extends RiotApiClient
{
    const SUMMONER_PATH = '/lol/summoners/v3/summoners/';

    private $path;

    /**
     * Summoner constructor.
     * @param string $apiServerSubdomain
     */
    public function __construct($apiServerSubdomain = 'euw1')
    {
        parent::__construct($apiServerSubdomain);
        $this->path = self::SUMMONER_PATH;
    }

    /**
     * @param string $endpoint
     * @param array $query
     * @param int|string|null $id
     * @return mixed
     */
    private function request(string $endpoint, array $query = null, string $id = null)
    {
        $url = $this->url . $this->path . $endpoint;

        if($id !== null) $url = $url . '/' . $id;

        try {

            $request = $this->client->request('GET', $url, [
                'headers' => [
                    'X-Riot-Token' => $this->api_key
                ],
                'query' => $query,
            ])->getBody()->getContents();

        }catch (ClientException $e){
            abort($e->getCode());
        }

        $response = json_decode($request);

        return $response;

    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getSummonerByAccountId(int $id)
    {
        $endpoint = 'by-account';
        $response = $this->request($endpoint, null, $id);

        return $response;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getSummonerByName(string $name)
    {
        $endpoint = 'by-name';
        $response = $this->request($endpoint, null, $name);

        return $response;
    }

    public function getSummonerById(int $id)
    {
        $endpoint = null;
        $response = $this->request($endpoint, null, $id);

        return $response;
    }
}