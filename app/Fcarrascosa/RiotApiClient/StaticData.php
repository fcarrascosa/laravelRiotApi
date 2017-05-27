<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 18/05/17
 * Time: 16:46
 */

namespace App\Fcarrascosa\RiotApiClient;

use App\Fcarrascosa\RiotApiClient;

class StaticData extends RiotApiClient
{
    const STATIC_DATA_PATH = '/lol/static-data/v3/';

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
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getAllChampions()
    {
        $endpoint = 'champions';
        $query    = [
                'champListData' => 'all',
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
        $response  = $this->request($endpoint);

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
        $response  = $this->request($endpoint);

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
        $response  = $this->request($endpoint);

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
