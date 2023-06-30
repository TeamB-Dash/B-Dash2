<?php

namespace Tests\Feature\Test;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class FirstTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        logger('ログイン成功すること');
        logger(print_r(\DB::connection()->getConfig(), true));
        logger(print_r(\DB::connection()->getPdo(), true));
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
