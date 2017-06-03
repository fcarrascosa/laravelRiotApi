<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\Champion;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChampionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllChampions()
    {
        $client = new Champion();

        $this->assertTrue(is_array($client->getAllChampions()));
    }

    public function testGetChampionById(){
        $client = new Champion();
        $championId = 1;

        $this->assertTrue(is_array($client->getChampionById($championId)));
    }
}
