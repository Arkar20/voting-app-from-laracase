<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Idea;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function Category_display_in_a_idea()
    {
        $category = Category::factory()->create(['name' => 'Test Category']);
        $idea = Idea::factory()->create([
            'category_id' => $category->id,
        ]);

        $res = $this->get('/');
        $res->assertSee($category->name);
    }
}
