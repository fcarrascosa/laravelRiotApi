<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\StaticData;
use Tests\TestCase;

class StaticDataTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllChampions()
    {

        $client = new StaticData();

        $this->assertTrue(is_array($client->getAllChampions()));
    }

    public function testGetChampionById()
    {
        $client = new StaticData();
        $championId = 1;

        $this->assertTrue(is_array($client->getChampionById($championId)));
    }

    public function testGetAllItems()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getAllItems()));
    }

    public function testGetItemById()
    {
        $client = new StaticData();
        $itemId = 1001;

        $this->assertTrue(is_array($client->getItemById($itemId)));
    }

    public function testGetLanguageStrings()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getLanguageStrings()));
    }

    public function testGetLanguages()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getLanguages()));
    }

    public function testGetMaps()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getMaps()));
    }

    public function testGetAllMasteries()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getAllMasteries()));
    }

    public function testGetMasteryById()
    {
        $client = new StaticData();
        $masteryId = 6111;

        $this->assertTrue(is_array($client->getMasteryById($masteryId)));
    }

    public function testGetProfileIcons()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getProfileIcons()));
    }

    public function testGetRealms()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getRealms()));
    }

    public function testGetAllRunes()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getAllRunes()));
    }

    public function testGetRuneById()
    {
        $client = new StaticData();
        $runeId = 5001;

        $this->assertTrue(is_array($client->getRuneById($runeId)));
    }

    public function testGetAllSummonerSpells()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getAllSummonerSpells()));
    }

    public function testGetSummonerById()
    {
        $client = new StaticData();
        $summonerSpellId = 1;

        $this->assertTrue(is_array($client->getSummonerSpellById($summonerSpellId)));
    }

    public function testGetAllVersions()
    {
        $client = new StaticData();

        $this->assertTrue(is_array($client->getAllVersions()));
    }
}
