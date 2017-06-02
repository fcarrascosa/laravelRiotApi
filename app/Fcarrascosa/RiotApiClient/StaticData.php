<?php
/**
 * Created by PhpStorm.
 * User: fcarrascosa
 * Date: 18/05/17
 * Time: 16:46
 */

namespace App\Fcarrascosa\RiotApiClient;

use App\Fcarrascosa\RiotApiClient;

/**
 * Class StaticData
 * @package App\Fcarrascosa\RiotApiClient
 */
class StaticData extends RiotApiClient
{
    /**
     * @const STATIC_DATA_PATH the API general path
     */
    const STATIC_DATA_PATH = '/lol/static-data/v3/';

    /**
     * @var string the api general path for Static Data
     */
    protected $path;

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
     * Returns the list of every Champion as an associative array
     * @return array
     */
    public function getAllChampions(): array
    {
        $endpoint = 'champions';
        $query    = [
                'champListData' => 'all',
            ];
        $response = $this->request($endpoint, $query)['data'];

        return $response;
    }

    /**
     * Returns a Champion given his ID
     * @param int $id
     * @return array
     */
    public function getChampionById(int $id): array
    {
        $endpoint  = 'champions';
        $query     = [
                'champData' => 'all',
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * Returns the list of every Item as an associative array
     * @return array
     */
    public function getAllItems(): array
    {
        $endpoint = 'items';
        $query    = [
                'itemListData' => 'all',
            ];
        $response = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * Returns an Item given its ID
     * @param int $id
     * @return array
     */
    public function getItemById(int $id): array
    {
        $endpoint  = 'items';
        $query     = [
                'itemData' => 'all',
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * Returns the Language Strings
     * @return array
     */
    public function getLanguageStrings(): array
    {
        $endpoint = 'language-strings';
        $response  = $this->request($endpoint);

        return $response;
    }

    /**
     * Return the list of available Languages
     * @return array
     */
    public function getLanguages(): array
    {
        $endpoint = 'languages';
        $response  = $this->request($endpoint);

        return $response;
    }

    /**
     * Return the list of maps available
     * @return array
     */
    public function getMaps(): array
    {
        $endpoint = 'maps';
        $response  = $this->request($endpoint);

        return $response;
    }

    /**
     * Returns the list of every Mastery as an associative array
     * @return array
     */
    public function getAllMasteries(): array
    {
        $endpoint = 'masteries';
        $query    = [
                'masteryListData' => 'all',
            ];
        $response  = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * Returns a Mastery given its ID
     * @param int $id
     * @return array
     */
    public function getMasteryById(int $id): array
    {
        $endpoint  = 'masteries';
        $query     = [
                'masteryData' => 'all',
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * Returns all pofile Icons
     * @return array
     */
    public function getProfileIcons(): array
    {
        $endpoint = 'profile-icons';
        $response  = $this->request($endpoint);

        return $response;
    }

    /**
     * Returns all Realms
     * @return array
     */
    public function getRealms(): array
    {
        $endpoint = 'realms';
        $response  = $this->request($endpoint);

        return $response;
    }

    /**
     * Returns the list of every Rune as an associative array
     * @return array
     */
    public function getAllRunes(): array
    {
        $endpoint = 'runes';
        $query    = [
                'runeListData' => 'all',
            ];
        $response  = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * Returns a Rune given its ID
     * @param int $id
     * @return array
     */
    public function getRuneById(int $id): array
    {
        $endpoint  = 'runes';
        $query     = [
                'runeData' => 'all',
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * Returns the list of every Summoner Spell as an associative array
     * @return array
     */
    public function getAllSummonerSpells(): array
    {
        $endpoint = 'summoner-spells';
        $query    = [
                'spellListData' => 'all',
            ];
        $response  = $this->request($endpoint, $query);

        return $response;
    }

    /**
     * Returns a Summoner Spell given its ID
     * @param int $id
     * @return array
     */
    public function getSummonerSpellById(int $id): array
    {
        $endpoint  = 'summoner-spells';
        $query     = [
                'spellData' => 'all',
            ];
        $response  = $this->request($endpoint, $query, $id);

        return $response;
    }

    /**
     * Returns a list of all patches
     * @return array
     */
    public function getAllVersions(): array
    {
        $endpoint  = 'versions';
        $response  = $this->request($endpoint);

        return $response;
    }
}
