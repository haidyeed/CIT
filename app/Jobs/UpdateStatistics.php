<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Task, Statistic};
use Illuminate\Support\Facades\DB;

class UpdateStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $statistics = Task::select('user_id', DB::raw("COUNT(*) as tasks_count"))
            ->groupBy('user_id')
            ->get()->toArray();

        foreach ($statistics as $statistic) {
            Statistic::updateOrCreate(
                ['user_id' => $statistic['user_id']],
                [
                    'user_id' => $statistic['user_id'],
                    'tasks_count' => $statistic['tasks_count']
                ]
            );
        }

    }
}
