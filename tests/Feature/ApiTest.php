<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Jobs\ReizJob;
use Database\Factories\ReizJobDetailFactory;
use Database\Factories\ReizJobFactory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ApiTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     */
    public function test_get_jobs_collection(): void
    {
        ReizJobFactory::new()->createMany(10);

        $this->json('get', '/api/jobs')
            ->assertOk()
            ->assertJsonStructure([
                "data" => [
                    '*' => [
                        'id',
                        'url',
                        'selectors',
                        'created_at',
                        'updated_at'
                    ]
                ]
            ]);
    }

    public function test_get_jobs_item(): void
    {
        ReizJobDetailFactory::new()
            ->for(new ReizJobFactory(), 'job')
            ->createOne();

        $this->json('get', '/api/jobs/1')
            //->dump()
            ->assertJsonStructure([
                "data" => [
                    'id',
                    'data',
                    'reiz_job_id',
                    'created_at',
                    'updated_at',
                    'job' => [
                        'id',
                        'url',
                        'selectors'
                    ]
                ]
            ]);
    }

    public function test_store_the_job()
    {
        // testing queue
        Queue::fake();

        // Assert that no jobs were pushed...
        Queue::assertNothingPushed();

        $this->json('post', '/api/jobs', [
            'url' => 'https://laravel.com',
            'selectors' => 'body div.site-wrapper .content',
        ]);

        // Assert a job was pushed
        Queue::assertPushed(ReizJob::class);


        // check in db
        $this->assertDatabaseCount('reiz_jobs', 1);
        $this->assertDatabaseHas('reiz_jobs', [
            'url' => 'https://laravel.com',
            'selectors' => 'body div.site-wrapper .content',
        ]);
    }


    public function test_delete_job()
    {
        $job = ReizJobFactory::new()->createOne();

        $this->json('delete', '/api/jobs/' . $job->id)
            ->assertStatus(204);

        $this->assertDatabaseMissing('reiz_jobs', [
            'id' => $job->id,
        ]);
    }


}
