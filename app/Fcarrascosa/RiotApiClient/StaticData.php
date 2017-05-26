<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 18/05/17
 * Time: 16:46
 */

namespace App\Fcarrascosa\RiotApiClient;

use App\Fcarrascosa\RiotApiClient;
use GuzzleHttp\Exception\ClientException;

class StaticData extends RiotApiClient
{
    const STATIC_DATA_PATH = '/lol/static-data/v3/';

    private $path;
    /**
     * StaticData constructor.
     * @param string $apiServerSubdomain
     */
    public function __construct( string $apiServerSubdomain = 'euw1' )
    {
        parent::__construct();
        $this->path = self::STATIC_DATA_PATH;
    }

    /**
     * @param string $endpoint
     * @param array $query
     * @param string|null $id
     * @return mixed
     */
    private function request(string $endpoint, array $query = null, int $id = null)
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
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getAllChampions()
    {
        $endpoint = 'champions';
        $query    = [
                'champListData' => 'all',
                'locale'      => config('app.locale')
            ];
        $response = $this->request($endpoint, $query)->data;

        return $response;

    }

    /**
     * @param int $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getChampionById(int $id)
    {
        $endpoint  = 'champions';
        $query     = [
                'champData' => 'all',
                'locale'      => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * @return mixed
     */
    public function getAllItems()
    {
        $endpoint = 'items';
        $query    = [
                'itemListData' => 'all',
                'locale'      => config('app.locale')
            ];
        $response = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getItemById(int $id)
    {
        $endpoint  = 'items';
        $query     = [
                'itemData' => 'all',
                'locale'      => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * @return mixed
     */
    public function getLanguageStrings()
    {
        $endpoint = 'language-strings';
        $query    = [
                'locale'      => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query);

        return $response;

    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        $endpoint = 'languages';
        $response  = $this->request($endpoint);

        return $response;
    }

    /**
     * @return mixed
     */
    public function getMaps()
    {
        $endpoint = 'maps';
        $query    = [
                'locale' => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * @return mixed
     */
    public function getAllMasteries()
    {
        $endpoint = 'masteries';
        $query    = [
                'masteryListData' => 'all',
                'locale'          => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getMasteryById(int $id)
    {
        $endpoint  = 'masteries';
        $query     = [
                'masteryData' => 'all',
                'locale'      => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * @return mixed
     */
    public function getProfileIcons()
    {
        $endpoint = 'profile-icons';
        $query    = [
                'locale' => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * @return mixed
     */
    public function getRealms()
    {
        $endpoint = 'realms';
        $response  = $this->request($endpoint);

        return $response;

    }

    /**
     * @return mixed
     */
    public function getAllRunes()
    {
        $endpoint = 'runes';
        $query    = [
                'runeListData' => 'all',
                'locale'          => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getRuneById(int $id)
    {
        $endpoint  = 'runes';
        $query     = [
                'runeData' => 'all',
                'locale'      => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * @return mixed
     */
    public function getAllSummonerSpells()
    {
        $endpoint = 'summoner-spells';
        $query    = [
                'spellListData' => 'all',
                'locale'          => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getSummonerSpellById(int $id)
    {
        $endpoint  = 'runes';
        $query     = [
                'spellData' => 'all',
                'locale'      => config('app.locale')
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * @return mixed
     */
    public function getAllVersions()
    {
        $endpoint  = 'versions';
        $response  = $this->request($endpoint);

        return $response;

    }
}