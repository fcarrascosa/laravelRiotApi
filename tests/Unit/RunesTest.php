<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\Runes;
use Tests\TestCase;

class RunesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetRunePages()
    {
        $client = new Runes();
        $summonerId = 34617206;

        $this->assertTrue(is_array($client->getRunePages($summonerId)));
    }
}
