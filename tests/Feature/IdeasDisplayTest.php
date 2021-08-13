<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IdeasDisplayTest extends TestCase
{
    use RefreshDatabase;
    /** @test */

    public function Show_all_ideas_in_Home_page()
    {
        $idea = Idea::factory()->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        // $res->assertSee([$idea->title, $idea->desc]);
    }
    /** @test */
    public function Show_single_idea_in_Home_page()
    {
        $idea = Idea::factory()->create();
        $res = $this->get('/idea/' + $idea->slug);
        $res->assertSuccessful();
        $res->assertSee([$idea->title, $idea->desc]);
    }
}
