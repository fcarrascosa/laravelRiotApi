<?php

namespace Tests\Unit;

use App\Fcarrascosa\RiotApiClient\Status;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetLolStatus()
    {
        $client = new Status();
        $this->assertTrue(is_array($client->getLolStatus()));
    }
}
