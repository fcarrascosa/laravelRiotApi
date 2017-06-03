<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\League;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LeagueTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetChallengerLeagues()
    {
        $client = new League();
        $league = 'solo_queue';

        $this->assertTrue(is_array($client->getChallengerLeagues($league)));
    }

    public function testGetLeaguesBySummoner()
    {
        $client     = new League();
        $summonerId = 34617206;

        $this->assertTrue(is_array($client->getLeaguesBySummoner($summonerId)));
    }

    public function testGetMasterLeagues()
    {
        $client = new League();
        $league = 'solo_queue';

        $this->assertTrue(is_array($client->getMasterLeagues($league)));
    }

    public function testGetPositions()
    {
        $client     = new League();
        $summonerId = 34617206;

        $this->assertTrue(is_array($client->getPositions($summonerId)));
    }
}
