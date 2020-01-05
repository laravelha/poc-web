<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Category;

class CategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/categories';

    /**
     * @test
     */
    public function checkRequiredFields()
    {
        $response = $this->post(self::BASE_URI, []);

        $response->assertSessionHasErrors('title');
    }

    /**
     * @test
     */
    public function categoryCanBeCreated()
    {
        $categoryFake = factory(Category::class)->make();

        $response = $this->post(self::BASE_URI, $categoryFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, Category::all());

        $this->assertDatabaseHas('categories', $categoryFake->getAttributes());
    }

    /**
     * @test
     */
    public function categoryCanBeUpdated()
    {
        $categoryFakes = factory(Category::class, 2)->make();
        $this->post(self::BASE_URI, $categoryFakes->first()->toArray());

        $category  = Category::first();

        $response = $this->put(self::BASE_URI . '/' . $category->id, $categoryFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('categories', $categoryFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function categoryCanBeDeleted()
    {
        $categoryFake = factory(Category::class)->make();
        $this->post(self::BASE_URI, $categoryFake->toArray());

        $this->assertCount(1, Category::all());

        $category  = Category::first();

        $response = $this->delete(self::BASE_URI . '/' . $category->id);

        $response->assertStatus(302);
        $this->assertCount(0, Category::all());

        $this->assertDatabaseMissing('categories', $categoryFake->getAttributes());
    }
}
