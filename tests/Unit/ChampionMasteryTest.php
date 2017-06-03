<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\ChampionMastery;
use Tests\TestCase;

class ChampionMasteryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllChampionMasteries()
    {
        $client = new ChampionMastery();
        $summonerId = 34617206;

        $this->assertTrue(is_array($client->getAllChampionMasteries($summonerId)));
    }

    public function testGetChampionMastery()
    {
        $client = new ChampionMastery();
        $summonerId = 34617206;
        $championId = 1;

        $this->assertTrue(is_array($client->getChampionMastery($summonerId, $championId)));
    }

    public function testGetSummonerScore()
    {
        $client = new ChampionMastery();
        $summonerId = 34617206;

        $this->assertTrue(is_integer($client->getSummonerScore($summonerId)));
    }
}
