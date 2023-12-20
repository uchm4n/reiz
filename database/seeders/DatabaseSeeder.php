<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ReizJob;
use Database\Factories\ReizJobDetailFactory;
use Database\Factories\ReizJobFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $factory = ReizJobFactory::new()->create([
            'url' => 'http://laravel.com',
            'selectors' => 'body div.content'
        ]);

        ReizJobDetailFactory::new()->for($factory, 'job')
            ->create([
                'data' => 'Test Data'
            ]);
    }
}
