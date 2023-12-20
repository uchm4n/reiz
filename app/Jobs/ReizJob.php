<?php

namespace App\Jobs;

use App\Jobs\Actions\CrawlAction;
use App\Jobs\Actions\ProcessDataAction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReizJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private int $id)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /** @var \App\Models\ReizJob $model */
        $model = \App\Models\ReizJob::find($this->id);

        // use Pipeline pattern to filter out data
        $data = app(Pipeline::class)
            ->send($model)
            ->through([
                CrawlAction::class,
                ProcessDataAction::class,
            ])
            ->thenReturn();


        $model->detail()->create([
            'data' => $data
        ]);
    }
}
