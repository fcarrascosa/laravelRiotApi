<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\Match;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MatchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetMatch()
    {
        $client  = new Match();
        $matchId = 3210717009;

        $this->assertTrue(is_array($client->getMatch($matchId)));
    }

    public function testGetRankedMatches()
    {
        $client    = new Match();
        $accountId = 37862779;

        $this->assertTrue(is_array($client->getRankedMatches($accountId)));
    }

    public function testGetRecentMatches()
    {
        $client    = new Match();
        $accountId = 37862779;

        $this->assertTrue(is_array($client->getRankedMatches($accountId)));
    }

    public function testGetTimeLine()
    {
        $client  = new Match();
        $matchId = 3210717009;

        $this->assertTrue(is_array($client->getTimeLine($matchId)));
    }

    public function testGetMatchesByTournament()
    {
        /* TODO: Implement test */
        $this->assertTrue(true);
    }

    public function testGetMatchByTournamentCode()
    {
        /* TODO: Implement test */
        $this->assertTrue(true);
    }
}
