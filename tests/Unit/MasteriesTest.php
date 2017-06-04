<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\Masteries;
use Tests\TestCase;

class MasteriesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetMasteryPages()
    {
        $client = new Masteries();
        $summonerId = 34617206;

        $this->assertTrue(is_array($client->getMasteryPages($summonerId)));
    }
}
