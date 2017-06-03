<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\Summoner;
use Tests\TestCase;


class SummonerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetSummonerByAccountId()
    {
        $client = new Summoner();
        $accountId = 37862779;

        $this->assertTrue(is_array($client->getSummonerByAccountId($accountId)));
    }

    public function testGetSummonerByName()
    {
        $client = new Summoner();
        $name = 'jarredethe';

        $this->assertTrue(is_array($client->getSummonerByName($name)));
    }

    public function testGetSummonerById()
    {
        $client = new Summoner();
        $summonerId = 34617206;

        $this->assertTrue(is_array($client->getSummonerById($summonerId)));
    }
}
