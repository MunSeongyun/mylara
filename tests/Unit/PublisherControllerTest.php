<?php

namespace Tests\Unit;

use App\Interfaces\PublisherRepositoryInterface;
use App\Models\Publisher;
use Mockery;
use Tests\TestCase;

class PublisherControllerTest extends TestCase
{
    public function test_store_method_creates_publisher(): void
    {
        $mockRepository = Mockery::mock(PublisherRepositoryInterface::class);

        $mockRepository->shouldReceive('createPublisher')
            ->once()
            ->with([
                'name' => '테스트 출판사', 
                'address' => '테스트 주소'
            ])
            ->andReturn(new Publisher(['id' => 1, 'name' => '테스트 출판사', 'address' => '테스트 주소']));

        $this->app->instance(PublisherRepositoryInterface::class, $mockRepository);

        $response = $this->postJson('/api/publishers', [
            'name' => '테스트 출판사',
            'address' => '테스트 주소',
        ]);

        $response->assertStatus(201)
                ->assertJson([
                    'name' => '테스트 출판사'
                ]);
    }
}