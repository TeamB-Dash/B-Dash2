<?php

namespace Tests\Feature\Question;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class AccessQuestionTopTest extends TestCase
{
    private $user;

    public function setUp() :void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }
    /**
     * @test
     */
    public function 認証状態であればQAトップページにアクセスできる()
    {
        $response = $this->actingAs($this->user);
        $response = $this->get('/questions');

        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function 認証状態でなければQAトップページにアクセスできずログイン画面に遷移する()
    {
        $response = $this->get('/questions');

        $response->assertRedirect('/login');
    }
}
