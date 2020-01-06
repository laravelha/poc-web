<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    const BASE_URI = '/posts';

    /**
     * @test
     */
    public function checkRequiredFields()
    {
        $response = $this->post(self::BASE_URI, []);

        $response->assertSessionHasErrors('title');
        $response->assertSessionHasErrors('content');
        $response->assertSessionHasErrors('category_id');
    }

    /**
     * @test
     */
    public function postCanBeCreated()
    {
        $postFake = factory(Post::class)->make();

        $response = $this->post(self::BASE_URI, $postFake->toArray());

        $response->assertStatus(302);

        $this->assertCount(1, Post::all());

        $this->assertDatabaseHas('posts', $postFake->getAttributes());
    }

    /**
     * @test
     */
    public function postCanBeUpdated()
    {
        $postFakes = factory(Post::class, 2)->make();
        $this->post(self::BASE_URI, $postFakes->first()->toArray());

        $post  = Post::first();

        $response = $this->put(self::BASE_URI . '/' . $post->id, $postFakes->last()->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('posts', $postFakes->last()->getAttributes());
    }

    /**
     * @test
     */
    public function postCanBeDeleted()
    {
        $postFake = factory(Post::class)->make();
        $this->post(self::BASE_URI, $postFake->toArray());

        $this->assertCount(1, Post::all());

        $post  = Post::first();

        $response = $this->delete(self::BASE_URI . '/' . $post->id);

        $response->assertStatus(302);
        $this->assertCount(0, Post::all());

        $this->assertDatabaseMissing('posts', $postFake->getAttributes());
    }
}
