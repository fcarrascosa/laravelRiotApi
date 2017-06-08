<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\Spectator;
use App\Fcarrascosa\RiotApiClient\Summoner;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SpectatorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetCurrentGame()
    {
        $client = new Spectator();
        $summonerClient = new Summoner();

        $featuredGames = $client->getFeaturedGames();
        $firstGame = $featuredGames['gameList'][0];
        $firstSummoner = $firstGame['participants'][0];
        $summonerName = $firstSummoner['summonerName'];
        $summoner = $summonerClient->getSummonerByName($summonerName);
        $summonerId = $summoner['id'];

        $this->assertTrue(is_array($client->getCurrentGame($summonerId)));
    }

    public function testGetFeaturedGames()
    {
        $client = new Spectator();

        $this->assertTrue(is_array($client->getFeaturedGames()));
    }
}
